<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class FrontSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('users.subscriptions', compact('subscriptions'));
    }
}
