<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\UserMembership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        return Membership::all();
    }

    public function subscribe(Request $request, $membershipId)
    {
        $user = $request->user();
        $membership = Membership::findOrFail($membershipId);

        // prevent multiple active
        if ($user->activeMembership()->exists()) {
            return response()->json(['error' => 'Active membership exists'], 422);
        }

        $um = UserMembership::create([
            'user_id' => $user->id,
            'membership_id' => $membership->id,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            'is_active' => true
        ]);

        return response()->json(['success' => true, 'membership' => $um]);
    }

    public function cancel(Request $request)
    {
        $user = $request->user();
        $active = $user->activeMembership()->first();
        if (!$active) return response()->json(['error' => 'No active membership'], 404);
        $active->update(['is_active' => false]);
        return response()->json(['success' => true]);
    }

    public function userSubscriptions()
    {
        $user = auth()->user();
        $subscriptions = $user->subscriptions()->latest()->get();
        return view('user.subscriptions.index', compact('subscriptions'));
    }

    public function showBuyForm()
    {
        // Assuming you have a SubscriptionPlan model/table
        $plans = \App\Models\SubscriptionPlan::all();
        return view('user.subscriptions.buy', compact('plans'));
    }

    public function buy(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:subscription_plans,id',
        ]);
        $user = auth()->user();
        $plan = \App\Models\SubscriptionPlan::findOrFail($request->plan_id);

        // Subscription creation logic (simplified)
        $user->subscriptions()->create([
            'plan_name' => $plan->name,
            'status' => 'active',
            'start_date' => now(),
            'end_date' => now()->addDays($plan->duration_days),
            'auto_renew' => false,
        ]);

        return redirect()->route('user.subscriptions')->with('success', 'Subscription purchased successfully!');
    }
}
