<x-main>

    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <div class="flex gap-x-8 justify-between items-center mb-6 md:mb-8 lg:mb-10 xl:mb-12">
                <nav class="w-full">
                    <ul
                        class="flex flex-wrap justify-center gap-x-4 lg:gap-x-9 text-base lg:text-lg font-bold uppercase tracking-tight">
                        <li>
                            <a class="text-gray-900 {{ !Request::has('category') ? 'text-primary dark:text-primary' : 'text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary transition-colors' }} transition-colors"
                                href="{{ route('shop') }}">All</a>
                        </li>
                        @foreach ($categories as $category)
                            <li>
                                <a class="@if (Request::has('category') && urldecode(Request::input('category')) == $category) text-primary dark:text-primary underline @else text-gray-900 hover:text-primary dark:text-white dark:hover:text-primary transition-colors @endif"
                                    href="{{ route('shop', ['category' => $category]) }}">
                                    {{ $category }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

            </div>

            <div class="grid grid-cols-12 gap-x-6 gap-y-9 md:gap-x-6 lg:gap-x-7.5">

                @foreach ($products as $product)
                    <div class="col-span-full sm:col-span-6 md:col-span-6 lg:col-span-4 bg-gray-50 dark:bg-gray-700">
                        <figure class="group relative overflow-hidden bg-gray-100">
                            <img class="aspect-[37/47] w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                            <div
                                class="absolute inset-0 bg-white dark:bg-gray-900 opacity-0 group-hover:opacity-90 transition-opacity">
                            </div>
                            <div
                                class="flex absolute justify-center left-0 right-0 top-1/2 -translate-y-1/2 scale-90 [@media(hover:hover)]:opacity-0 [@media(hover:hover)]:transition-all [@media(hover:hover)]:duration-300 [@media(hover:hover)]:group-hover:scale-100 [@media(hover:hover)]:group-hover:opacity-100">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit"
                                        class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90 basis-full md:basis-1/2 lg:basis-2/5">
                                        + Add to cart
                                    </button>
                                </form>
                            </div>
                        </figure>
                        <div class="flex flex-col items-center p-5 md:p-7 xl:p-9">
                            <h3
                                class="mb-1 font-bold leading-tight tracking-tighter text-lg uppercase text-center text-gray-900 dark:text-white">
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="{{ route('single-product', $product->id) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="flex mb-2 font-bold gap-2 text-primary leading-snug tracking-tight">
                                <ins class="no-underline">${{ $product->price }}</ins>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <nav class="pt-10 md:pt-14 lg:pt-24">
                <ul class="flex flex-wrap items-center justify-center gap-x-1.5 md:gap-x-2 lg:gap-x-4">
                    <!-- Previous Page Link -->
                    @if ($products->onFirstPage())
                        <li class="flex items-center">
                            <span
                                class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white opacity-40 pointer-events-none">
                                <svg class="w-2.5 aspect-square rotate-180" fill="currentColor">
                                    <use xlink:href="assets/img/main/sprite.svg#arrow-right"></use>
                                </svg>
                            </span>
                        </li>
                    @else
                        <li class="flex items-center">
                            <a href="{{ $products->previousPageUrl() }}"
                                class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white hover:bg-primary transition-colors hover:text-gray-900 dark:hover:text-gray-900">
                                <svg class="w-2.5 aspect-square rotate-180" fill="currentColor">
                                    <use xlink:href="assets/img/main/sprite.svg#arrow-right"></use>
                                </svg>
                            </a>
                        </li>
                    @endif

                    <!-- Page Number Links -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square font-bold transition-colors bg-gray-{{ $page == $products->currentPage() ? '50' : '100' }} dark:bg-gray-{{ $page == $products->currentPage() ? '700' : '800' }} hover:bg-primary dark:hover:bg-primary text-gray-{{ $page == $products->currentPage() ? '900' : '700' }} dark:text-white hover:text-white dark:hover:text-white">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($products->hasMorePages())
                        <li class="flex items-center">
                            <a href="{{ $products->nextPageUrl() }}"
                                class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white hover:bg-primary transition-colors hover:text-gray-900 dark:hover:text-gray-900">
                                <svg class="w-2.5 aspect-square" fill="currentColor">
                                    <use xlink:href="assets/img/main/sprite.svg#arrow-right"></use>
                                </svg>
                            </a>
                        </li>
                    @else
                        <li class="flex items-center">
                            <span
                                class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white opacity-40 pointer-events-none">
                                <svg class="w-2.5 aspect-square" fill="currentColor">
                                    <use xlink:href="assets/img/main/sprite.svg#arrow-right"></use>
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            </nav>

        </div>
    </div>

</x-main>
