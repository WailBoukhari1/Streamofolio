<x-main>

    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <div class="grid grid-cols-12 gap-x-5 md:gap-x-6 lg:gap-x-7.5 gap-y-10 mb-10 md:mb-16 lg:mb-24 xl:mb-28">

                <div class="col-span-full md:col-span-7 md:pr-7 xl:pr-[70px]">
                    <div
                        class="grid grid-cols-[40px_1fr] gap-x-4 lg:grid-cols-[60px_1fr] xl:grid-cols-[80px_1fr] xl:gap-x-5">

                        <div>
                            <div
                                class="swiper js-vv-product-swiper aspect-[25/31] h-[340px] sm:h-[420px] md:h-[420px] lg:h-[560px] xl:h-[620px]">

                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img class="h-full w-full object-cover" src="{{ asset($product->thumbnail) }}"
                                            alt="">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-full md:col-span-5 xl:-ml-7">

                    <h2
                        class="text-2xl uppercase font-bold tracking-tighter text-gray-900 md:text-2.5xl lg:text-4xl dark:text-white">
                        {{ $product->name }}
                    </h2>

                    <div class="flex items-center gap-x-2 relative text-sm leading-none py-5">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageRating)
                                <svg role="img" class="h-5 w-5 fill-current text-primary"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 1.938l2.383 6.406h6.198a.766.766 0 0 1 .533 1.3l-5.227 4.144 1.978 6.114a.768.768 0 0 1-1.174.896L12 17.714l-5.689 4.084a.768.768 0 0 1-1.174-.896l1.978-6.114-5.227-4.144a.766.766 0 0 1 .533-1.3h6.198z" />
                                </svg>
                            @else
                                <svg role="img" class="h-5 w-5 fill-current text-gray-200 dark:text-white"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M12 1.938l2.383 6.406h6.198a.766.766 0 0 1 .533 1.3l-5.227 4.144 1.978 6.114a.768.768 0 0 1-1.174.896L12 17.714l-5.689 4.084a.768.768 0 0 1-1.174-.896l1.978-6.114-5.227-4.144a.766.766 0 0 1 .533-1.3h6.198z" />
                                </svg>
                            @endif
                        @endfor
                    </div>

                    <div
                        class="mb-2 text-2xl font-bold tracking-tight text-primary md:mb-2 lg:mb-9 md:text-2xl lg:text-4xl">
                        ${{ number_format($product->price, 2) }}
                    </div>

                    <div class="mb-6 md:mb-8">
                        {{ $product->description }}
                    </div>

                    <div class="flex mb-6 lg:mb-12">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if ($product->stock > 0)
                                <button type="submit"
                                    class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90 basis-full md:basis-1/2 lg:basis-2/5">
                                    + Add to cart
                                </button>
                            @else
                                <button type="button"
                                    class="inline-flex text-center font-bold leading-none uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-gray-400 cursor-not-allowed">
                                    Out of Stock
                                </button>
                            @endif
                        </form>
                    </div>

                    <div class="flex gap-3">
                        <a href="#"
                            class="relative flex w-10 h-10 items-center justify-center text-xs text-white transition-colors bg-social-facebook hover:bg-social-facebook/90">
                            <svg class="w-3 h-3" fill="currentColor">
                                <use xlink:href="{{ asset('assets/img/main/social-icons.svg#facebook') }}"></use>
                            </svg>
                        </a>
                        <a href="#"
                            class="relative flex w-10 h-10 items-center justify-center text-xs text-white transition-colors bg-social-twitter hover:bg-social-twitter/90">
                            <svg class="w-3 h-3" fill="currentColor">
                                <use xlink:href="{{ asset('assets/img/main/social-icons.svg#twitter') }}"></use>
                            </svg>
                        </a>
                    </div>

                </div>

            </div>

            <div class="grid grid-cols-12 gap-x-5 md:gap-x-6 lg:gap-x-7.5">
                <div class="col-span-full md:col-start-3 md:col-end-11">

                    <div class="pb-7">
                        <div
                            class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-between items-end">
                            <div class="flex flex-col">
                                <div
                                    class="text-base font-medium uppercase tracking-tight text-primary md:text-lg lg:text-xl xl:text-1.5xl">
                                    Reviews</div>
                                <h2
                                    class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                                    Write a Review</h2>
                            </div>

                        </div>
                        <form class="grid grid-cols-1 md:grid-cols-2 gap-7" action="{{ route('store.review') }}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="md:col-span-1">
                                <label
                                    class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                                    for="review-title">Review Title</label>
                                <input
                                    class="px-4 py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                                    type="text" name="review-title" id="review-title" value="" placeholder="">
                                <p class="group-[.is-error]:block mt-2 hidden text-xs text-danger"></p>
                            </div>
                            <div class="md:col-span-1">
                                <label
                                    class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                                    for="review-rating">Your Rating</label>
                                <div class="rating-stars">
                                    <select
                                        class="w-full border-base px-4 tracking-tight text-gray-900 transition-all duration-150 bg-white bg-caret bg-[length:10px_6px] bg-[position:right_24px_center] focus:border-accent focus:outline-0 focus:ring-0 hover:cursor-pointer dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:bg-caret-white h-[50px]"
                                        name="review-rating" id="review-rating">
                                        <option value="-">Select Rating</option>
                                        <option value="1">★</option>
                                        <option value="2">★★</option>
                                        <option value="3">★★★</option>
                                        <option value="4">★★★★</option>
                                        <option value="5">★★★★★</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label
                                    class="block text-sm font-bold uppercase tracking-tight text-gray-900 dark:text-white [&:not(:empty)]:mb-2.5"
                                    for="review-comment">Your Review</label>
                                <textarea
                                    class="block border-base bg-white w-full px-4 py-2 tracking-tight text-gray-900 transition-all duration-150 placeholder:text-gray-500/60 focus:border-accent focus:outline-0 focus:ring-0 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 h-32 md:h-40"
                                    name="review-comment" id="review-comment" placeholder=""></textarea>
                            </div>

                            <div class="col-span-full">
                                <button type="submit"
                                    class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-4 px-4 md:py-[18px] lg:px-8 text-sm text-white bg-primary hover:bg-primary/90 w-full">Post
                                    Review</button>
                            </div>
                        </form>

                    </div>
                    <ol class="text-lg leading-8 tracking-tight text-gray-500 p-0 m-0 pt-7">
                        @foreach ($reviews as $review)
                            <li class="mb-12 lg:mb-20">
                                <div class="flex gap-x-7 md:gap-x-9">
                                    <figure class="shrink-0 mt-0" style="width: 19%;">
                                        <img src="{{ asset($review->user->image ?? asset('assets/img/main/samples/user-4-80x80.jpg')) }}"
                                            alt="Comment Author Avatar">
                                    </figure>

                                    <div class="flex-grow">
                                        <div class="mb-6">
                                            <h5
                                                class="mb-2 text-lg md:text-1.5xl md:mb-3 font-bold leading-none tracking-tighter text-gray-900 dark:text-white uppercase">
                                                {{ $review->title }}
                                            </h5>

                                            <div class="flex items-center gap-x-4 relative text-sm leading-none">
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <svg role="img"
                                                        class="h-[13px] w-[13px] fill-gray-200 dark:fill-white/20">
                                                        <use xlink:href="assets/img/main/sprite.svg#star">
                                                        </use>
                                                    </svg>
                                                @endfor
                                                @for ($i = $review->rating; $i < 5; $i++)
                                                    <svg role="img"
                                                        class="h-[13px] w-[13px] fill-gray-900 dark:fill-white">
                                                        <use xlink:href="assets/img/main/sprite.svg#star">
                                                        </use>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="mb-7 text-base leading-8">
                                            {{ $review->comment }}
                                        </div>
                                        <div
                                            class="text-base leading-tight uppercase font-bold tracking-tighter text-gray-900 dark:text-white">
                                            by <strong class="text-primary">{{ $review->username }}</strong>
                                            <time class=""
                                                datetime="{{ $review->created_at }}">{{ $review->created_at->diffForHumans() }}</time>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>

                </div>

            </div>

        </div>
    </div>

</x-main>
