<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <nav
            class="mb-7 border-b border-gray-50 pb-6 dark:border-gray-600 sm:mb-8 sm:pb-7 md:mb-10 md:pb-8 lg:mb-12 lg:pb-10 xl:mb-14 xl:pb-12">
            <ul
                class="flex flex-col flex-wrap gap-y-4 gap-x-6 xl:gap-x-10 font-bold uppercase tracking-tighter sm:flex-row sm:justify-center md:text-lg">
                <li>
                    <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary"
                        href="{{ route('account-info') }}">Personal Info</a>
                </li>

                <li>
                    <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary" href="{{ route('account-shipping') }}">Shipping Details</a>
                </li>
                <li>
                    <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary"
                        href="{{ route('account-orders') }}">Orders</a>
                </li>
                <li>
                    <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary"
                        href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>

        </nav>
        <div class="container">

            <div
                class="[&>p]:mb-6 [&>p:last-child]:mb-0 [&_strong]:text-gray-900 [&_strong]:dark:text-white bg-white shadow-3xl p-8 md:p-10 lg:p-14 xl:p-[60px] dark:bg-gray-700 [&_a]:text-primary hover:[&_a]:text-gray-900 [&_a]:dark:text-primary dark:hover:[&_a]:text-white">
                @auth
                    <p>Hello <strong>{{ Auth::user()->name }}</strong> (not <strong>{{ Auth::user()->name }}</strong>? <a
                            href="#">Log out</a>)</p>
                @endauth
                <p>From your account dashboard you can view your <a href="">recent orders</a>, manage your <a
                        href="_str-account-shipping.html">shipping</a> and <a href="">billing</a> addresses, and
                    <a href="">edit your password and account details</a>.</p>
            </div>

        </div>
    </div>
</x-main>
