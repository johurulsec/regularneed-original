<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Referral;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function generateCode(Request $request)
    {
        $user = $request->user();
        if (!$user->referral_code) {
            $user->referral_code = Str::upper(Str::random(8));
            $user->save();
        }
        return response()->json(['link' => url('/register?ref=' . $user->referral_code)]);
    }

    // called during registration flow when ?ref= is present (web route)
    public function processReferral(Request $request)
    {
        if ($request->has('ref')) {
            $referrer = User::where('referral_code', $request->ref)->first();
            if ($referrer) {
                session(['referrer_id' => $referrer->id, 'referrer_code' => $request->ref]);
            }
        }
        return redirect('/register');
    }

    // Called by order processing logic (not an endpoint) with $order model
    public function awardReferralPoints($order)
    {
        if (!$order->referral_id) return;
        $referral = Referral::find($order->referral_id);
        if (!$referral) return;

        $referrer = $referral->referrer;
        $referred = $referral->referred;

        if (!$referrer || !$referred) return;

        $referrerMultiplier = $referrer->activeMembership()->first()
            ? $referrer->activeMembership()->first()->membership->referral_points_multiplier
            : 1;
        $referredMultiplier = $referred->activeMembership()->first()
            ? $referred->activeMembership()->first()->membership->referral_points_multiplier
            : 1;

        // Example: points as integer of monetary percentage
        $referrerPoints = (int) round($order->total * 0.05 * $referrerMultiplier);
        $referredPoints = (int) round($order->total * 0.02 * $referredMultiplier);

        $referrer->increment('points_balance', $referrerPoints);
        $referred->increment('points_balance', $referredPoints);

        $referral->update(['has_purchased' => true, 'points_earned' => $referrerPoints]);

        Transaction::create([
            'user_id' => $referrer->id,
            'type' => 'referral',
            'points' => $referrerPoints,
            'description' => "Earned {$referrerPoints} points from referral purchase (order {$order->id})"
        ]);

        Transaction::create([
            'user_id' => $referred->id,
            'type' => 'referral',
            'points' => $referredPoints,
            'description' => "Earned {$referredPoints} points for your purchase (order {$order->id})"
        ]);

        $order->update(['points_earned' => $referredPoints]);
    }
}
