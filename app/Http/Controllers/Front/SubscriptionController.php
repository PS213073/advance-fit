<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('front.subscription', compact('subscriptions'));
    }


//    public function addSubscription(Request $request)
//    {
//        $request->validate([
//            'subscription_id' => 'required|exists:subscriptions,id',
//        ]);
//
//        $subscription = Subscription::find($request->subscription_id);
//
//        if (!$subscription) {
//            return back()->withErrors('Subscription not found.');
//        }
//
//        $user = auth()->user();
//
//        $user->subscription()->associate($subscription);
//        $user->save();
//
//        return redirect()->route('front.subscription.index')->with('success', 'Subscription added successfully.');
//    }

    public function addSubscription(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);

        $subscription = Subscription::find($request->subscription_id);

        if (!$subscription) {
            return back()->withErrors('Subscription not found.');
        }

        $user = auth()->user();

        // Check if the user already has a subscription
        if ($user->subscription) {
            return back()->withErrors('⚠️ You already have a subscription and cannot change it.');
        }

        $user->subscription()->associate($subscription);
        $user->save();

        return redirect()->route('front.subscription.index')->with('success', 'Subscription added successfully.');
    }
}


