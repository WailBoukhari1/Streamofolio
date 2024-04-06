<x-main>

    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <div class="grid grid-cols-12 content-start gap-x-6 gap-y-20 md:gap-x-7.5">

                <div class="col-span-full lg:col-span-8 lg:pr-[70px]">
                    <div
                        class="not-prose flex flex-row mb-6 sm:mb-7 md:mb-8 lg:mb-10 xl:mb-12 justify-between items-end">
                        <div class="flex flex-col">
                            <h2
                                class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                                <span class="text-primary">{{ count(session('cart', [])) }}</span> Products in the cart
                            </h2>
                        </div>

                    </div>

                    <div class="relative overflow-x-auto mb-8 lg:mb-10">
                        <table class="w-full table-auto">
                            <thead
                                class="text-sm font-bold uppercase tracking-tighter leading-tight text-gray-900 dark:text-white">
                                <tr>
                                    <th class="py-4 pr-6 text-left">Product</th>
                                    <th class="py-4 px-4">Price</th>
                                    <th class="py-4 px-4">Quantity</th>
                                    <th class="py-4 px-4">Subtotal</th>
                                    <th class="py-4 pl-4"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                  @if(session()->has('cart') && is_array(session('cart')))

                                @foreach (session('cart') as $key => $item)
                                    @if (is_array($item))
                                        <tr class="border-t-[20px] border-white dark:border-gray-800">
                                            <td class="pr-4 text-left dark:bg-gray-700">
                                                <div class="flex gap-6 min-w-[260px]">
                                                    <!-- Thumb -->
                                                    <figure class="shrink-0">
                                                        <a class="group"
                                                            href="{{ route('single-product', $item['id']) }}">
                                                            <img class="transition-opacity duration-300 group-hover:opacity-75"
                                                                style="    width: 107px;"
                                                                src="{{ asset($item['thumbnail']) }}"
                                                                alt="{{ $item['name'] }}">
                                                        </a>
                                                    </figure>
                                                    <!-- Thumb / End -->
                                                    <!-- Product Body -->
                                                    <div
                                                        class="flex flex-grow flex-col gap-1 leading-tight self-center">
                                                        <!-- Title -->
                                                        <h4
                                                            class="mb-[2px] font-bold text-sm tracking-tighter uppercase">
                                                            <a class="text-gray-900 dark:text-white transition-colors hover:text-primary dark:hover:text-primary"
                                                                href="{{ route('single-product', $item['id']) }}">
                                                                {{ $item['name'] }}
                                                            </a>
                                                        </h4>
                                                        <!-- Title / End -->

                                                        <div
                                                            class="flex items-center gap-x-4 relative text-sm leading-none">
                                                            <div class="relative inline-flex leading-none gap-1">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    @if ($i < $item['rating'])
                                                                        <svg role="img"
                                                                            class="h-2.5 w-2.5 fill-gray-200 dark:fill-white/20">
                                                                            <use
                                                                                xlink:href="assets/img/main/sprite.svg#star">
                                                                            </use>
                                                                        </svg>
                                                                    @else
                                                                        <svg role="img"
                                                                            class="h-2.5 w-2.5 fill-gray-900 dark:fill-white">
                                                                            <use
                                                                                xlink:href="assets/img/main/sprite.svg#star">
                                                                            </use>
                                                                        </svg>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div
                                                                class="absolute left-0 top-0 inline-flex leading-none gap-1">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    <svg role="img"
                                                                        class="h-2.5 w-2.5 fill-gray-900 dark:fill-white">
                                                                        <use
                                                                            xlink:href="assets/img/main/sprite.svg#star">
                                                                        </use>
                                                                    </svg>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Product Body / End -->
                                                </div>
                                            </td>
                                            <td
                                                class="py-4 px-4 font-bold text-primary dark:text-white dark:bg-gray-700">
                                                ${{ $item['price'] }}</td>
                                            <td class="py-4 px-4 dark:bg-gray-700">
                                                <form action="{{ route('cart.update', $key) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <button type="submit" name="quantity"
                                                        value="{{ $item['quantity'] - 1 }}"
                                                        class="quantity-control">-</button>
                                                    <span>{{ $item['quantity'] }}</span>
                                                    <button type="submit" name="quantity"
                                                        value="{{ $item['quantity'] + 1 }}"
                                                        class="quantity-control">+</button>
                                                </form>
                                            </td>
                                            <td class="py-4 px-4 font-bold text-primary dark:bg-gray-700">
                                                ${{ $item['price'] * $item['quantity'] }}</td>
                                            <td class="py-4 pr-4 dark:bg-gray-700">
                                                <form action="{{ route('cart.delete', $key) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="group inline-flex h-5 w-5 items-center justify-center">
                                                        <svg role="img"
                                                            class="h-2 w-2 fill-gray-900 transition-colors group-hover:fill-primary dark:fill-white dark:group-hover:fill-primary">
                                                            <use xlink:href="assets/img/main/sprite.svg#close"></use>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                    @endif

                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col lg:flex-row flex-wrap gap-2 basis-full lg:basis-auto">

                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-gray-600 hover:text-gray-900 dark:hover:text-white w-full lg:w-auto">
                                Empty Cart</button>
                        </form>
                    </div>

                    <div class="mt-16 lg:mt-28">
                        <div
                            class="not-prose flex flex-row mb-6 sm:mb-7 md:mb-8 lg:mb-10 xl:mb-12 justify-between items-end">
                            <div class="flex flex-col">
                                <h2
                                    class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                                    Coupon Code<span class="text-primary">!</span></h2>
                            </div>

                        </div>
<form action="{{ route('redeem.coupon') }}" method="POST">
    @csrf
    <div class="flex flex-col flex-wrap md:flex-row gap-y-3">
        <div class="basis-full text-sm font-bold uppercase tracking-tigher leading-tight text-gray-900 dark:text-white">
            Enter your code here
        </div>
        <input class="group-[.is-success]:bg-input-success-dark group-[.is-error]:border-danger group-[.is-error]:bg-input-invalid group-[.is-error]:text-danger group-[.is-success]:pr-16 group-[.is-invalid]:pr-16 px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full md:w-[280px]" type="text" name="coupon_code" id="coupon_code" value="" placeholder="">
        <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger"></p>
        <button type="submit" class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90">
            Redeem Now!
        </button>
    </div>
</form>
                    </div>
                </div>

<div class="sticky top-8 col-span-full self-start bg-white py-5 px-5 tracking-tight shadow-3xl sm:px-6 md:px-6 md:py-6 lg:col-span-4 lg:py-7 lg:px-8 xl:py-9 xl:px-10 dark:bg-gray-700">
    <div>
        <h3 class="mb-8 text-xl font-bold leading-tight tracking-tighter uppercase text-gray-900 dark:text-white lg:mb-10 lg:text-2xl before:content-['.'] before:mr-[0.2em] before:text-primary">
            Your Order
        </h3>
        <div class="text-gray-900 dark:text-white font-bold uppercase tracking-tighter">
            <div class="mb-3 flex flex-wrap justify-between">
                <h4>Cart Total</h4>
                <div>${{ number_format($cartTotal, 2) }}</div>
            </div>
            <div class="mb-5 flex flex-col gap-y-3">
                <div class="flex flex-wrap justify-between">
                    <div>Shipping</div>
                    <div class="font-bold text-primary dark:text-white">${{ number_format($shippingCost, 2) }}</div>
                </div>
                <div class="flex flex-wrap justify-between">
                    <div>Promo Code</div>
                    <div class="font-bold text-primary dark:text-white">-${{ number_format($promoDiscount, 2) }}</div>
                </div>
            </div>
            <div class="mb-4 flex flex-wrap justify-between lg:mb-8 text-lg">
                <div>Total</div>
                <div class="text-primary">${{ number_format($totalAfterDiscount, 2) }}</div>
            </div>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90 w-full lg:mt-5">
                    Proceed to checkout
                </button>
            </form>
        </div>
    </div>
</div>


            </div>

        </div>
    </div>

</x-main>
