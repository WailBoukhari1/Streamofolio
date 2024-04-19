<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Set your Stripe API key
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Create a new order instance
        $order = new Order();
        $order->user_id = auth()->id();
        $order->payment_method = $request['payment-method'];
        $order->order_date = now();
        $processingDays = 2;
        $shippingDate = now()->addDays($processingDays);
        $deliveryDate = $shippingDate->addDays(5);
        $order->possible_shipping_date = $shippingDate;
        $order->possible_delivery_date = $deliveryDate;

        // Calculate the total price after discount
        $order->total_price_after_discount = str_replace(',', '', $request->input('total_after_discount'));

        // Set the order status to pending
        $order->status = 'pending';
        $order->payment_status = 'pending';

        // Save the order items temporarily
        $orderItems = [];
        foreach ($request['order'] as $itemData) {
            $orderItem = new OrderItem([
                'name' => $itemData['name'],
                'quantity' => $itemData['quantity'],
                'price' => $itemData['price'],
            ]);
            $orderItems[] = $orderItem;
        }
        $order->items()->saveMany($orderItems);

        // Redirect to thank you page based on the payment method
        if ($order->payment_method === 'stripe') {
            // Create a Checkout Session with Stripe
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'unit_amount' => $order->total_price_after_discount * 100, // Amount in cents
                            'product_data' => [
                                'name' => 'Your Product', // Update with your product name
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('stripe.success'), // Redirect URL after successful payment
                'cancel_url' => route('thankyou') . '?cancelled=true', // Redirect URL if payment is cancelled
            ]);

            // Save the Stripe session ID with the order
            $order->stripe_session_id = $session->id;
            $order->save();

            return redirect()->to($session->url);
        } elseif ($order->payment_method === 'cash') {
            // Save the order to the database
            $order->save();

            return redirect()->route('thankyou')->with('success', 'Your order has been placed successfully!');
        } else {
            // Handle invalid or unsupported payment method
            return redirect()->back()->with('error', 'Invalid payment method selected.');
        }
    }


    public function thankyou()
    {

        return view('pages.thankyou');
    }
    public function cancelOrder(Order $order)
    {
        // Check if the order belongs to the authenticated user
        if ($order->user_id != auth()->id()) {
            abort(403); // Unauthorized
        }

        // Update order status to "Cancelled"
        $order->status = 'cancelled';
        $order->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Order cancelled successfully.');
    }
    public function deleteOrder(Order $order)
    {
        dd(123);
        // Check if the order belongs to the authenticated user
        if ($order->user_id != auth()->id()) {
            abort(403); // Unauthorized
        }

        // Delete the order
        $order->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }
    public function update(Request $request, Order $order)
    {
        // Logic to update order status
        $order->status = 'completed'; // Example: Mark as completed
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }

    public function destroy(Order $order)
    {
        // Logic to cancel/delete the order
        $order->delete();

        return back()->with('success', 'Order cancelled successfully.');
    }
    public function validateOrder($order)
    {
        // Find the order by ID
        $order = Order::find($order);

        // Check if order exists and is in 'pending' status
        if ($order && $order->status == 'pending') {
            // Update the order status to 'processing'
            $order->status = 'processing';
            $order->save();

            // Redirect back with success message
            return back()->with('success', 'Order has been validated and is now processing.');
        }

        // Redirect back with error message if order doesn't exist or isn't in 'pending' status
        return back()->with('error', 'Order cannot be validated or is already processed.');
    }

}
