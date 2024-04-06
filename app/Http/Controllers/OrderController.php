<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->id();
        $order->payment_method = $request['payment-method'];
        $order->order_date = now();
        $processingDays = 2;
        $shippingDate = now()->addDays($processingDays);
        $deliveryDate = $shippingDate->addDays(5);

        $order->possible_shipping_date = $shippingDate;
        $order->possible_delivery_date = $deliveryDate;

        $order->status = 'pending';

        $order->save();

        foreach ($request['order'] as $itemData) {
            $orderItem = new OrderItem([
                'name' => $itemData['name'],
                'quantity' => $itemData['quantity'],
                'price' => $itemData['price'],
            ]);

            $order->items()->save($orderItem);
        }

        Session::put('order_id', $order->id);
        Session::forget('cart');
        return redirect()->route('thankyou')->with('success', 'Your order has been placed successfully!');
    }
    public function thankyou () {

       return view('User.thankyou');
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
        // Check if the order belongs to the authenticated user
        if ($order->user_id != auth()->id()) {
            abort(403); // Unauthorized
        }

        // Delete the order
        $order->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Order deleted successfully.');
    }

}
