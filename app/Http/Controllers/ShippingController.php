<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'shipping-first-name' => 'required',
            'shipping-last-name' => 'required',
            'shipping-email' => 'required|email',
            'shipping-phone' => 'required',
            'shipping-address-1' => 'required',
            'shipping-country' => 'required',
            'shipping-state' => 'required',
            'shipping-city' => 'required',
            'shipping-zip' => 'required',
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Create or update client details
        $client = Client::updateOrCreate(
            ['first_name' => $validatedData['shipping-first-name'], 'last_name' => $validatedData['shipping-last-name'], 'user_id' => $userId]
        );

        // Create a new shipping instance
        $shipping = new Shipping();

        // Populate shipping data
        $shipping->phone = $validatedData['shipping-phone'];
        $shipping->address = $validatedData['shipping-address-1'];
        $shipping->country = $validatedData['shipping-country'];
        $shipping->state = $validatedData['shipping-state'];
        $shipping->city = $validatedData['shipping-city'];
        $shipping->zip = $validatedData['shipping-zip'];
        $shipping->client_id = $client->id;

        // Save shipping details
        $shipping->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Shipping details saved successfully.');
    }

}
