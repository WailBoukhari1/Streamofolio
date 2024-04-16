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

        $order->total_price_after_discount = str_replace(',', '', $request->input('total_after_discount'));

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
