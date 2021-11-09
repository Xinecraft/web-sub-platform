<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id'
        ]);

        $subscriptionData = $request->user()->subscribe($request->website_id);

        if (count($subscriptionData['attached']) <= 0) {
           return response()->json([
                'message' => 'You are already subscribed to this website.'
            ], 422);
        }

        return response()->json([
            'message' => 'Subscription successful'
        ]);
    }
}
