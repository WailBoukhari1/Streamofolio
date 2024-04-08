<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Affiliate;
use App\Models\Bio;
use App\Models\Gear;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function home()
    {
        // Fetch gear items from the database
        $gearItems = Gear::all();
        $user = User::first();
        $admin = Admin::first();
        $partners = Partner::all();
        $bio = Bio::first();

        // Pass the gear items to the view
        return view('User.home', compact('gearItems', 'user', 'admin', 'partners', 'bio'));
    }

    public function affiliates()
    {
        $affiliates = Affiliate::all();
        return view('User.affiliates', compact('affiliates'));
    }

    public function cart()
    {
        $cartItems = Session::get('cart', []);
        if (empty ($cartItems)) {
            $cartTotal = 0;
            $promoDiscount = 0;
            $totalAfterDiscount = 0;
            $shippingCost = 0;
            $totalDiscount = 0;
        } else {
            $cartTotal = 0;
            foreach ($cartItems as $item) {
                $cartTotal += $item['price'] * $item['quantity'];
            }

            $shippingCost = 5.00;

            $promoDiscount = Session::get('coupon_discount', 0);
            $totalAfterDiscount = Session::get('total_after_discount', $cartTotal + $shippingCost);

            // Store calculated values in session
            Session::put('cart_total', $cartTotal);
            Session::put('shipping_cost', $shippingCost);
            Session::put('promo_discount', $promoDiscount);
            Session::put('total_after_discount', $totalAfterDiscount);
        }

        return view('User.cart', compact('cartItems', 'cartTotal', 'shippingCost', 'promoDiscount', 'totalAfterDiscount'));
    }



    public function contact()
    {
        return view('User.contact');
    }

    public function shop(Request $request)
    {
        $categories = Product::distinct()->pluck('category');

        // Initialize products query
        $productsQuery = Product::query();

        // Filter products by category if a category is selected
        if ($request->has('category')) {
            $productsQuery->where('category', $request->category);
        }

        // Paginate the products
        $products = $productsQuery->paginate(9);
        return view('User.shop', compact('products', 'categories'));
    }

    public function singleProduct($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::all();


        return view('User.single-product', compact('product', 'reviews'));
    }

    public function stream()
    {
        // Retrieve the first admin record
        $admin = Admin::with('user')->first();
        // Check if an admin record exists
        if ($admin) {
            // Extract the schedule, Twitch username, and aliase from the admin record
            $schedule = $admin ? json_decode($admin->schedule, true) : [];
            $twitchUsername = $admin->twitch_username;
            $aliase = $admin->aliase;
        }
        return view(
            'User.stream',
            compact(
                'schedule',
                'twitchUsername',
                'aliase'
            )
        );

    }

    public function accountInfo()
    {
        return view('User.account-info');
    }

    public function accountOrders()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('order_date', 'desc')->get();

        return view('User.account-orders' , compact('orders'));
    }
 
    public function accountShipping()
    {
        $shippingDetail = null;

        if (Auth::user()->client !== null) {
            $shippingDetail = Auth::user()->client->shipping;
        }

        return view('User.account-shipping', compact('shippingDetail'));
    }

    public function account()
    {

        return view('User.account');
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);

    $user = Auth::user();
    if ($user->client) {
        $shippingDetail = $user->client->shipping;
    } else {
        $shippingDetail = null;
    }
        return view('User.checkout', compact('shippingDetail' , 'cart'));
    }
    // Admin
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
      public function manageOrders()
    {
        $orders = Order::all();
        return view('Admin.orders-manage.index', compact('orders'));
    }
        public function manageUsers()
    {
    $users = User::where('role', 'client')->get();
        return view('Admin.users-manage.index', compact('users'));
    }
}
