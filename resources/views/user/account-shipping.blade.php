<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <nav
                class="mb-7 border-b border-gray-50 pb-6 dark:border-gray-600 sm:mb-8 sm:pb-7 md:mb-10 md:pb-8 lg:mb-12 lg:pb-10 xl:mb-14 xl:pb-12">
                     <ul
                    class="flex flex-col flex-wrap gap-y-4 gap-x-6 xl:gap-x-10 font-bold uppercase tracking-tighter sm:flex-row sm:justify-center md:text-lg">
                    <li>
                        <a class="transition-all text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary"
                            href="{{ route('account-info') }}">Personal Info</a>
                    </li>

                    <li>
                        <a class="transition-all text-primary" href="{{ route('account-shipping') }}">Shipping Details</a>
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

            <form class="grid grid-cols-12 gap-y-7 gap-x-5 md:gap-x-6 lg:gap-x-7.5"
                action="{{ route('store.shipping') }}" method="POST">
                @csrf
                <div class="col-span-full md:col-span-4">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-first-name">First Name
                        <span class="text-primary">*</span>
                    </label>
                    <input
                        class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="text" name="shipping-first-name" id="shipping-first-name"
                        placeholder="Enter your first name"
                        value="{{ old('shipping-first-name', Auth::user()->first_name ?? '') }}">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">

                    </p>
                </div>
                <div class="col-span-full md:col-span-4">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-last-name">Last Name
                        <span class="text-primary">*</span>
                    </label>
                    <input
                        class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="text" name="shipping-last-name" id="shipping-last-name"
                        value="{{ old('shipping-first-name', Auth::user()->last_name ?? '') }}"
                        placeholder="Enter your last name">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">

                    </p>
                </div>
                <div class="col-span-full md:col-span-4">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-email">Email Address
                        <span class="text-primary">*</span>
                    </label>
                    <input
                        class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="email" name="shipping-email" id="shipping-email"
                      
                        value="{{ old('shipping-first-name', Auth::user()->email ?? '') }}"
                        placeholder="Enter your email address">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">

                    </p>
                </div>
                <div class="col-span-full md:col-span-4">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-phone">Phone Number
                    </label>
                    <input
                        class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="tel" name="shipping-phone" id="shipping-phone"
                        value="{{ old('shipping-first-name', $shippingDetail->phone ?? '') }}"
                        placeholder="Enter your phone number">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">

                    </p>
                </div>
                <div class="col-span-full md:col-span-8">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-address-1">Full Address
                        <span class="text-primary">*</span>
                    </label>
                    <input
                        class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full mb-3"
                        type="text" name="shipping-address-1" id="shipping-address-1"
                        value="{{ old('shipping-first-name', $shippingDetail->address ?? '') }}"
                        placeholder="Enter your full address">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">

                    </p>
                </div>
                <div class="col-span-full md:col-span-3">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-country">Country <span class="text-primary">*</span></label>
                    <input value="{{ old('shipping-first-name', $shippingDetail->country ?? '') }}"
                        name="shipping-country" id="shipping-country"
                        class="px-4 py-2 border-base bg-white font-medium leading-8 text-gray-900 transition-all duration-150 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="text" placeholder="Enter Country">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger"></p>
                </div>
                <div class="col-span-full md:col-span-3">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-state">State <span class="text-primary">*</span></label>
                    <input value="{{ old('shipping-first-name', $shippingDetail->state ?? '') }}" name="shipping-state"
                        id="shipping-state"
                        class="px-4 py-2 border-base bg-white font-medium leading-8 text-gray-900 transition-all duration-150 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="text" placeholder="Enter State">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger"></p>
                </div>
                <div class="col-span-full md:col-span-3">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-city">City <span class="text-primary">*</span></label>
                    <input value="{{ old('shipping-first-name', $shippingDetail->city ?? '') }}" name="shipping-city"
                        id="shipping-city"
                        class="px-4 py-2 border-base bg-white font-medium leading-8 text-gray-900 transition-all duration-150 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="text" placeholder="Enter City">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger"></p>
                </div>
                <div class="col-span-full md:col-span-3">
                    <label
                        class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                        for="shipping-zip">ZIP Code
                        <span class="text-primary">*</span>
                    </label>
                    <input
                        class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        type="number" name="shipping-zip" id="shipping-zip"
                        value="{{ old('shipping-first-name', $shippingDetail->zip ?? '') }}"
                        placeholder="Enter your ZIP code">
                    <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger">

                    </p>
                </div>
                <div class="col-span-full lg:col-start-10 lg:col-span-3 pt-2">
                    <button type="submit"
                        class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90 w-full">
                        Save Address

                    </button>
                </div>
            </form>

        </div>
    </div>
</x-main>
