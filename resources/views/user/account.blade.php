<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <div class="[&>p]:mb-6 [&>p:last-child]:mb-0 [&_strong]:text-gray-900 [&_strong]:dark:text-white bg-white shadow-3xl p-8 md:p-10 lg:p-14 xl:p-[60px] dark:bg-gray-700 [&_a]:text-primary hover:[&_a]:text-gray-900 [&_a]:dark:text-primary dark:hover:[&_a]:text-white">
                @auth
                <p>Hello <strong>{{ Auth::user()->name }}</strong> (not <strong>{{ Auth::user()->name }}</strong>? <a href="#">Log out</a>)</p>
                @endauth
                <p>From your account dashboard you can view your <a href="">recent orders</a>, manage your <a href="_str-account-shipping.html">shipping</a> and <a href="">billing</a> addresses, and <a href="">edit your password and account details</a>.</p>
            </div>

        </div>
    </div>
</x-main>
