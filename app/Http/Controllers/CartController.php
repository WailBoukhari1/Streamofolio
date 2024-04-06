<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        // Retrieve the product with its reviews
        $product = Product::with('reviews')->find($productId);

        // Initialize cart if not already present in session
        $cart = $request->session()->get('cart', []);

        // Calculate average rating for the product
        $averageRating = $product->reviews->avg('rating');

        // Check if the product is already in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if (is_array($item) && isset ($item['id']) && $item['id'] == $productId) {
                // If so, increment quantity
                $item['quantity']++;
                $productExists = true;
                break;
            }
        }

        // If product is not in cart, add it
        if (!$productExists) {
            $cart[] = [

                'id' => $productId,
                'thumbnail' => $product->thumbnail,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'total_price' => $product->price,
                'rating' => round($averageRating, 1), // Include average rating
            ];
        }

        // Update the cart in the session
        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function clear(Request $request)
    {
        // Clear the cart in the session
        $request->session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared successfully');
    }
    public function delete($key)
    {
        $cart = session()->get('cart');

        if (isset ($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }
    public function update(Request $request, $key)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:1', // Add any validation rules you need
        ]);

        $quantity = $validatedData['quantity'];

        // Update the cart/session data with the new quantity
        $cart = session('cart');
        $cart[$key]['quantity'] = $quantity;
        session(['cart' => $cart]);

        // Redirect back or return a response as needed
        return redirect()->back()->with('success', 'Cart updated successfully');
    }

    public function applyCoupon(Request $request)
    {
        // Retrieve the coupon code from the request
        $couponCode = $request->input('coupon_code');

        // Check if the coupon exists in the database
        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            // Coupon does not exist
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }

        // Calculate the discount amount based on the coupon percentage
        $discountAmount = ($coupon->percentage / 100) * $this->getCartTotal();

        // Update the total price of the cart
        $totalAfterDiscount = $this->getCartTotal() - $discountAmount;

        // Store the discount amount and total price in the session
        Session::put('coupon_discount', $discountAmount);
        Session::put('total_after_discount', $totalAfterDiscount);

        // Redirect back to the cart page with a success message
        return redirect()->back()->with('success', 'Coupon applied successfully.');
    }

    // Helper method to calculate the total price of the cart
    private function getCartTotal()
    {
        $cartItems = Session::get('cart');
        $cartTotal = 0;

        if ($cartItems) {
            foreach ($cartItems as $item) {
                $cartTotal += $item['price'] * $item['quantity'];
            }
        }

        return $cartTotal;

    }
}
