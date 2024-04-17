<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Affiliate;
use App\Models\Bio;
use App\Models\Blog;
use App\Models\Gear;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
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
        return view('pages.home', compact('gearItems', 'user', 'admin', 'partners', 'bio'));
    }

    public function affiliates()
    {
        $affiliates = Affiliate::all();
        return view('pages.affiliates', compact('affiliates'));
    }

    public function cart()
    {
        $cartItems = Session::get('cart', []);
        if (empty($cartItems)) {
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

        return view('pages.cart', compact('cartItems', 'cartTotal', 'shippingCost', 'promoDiscount', 'totalAfterDiscount'));
    }



    public function contact()
    {
        return view('pages.contact');
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
        return view('pages.shop', compact('products', 'categories'));
    }
    public function singleProduct($id)
    {
        $product = Product::findOrFail($id);
        $reviews = $product->reviews;

        // Calculate the average rating
        $totalRating = $reviews->sum('rating');
        $averageRating = $reviews->isEmpty() ? 0 : $totalRating / $reviews->count();

        return view('pages.single-product', compact('product', 'reviews', 'averageRating'));
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
            'pages.stream',
            compact(
                'schedule',
                'twitchUsername',
                'aliase'
            )
        );

    }

    public function accountInfo()
    {
        return view('user.account-info');
    }
    public function adminInfo()
    {
        return view('admin.admin-info');
    }
    public function accountOrders()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('order_date', 'desc')->get();

        return view('user.account-orders', compact('orders'));
    }

    public function accountShipping()
    {
        $shippingDetail = null;

        if (Auth::user() !== null) {
            $shippingDetail = Auth::user()->shipping;
        }

        return view('User.account-shipping', compact('shippingDetail'));
    }

    public function account()
    {

        return view('user.account');
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);

        $user = Auth::user();
        if ($user) {
            $shippingDetail = $user->shipping;
        } else {
            $shippingDetail = null;
        }
        return view('pages.checkout', compact('shippingDetail', 'cart'));
    }
    // Admin
    public function manageOrders()
    {
        $orders = Order::where('status', 'pending')->get();
        return view('admin.orders-manage.index', compact('orders'));
    }
    public function orderHistory()
    {
        $orders = Order::whereNotIn('status', ['pending'])
            ->latest()
            ->get();
        return view('admin.orders-manage.history', compact('orders'));
    }
    public function manageUsers()
    {
        $users = User::where('role', 'client')->get();
        return view('admin.users-manage.index', compact('users'));
    }
    public function manageProducts()
    {
        $products = Product::latest()->paginate(10);

        foreach ($products as $product) {
            $reviews = $product->reviews()->pluck('rating');
            $averageRating = $reviews->isEmpty() ? 0 : $reviews->avg();
            $product->rating = $averageRating;
        }

        return view('admin.products-manage.index', compact('products'));
    }
    public function blogs()
    {
        // Fetch all blogs from the database
        $blogs = Blog::latest()->paginate(9);
        $categories =  $blogs->pluck('category')->unique(); 

        return view('pages.blogs', compact('blogs', 'categories'));
    }

    public function blogShow($id)
    {
        // Fetch the specific blog by its ID from the database
        $blog = Blog::findOrFail($id);

        return view('pages.blogs-single', compact('blog'));
    }
}

