<x-main>

    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <div class="flex flex-col gap-y-7.5">

                @foreach ($affiliates as $affiliate)
                    <div class="flex flex-col sm:flex-row sm:flex-wrap bg-gray-50 dark:bg-gray-700">
                        <!-- Affiliate Image -->
                        <figure class="shrink-0 ml-6 mt-6 sm:ml-0 sm:mt-0">
                            <a href="#">
                                <img class="w-28 md:w-36 lg:w-40 xl:w-auto" src="{{ asset($affiliate->image) }}"
                                    alt="{{ $affiliate->title }}">
                            </a>
                        </figure>

                        <!-- Affiliate Details -->
                        <div class="flex-1 p-6 sm:p-7 md:p-8 lg:p-10 xl:p-12">
                            <div class="flex flex-wrap justify-between gap-6 mb-5 lg:mb-7">
                                <div>
                                    <!-- Affiliate Title -->
                                    <hgroup class="-mt-1">
                                        <h3
                                            class="uppercase text-xl lg:text-2xl lg:leading-none font-bold text-gray-900 dark:text-white leading-none tracking-tight">
                                            {{ $affiliate->title }}</h3>
                                        <p class="font-bold uppercase text-primary tracking-tight mb-2">Use code
                                            "{{ $affiliate->code }}" for {{ $affiliate->discount }}% off your order</p>
                                    </hgroup>

                                    <!-- Affiliate Rating Stars -->
                                    <div class="flex items-center gap-x-2 relative text-sm leading-none">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $affiliate->stars)
                                                <svg role="img" class="h-5 w-5 fill-current text-primary"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 1.938l2.383 6.406h6.198a.766.766 0 0 1 .533 1.3l-5.227 4.144 1.978 6.114a.768.768 0 0 1-1.174.896L12 17.714l-5.689 4.084a.768.768 0 0 1-1.174-.896l1.978-6.114-5.227-4.144a.766.766 0 0 1 .533-1.3h6.198z" />
                                                </svg>
                                            @else
                                                <svg role="img"
                                                    class="h-5 w-5 fill-current text-gray-200 dark:text-white"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 1.938l2.383 6.406h6.198a.766.766 0 0 1 .533 1.3l-5.227 4.144 1.978 6.114a.768.768 0 0 1-1.174.896L12 17.714l-5.689 4.084a.768.768 0 0 1-1.174-.896l1.978-6.114-5.227-4.144a.766.766 0 0 1 .533-1.3h6.198z" />
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>

                                </div>
                            </div>

                            <!-- Affiliate Description -->
                            <div class="">
                                {{ $affiliate->description }}
                            </div>

                        </div>

                        <!-- Get Deal Button -->
                        <div
                            class="flex items-center justify-center basis-full md:basis-auto p-6 sm:p-7 md:p-8 lg:p-10 xl:p-12">
                            <a href="{{ $affiliate->link }}"
                                class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-3 px-4 md:py-[13px] lg:px-7 text-sm text-gray-625 ring-1 ring-inset ring-gray-625 bg-transparent hover:bg-primary hover:text-white hover:ring-primary">
                                Get Deal!
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="h-12 sm:h-16 md:h-20 lg:h-24 xl:h-28"></div>

            <div class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-center">
                <div class="flex flex-col items-center">
                    <div
                        class="text-base font-medium uppercase tracking-tight text-primary md:text-lg lg:text-xl xl:text-1.5xl">
                        Affiliates</div>
                    <h2
                        class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                        FAQS</h2>
                </div>

            </div>

            <div class="grid grid-cols-12 gap-x-5 md:gap-x-6 lg:gap-x-7.5">
                <div class="col-span-full lg:col-start-3 lg:col-span-8">
                    <div class="accordion flex flex-col gap-y-4 lg:gap-y-5 xl:gap-y-12 items-center">

                        <div class="accordion__item group active">
                            <div
                                class="accordion__item-trigger relative flex cursor-pointer flex-wrap items-center gap-2 font-bold text-gray-900 dark:text-white lg:gap-2.5 lg:text-xl text-center justify-center xl:text-2xl uppercase tracking-tight">
                                <span class="pr-1 lg:pr-2">So, what’s an affiliate?</span>
                                <span
                                    class="before:bg-primary after:bg-primary relative aspect-square w-3.5 before:absolute before:left-1/2 before:top-1/2 before:h-1 before:w-3.5 before:-translate-x-1/2 before:-translate-y-1/2 after:visible after:absolute after:left-1/2 after:top-1/2 after:h-3.5 after:w-1 after:-translate-x-1/2 after:-translate-y-1/2 group-[.active]:after:invisible"></span>
                            </div>
                            <div class="accordion__item-content animate-fade hidden group-[.active]:block">
                                <div class="pt-5 lg:pt-8 xl:pt-10 text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item group">
                            <div
                                class="accordion__item-trigger relative flex cursor-pointer flex-wrap items-center gap-2 font-bold text-gray-900 dark:text-white lg:gap-2.5 lg:text-xl text-center justify-center xl:text-2xl uppercase tracking-tight">
                                <span class="pr-1 lg:pr-2">Does it cost me something?</span>
                                <span
                                    class="before:bg-primary after:bg-primary relative aspect-square w-3.5 before:absolute before:left-1/2 before:top-1/2 before:h-1 before:w-3.5 before:-translate-x-1/2 before:-translate-y-1/2 after:visible after:absolute after:left-1/2 after:top-1/2 after:h-3.5 after:w-1 after:-translate-x-1/2 after:-translate-y-1/2 group-[.active]:after:invisible"></span>
                            </div>
                            <div class="accordion__item-content animate-fade hidden group-[.active]:block">
                                <div class="pt-5 lg:pt-8 xl:pt-10 text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item group">
                            <div
                                class="accordion__item-trigger relative flex cursor-pointer flex-wrap items-center gap-2 font-bold text-gray-900 dark:text-white lg:gap-2.5 lg:text-xl text-center justify-center xl:text-2xl uppercase tracking-tight">
                                <span class="pr-1 lg:pr-2">Do I get any benefits?</span>
                                <span
                                    class="before:bg-primary after:bg-primary relative aspect-square w-3.5 before:absolute before:left-1/2 before:top-1/2 before:h-1 before:w-3.5 before:-translate-x-1/2 before:-translate-y-1/2 after:visible after:absolute after:left-1/2 after:top-1/2 after:h-3.5 after:w-1 after:-translate-x-1/2 after:-translate-y-1/2 group-[.active]:after:invisible"></span>
                            </div>
                            <div class="accordion__item-content animate-fade hidden group-[.active]:block">
                                <div class="pt-5 lg:pt-8 xl:pt-10 text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.
                                </div>
                            </div>
                        </div>
                        <div class="accordion__item group">
                            <div
                                class="accordion__item-trigger relative flex cursor-pointer flex-wrap items-center gap-2 font-bold text-gray-900 dark:text-white lg:gap-2.5 lg:text-xl text-center justify-center xl:text-2xl uppercase tracking-tight">
                                <span class="pr-1 lg:pr-2">I want in! Can I be an affiliate?</span>
                                <span
                                    class="before:bg-primary after:bg-primary relative aspect-square w-3.5 before:absolute before:left-1/2 before:top-1/2 before:h-1 before:w-3.5 before:-translate-x-1/2 before:-translate-y-1/2 after:visible after:absolute after:left-1/2 after:top-1/2 after:h-3.5 after:w-1 after:-translate-x-1/2 after:-translate-y-1/2 group-[.active]:after:invisible"></span>
                            </div>
                            <div class="accordion__item-content animate-fade hidden group-[.active]:block">
                                <div class="pt-5 lg:pt-8 xl:pt-10 text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</x-main>
