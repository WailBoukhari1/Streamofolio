<x-main>
    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <form class="grid grid-cols-12 gap-x-6 md:gap-x-7.5 content-start gap-y-12 lg:gap-y-24 xl:gap-y-28"
                action="{{ route('place.order') }}" method="POST">
                @csrf
                 <div class="col-span-full lg:col-start-3 lg:col-span-8">
                    <div>
                        <div class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-center">
                            <div class="flex flex-col items-center">
                                <h2
                                    class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                                    <span class="text-primary">Shipping</span> Details
                                </h2>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 p-6 md:p-7 lg:p-8 xl:p-10">
                            @if ($shippingDetail)
                                <p class="text-gray-900 dark:text-white mb-2">
                                    Your shipping address details are:
                                </p>
                                <p class="text-gray-900 dark:text-white">
                                    {{ $shippingDetail->first_name }} {{ $shippingDetail->last_name }},
                                    {{ $shippingDetail->address }},
                                    {{ $shippingDetail->city }}, {{ $shippingDetail->state }},
                                    {{ $shippingDetail->country }}, {{ $shippingDetail->zip }}
                                </p>
                                <a href="{{ route('account-shipping') }}" class="text-primary hover:underline mt-2">View
                                    Details</a>
                            @else
                                <p class="text-gray-900 dark:text-white">
                                    No shipping address details found.
                                </p>
                                <a href="{{ route('account-shipping') }}" class="text-primary hover:underline mt-2">Fill
                                    your Details</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-span-full lg:col-start-3 lg:col-span-8">
                    <div>
                        <div class="not-prose flex flex-row mb-8 md:mb-12 lg:mb-16 justify-center">
                            <div class="flex flex-col items-center">
                                <h2
                                    class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                                    Your <span class="text-primary">Order</span>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 md:p-7 lg:p-8 xl:p-10">
                        <h3
                            class="mb-8 text-xl font-bold leading-tight tracking-tighter uppercase text-gray-900 dark:text-white lg:mb-10 lg:text-2xl before:content-['.'] before:mr-[0.2em] before:text-primary">
                            Order Summary
                        </h3>

                        <div
                            class="text-sm lg:text-base font-bold uppercase tracking-tighter leading-normal flex flex-col gap-y-3 mb-5 text-gray-900 dark:text-white">
                            @foreach ($cart as $item)
                                <div class="flex flex-wrap justify-between">
                                    <div>
                                        {{ $item['name'] }} <span class="text-primary">x
                                            {{ $item['quantity'] }}</span>
                                    </div>
                                    <div>${{ number_format($item['price'], 2) }}</div>
                                </div>
                                <!-- Hidden inputs for order summary -->
                                <input type="hidden" name="order[{{ $loop->index }}][name]"
                                    value="{{ $item['name'] }}">
                                <input type="hidden" name="order[{{ $loop->index }}][quantity]"
                                    value="{{ $item['quantity'] }}">
                                <input type="hidden" name="order[{{ $loop->index }}][price]"
                                    value="{{ $item['price'] }}">
                            @endforeach
                        </div>

                        <div class="mb-8 lg:mb-12">
                            <div class="uppercase font-bold tracking-tighter text-gray-900 dark:text-white">
                                <div class="flex flex-wrap justify-between text-lg mb-5">
                                    <h4>Cart Total</h4>
                                    <div class="text-primary">$ {{ number_format(Session::get('cart_total', 0), 2) }}
                                    </div>
                                </div>

                                <div class="flex flex-col gap-y-3 mb-5">
                                    <div class="flex flex-wrap justify-between">
                                        <div class="opacity-60">Shipping</div>
                                        <div>$ {{ number_format(Session::get('shipping_cost', 0), 2) }}</div>
                                    </div>
                                    <div class="flex flex-wrap justify-between">
                                        <div class="opacity-60">Promo Code</div>
                                        <div>$ -{{ number_format(Session::get('promo_discount', 0), 2) }}</div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap justify-between mb-4 lg:mb-8 text-lg">
                                    <div>Total</div>
                                    <div class="text-primary">$
                                        {{ number_format(Session::get('total_after_discount', 0), 2) }}</div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-8">
                            <h3
                                class="mb-8 text-xl font-bold leading-tight tracking-tighter uppercase text-gray-900 dark:text-white lg:mb-10 lg:text-2xl before:content-['.'] before:mr-[0.2em] before:text-primary">
                                Payment Methods</h3>
                            <ul>
                                <li class="pb-6 lg:pb-9">
                                    <label class="flex flex-wrap gap-x-3 hover:cursor-pointer" for="paypal">
                                        <input name="payment-method" id="paypal" type="radio"
                                            class="border-gray-500 h-4 w-4 text-primary checked:bg-transparent checked:border-primary checked:hover:bg-transparent checked:hover:border-primary transition-all duration-150 bg-transparent hover:cursor-pointer peer"
                                            checked="checked"
                                            value="paypal">
                                        <span
                                            class="font-bold text-gray-900 dark:text-white leading-tight tracking-tighter uppercase">PayPal</span>
                                        <span
                                            class="basis-full max-h-0 overflow-hidden peer-checked:max-h-28 duration-200 transition-[max-height]">
                                            <span class="block pt-5">Pay easily using your Paypal account, with no
                                                additional fees!</span>
                                        </span>
                                    </label>
                                </li>

                                <li class="pb-6 lg:pb-9">
                                    <label class="flex flex-wrap gap-x-3 hover:cursor-pointer" for="check-payments">
                                        <input name="payment-method" id="check-payments" type="radio" value="check"
                                            class="border-gray-500 h-4 w-4 text-primary checked:bg-transparent checked:border-primary checked:hover:bg-transparent checked:hover:border-primary transition-all duration-150 bg-transparent hover:cursor-pointer peer">
                                        <span
                                            class="font-bold text-gray-900 dark:text-white leading-tight tracking-tighter uppercase">Check
                                            Payments</span>
                                        <span
                                            class="basis-full max-h-0 overflow-hidden peer-checked:max-h-28 duration-200 transition-[max-height]">
                                            <span class="block pt-5">Please send a check to Store Name, Store Street,
                                                Store Town, Store State / County, Store Postcode.</span>
                                        </span>
                                    </label>
                                </li>
                                <li class="pb-6 lg:pb-9">
                                    <label class="flex flex-wrap gap-x-3 hover:cursor-pointer" for="bank-transfer">
                                        <input name="payment-method" id="bank-transfer" type="radio" value="bank"
                                            class="border-gray-500 h-4 w-4 text-primary checked:bg-transparent checked:border-primary checked:hover:bg-transparent checked:hover:border-primary transition-all duration-150 bg-transparent hover:cursor-pointer peer">
                                        <span
                                            class="font-bold text-gray-900 dark:text-white leading-tight tracking-tighter uppercase">Direct
                                            Bank Transfer</span>
                                        <span
                                            class="basis-full max-h-0 overflow-hidden peer-checked:max-h-28 duration-200 transition-[max-height]">
                                            <span class="block pt-5">Make your payment directly into our bank account.
                                                Please use your Order ID as the payment reference. </span>
                                        </span>
                                    </label>
                                </li>
                                <li class="pb-6 lg:pb-9">
                                    <label class="flex flex-wrap gap-x-3 hover:cursor-pointer" for="cash-on-delivery">
                                        <input name="payment-method" id="cash-on-delivery" type="radio" value="cash"
                                            class="border-gray-500 h-4 w-4 text-primary checked:bg-transparent checked:border-primary checked:hover:bg-transparent checked:hover:border-primary transition-all duration-150 bg-transparent hover:cursor-pointer peer">
                                        <span
                                            class="font-bold text-gray-900 dark:text-white leading-tight tracking-tighter uppercase">Cash
                                            on Delivery</span>
                                        <span
                                            class="basis-full max-h-0 overflow-hidden peer-checked:max-h-28 duration-200 transition-[max-height]">
                                            <span class="block pt-5">Pay with cash upon delivery.</span>
                                        </span>
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <button type="submit"
                            class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 md:py-[21px] px-5 lg:px-10 text-white bg-primary hover:bg-primary/90 w-full">
                            Place Order Now!

                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>
</x-main>