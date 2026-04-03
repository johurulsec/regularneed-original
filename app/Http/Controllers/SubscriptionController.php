<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with('user', 'plan')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('backend.subscription.index', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $plans = SubscriptionPlan::all();
        return view('backend.subscription.create', compact('users', 'plans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:subscription_plans,id',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:active,expired,cancelled',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'auto_renew' => 'boolean'
        ]);

        $subscription = Subscription::create([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'price' => $request->price,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'auto_renew' => $request->has('auto_renew')
        ]);

        request()->session()->flash('success', 'Subscription created successfully');
        return redirect()->route('subscription.index');
    }

    public function show($id)
    {
        $subscription = Subscription::with('user')->findOrFail($id);
        return view('backend.subscription.show', compact('subscription'));
    }

    // public function edit($id)
    // {
    //     $subscription = Subscription::findOrFail($id);
    //     $users = User::where('role', 'user')->get();
    //     return view('backend.subscription.edit', compact('subscription', 'users'));
    // }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        $users = User::where('role', 'user')->get();
        $plans = SubscriptionPlan::all(); // <--- Add this line

        return view('backend.subscription.edit', compact('subscription', 'users', 'plans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:subscription_plans,id',
            'price' => 'required|numeric|min:1',
            'status' => 'required|in:active,expired,cancelled',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'auto_renew' => 'boolean'
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription->update([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'price' => $request->price,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'auto_renew' => $request->has('auto_renew')
        ]);

        request()->session()->flash('success', 'Subscription updated successfully');
        return redirect()->route('subscription.index');
    }

    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        request()->session()->flash('success', 'Subscription deleted successfully');
        return redirect()->route('subscription.index');
    }

    public function analytics()
    {
        // Subscription statistics
        $totalSubscriptions = Subscription::count();
        $activeSubscriptions = Subscription::where('status', 'active')
            ->where('end_date', '>', now())
            ->count();
        $expiredSubscriptions = Subscription::where('status', 'expired')
            ->orWhere('end_date', '<', now())
            ->count();

        // Monthly subscription trends
        $monthlySubscriptions = Subscription::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Top subscription plans
        $topPlans = Subscription::selectRaw('plan_name, COUNT(*) as count')
            ->groupBy('plan_name')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        return view('backend.subscription.analytics', compact(
            'totalSubscriptions',
            'activeSubscriptions',
            'expiredSubscriptions',
            'monthlySubscriptions',
            'topPlans'
        ));
    }
}
