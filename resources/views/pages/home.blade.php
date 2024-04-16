<x-main>
   {{-- {{ dd(Auth::user());}} --}}
    <div class="relative h-[360px] w-full overflow-hidden sm:h-[420px] md:h-[440px] lg:h-[540px] xl:h-[640px]">

        <div class="relative z-10 mx-auto max-w-[1440px] px-5">

            <div
                class="absolute top-32 left-0 w-full px-5 text-center md:top-36 lg:top-32 lg:left-1/2 lg:w-1/2 lg:px-0 lg:text-left xl:-ml-10">
                <h1
                    class="text-5xl font-bold uppercase tracking-tighter text-gray-900 dark:text-white sm:text-6xl md:text-7xl lg:text-9xl lg:leading-[0.75em] xl:text-[170px]">
                    <span class="text-primary">Retro</span>
                    Gaming
                </h1>
                <div
                    class="text-lg font-medium uppercase tracking-tighter text-gray-900 dark:text-white sm:text-xl lg:pt-4 lg:text-2xl xl:pt-5 xl:pl-3 xl:text-[26px]">
                </div>
            </div>

            <div class="hidden md:block">
                <div class="absolute left-5 top-8 aspect-square w-3.5 bg-white"></div>
                <div class="absolute right-[91px] top-[120px] aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[168px] top-[120px] aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[91px] top-[197px] aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[91px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[168px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[244px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[321px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[398px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[474px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[551px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[627px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[704px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-[91px] top-8 aspect-square w-1 bg-primary"></div>
                <div class="absolute right-1 top-8 aspect-square w-3.5 bg-primary"></div>
                <div class="absolute right-1 top-[120px] aspect-square w-1 bg-primary"></div>
                <div class="absolute right-1 top-[197px] aspect-square w-1 bg-primary"></div>
                <div class="absolute right-1 top-[274px] aspect-square w-1 bg-primary"></div>
                <div class="absolute right-1 top-[351px] aspect-square w-1 bg-primary"></div>
            </div>
        </div>

        <div class="vv-hero-decoration-left absolute left-0 top-0 z-[5] h-full w-[calc(50vw-130px)] bg-primary"></div>

        <div class="absolute left-1/2 bottom-0 z-[5] ml-40 flex w-[50w]">
            <div class="vv-hero-decoration-parallelogram h-14 w-28 bg-primary"></div>
            <div class="vv-hero-decoration-parallelogram h-14 w-28 bg-primary"></div>
            <div class="vv-hero-decoration-parallelogram h-14 w-28 bg-primary"></div>
            <div class="vv-hero-decoration-parallelogram h-14 w-28 bg-primary"></div>
            <div class="vv-hero-decoration-parallelogram h-14 w-28 bg-primary"></div>
            <div class="vv-hero-decoration-parallelogram h-14 w-28 bg-primary"></div>
        </div>

        <img class="absolute left-1/2 z-[6] hidden -translate-x-[103%] lg:block"
            src="assets/img/main/samples/hero-character.png" alt="">

        <div
            class="left-0 top-0 block h-full w-full bg-[url('../../../assets/img/main/samples/hero-bg.jpg')] bg-cover bg-center bg-no-repeat opacity-10 dark:opacity-100">
            <div class="absolute inset-0 z-[1] bg-black mix-blend-color"></div>
            <div class="absolute inset-0 z-[2] mix-blend-multiply dark:bg-gray-800"></div>
            <div class="absolute inset-0 z-[3] opacity-40 mix-blend-screen dark:bg-[#283341]"></div>
        </div>

    </div>

    <div class="pt-10 pb-14 lg:pt-16 lg:pb-20 xl:pt-20 xl:pb-24">

 <section class="pb-14 lg:pb-[88px]">
    <div class="container">
        <div class="grid grid-cols-12 gap-x-5 gap-y-6 md:gap-x-6 lg:gap-x-7.5">
            <h5 class="col-span-full mb-8 text-center text-base font-bold uppercase leading-tight tracking-tighter text-gray-900 dark:text-white md:mb-12 xl:mb-10">
                These are some of my
                <span class="text-primary">partners</span>
                and brands I've worked with
            </h5>

            @foreach($partners as $partner)
            <div class="col-span-4 lg:col-span-2">
                <a href="#" class="group">
                    <img class="mx-auto opacity-20 transition-opacity group-hover:opacity-100"
                        src="{{ $partner->image }}" alt="{{ $partner->name }}">
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="py-14 lg:py-[88px]">
    <div class="container">
        <div class="grid grid-cols-12 gap-x-5 md:gap-x-6 lg:gap-x-7.5 gap-y-12">

            <div class="col-span-full md:col-span-6 relative z-[2] md:pt-6 lg:pt-8 xl:pt-10">
                <div class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-between items-end">
                    <div class="flex flex-col">
                        <div class="text-base font-medium uppercase tracking-tight text-primary md:text-lg lg:text-xl xl:text-1.5xl">About Me</div>
                        <h2 class="font-bold uppercase leading-none tracking-tighter text-gray-900 dark:text-white text-2.5xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-6.5xl xl:leading-[0.85em]">
                           {{ $bio->title ?? '' }}
                        </h2>
                    </div>

                </div>

                <div class="lg:max-w-sm xl:max-w-[402px] xl:-mt-4">
                    <p> {{ $bio->content ?? '' }}</p>

                    <div class="flex justify-end pb-4 pt-8 lg:pt-12">
                        <div class="font-decorative dark:text-white text-lg lg:text-1.5xl leading-tight -rotate-6">
                            {{  $user->admin->aliase ?? '' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-full md:col-span-6">
                <figure class="relative isolate z-[1]">
                    <img src="{{ $user->image ?? '' }}" alt="{{ $user->username ?? '' }}">

                    <svg class="hidden md:block md:absolute md:-left-16 md:top-6 md:w-[370px] lg:w-[400px] xl:-left-32 xl:top-12 xl:w-[470px] aspect-[47/50] -z-10" fill="none" viewBox="0 0 470 500">
                        <defs>
                            <pattern id="dotted-pattern" x="0" y="0" width="26" height="26" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="3" height="3" class="text-gray dark:text-[#70747b]" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="470" height="500" fill="url(#dotted-pattern)" />
                    </svg>
                </figure>
            </div>
        </div>
    </div>
</section>


        <section class="py-14 lg:py-[88px]">
            <div class="container">

                <div class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-center">
                    <div class="flex flex-col items-center">
                        <div
                            class="text-base font-medium uppercase tracking-tight text-primary md:text-lg lg:text-xl xl:text-1.5xl">
                            My Streaming</div>
                        <h2
                            class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2.5xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-6.5xl xl:leading-[0.85em]">
                            Gear</h2>
                    </div>

                </div>

                <div class="grid grid-cols-12 gap-x-5 gap-y-10 md:gap-x-6 lg:gap-x-7.5">
                    @foreach ($gearItems as $gear)
                        <div class="col-span-6 sm:col-span-4 lg:col-span-3 xl:col-span-2">
                            <div>
                                <figure class="relative overflow-hidden mb-5">
                                    <a class="block group" href="#">
                                        <img class="aspect-square w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                            src="{{ asset($gear->image) }}" alt="{{ $gear->name }}">
                                    </a>
                                </figure>

                                <div>
                                    <div class="mb-4">
                                        <!-- Here you can dynamically display the category icon -->
                                        <svg role="img" class="aspect-square w-[50px] fill-primary">
                                            <use
                                                xlink:href="{{ asset('assets/img/main/sprite.svg#' . $gear->tag) }}">
                                            </use>
                                        </svg>
                                    </div>

                                    <div class="mb-7">
                                        <h4
                                            class="uppercase font-bold tracking-tighter text-base leading-none text-gray-900 dark:text-white mb-2">
                                            {{ $gear->name }}
                                        </h4>
                                        <div
                                            class="uppercase font-bold tracking-tighter text-base leading-none text-primary">
                                            {{ $gear->brand }}
                                        </div>
                                    </div>

                                    <a href="#"
                                        class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-3 px-4 md:py-[13px] lg:px-7 text-sm text-gray-625 ring-1 ring-inset ring-gray-625 bg-transparent hover:bg-primary hover:text-white hover:ring-primary">
                                        Get it here!
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section class="py-14 lg:py-[88px]">
            <div class="container">

                <div
                    class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-between items-end">
                    <div class="flex flex-col">
                        <div
                            class="text-base font-medium uppercase tracking-tight text-primary md:text-lg lg:text-xl xl:text-1.5xl">
                            Keep Updated!</div>
                        <h2
                            class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2.5xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-6.5xl xl:leading-[0.85em]">
                            Twitter Feed</h2>
                    </div>

                    <a href="#"
                        class="inline-flex text-center font-bold leading-none transition-colors uppercase justify-center gap-x-3 py-3 px-4 md:py-[13px] lg:px-7 text-sm text-white bg-social-twitter hover:bg-social-twitter/90 mb-2">
                        <svg class="h-[14px] w-[14px]" fill="currentColor">
                            <use xlink:href="assets/img/main/social-icons.svg#twitter"></use>
                        </svg>
                        Follow Me!

                    </a>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6 lg:gap-7.5 place-items-start">

                    <div class="grid gap-5 md:gap-6 lg:gap-7.5">

                        <div class="bg-gray-50 p-6 dark:bg-gray-700 md:p-7 lg:p-8">
                            <div class="mb-7 flex items-center gap-x-3">
                                <figure class="flex-shrink-0 overflow-hidden rounded-full">
                                    <img class="aspect-square w-10 object-cover"
                                        src="{{ $user->image ?? '' }}" alt="NekoMaGiX">
                                </figure>
                                <div class="flex-1">
                                    <h5
                                        class="text-base font-bold leading-none tracking-tighter text-gray-900 dark:text-white">
                                        <a href="#">{{ $user->admin->aliase ?? '' }}</a>
                                    </h5>
                                    <div
                                        class="text-xs font-medium leading-tight tracking-tighter text-primary transition-colors hover:text-gray-900 dark:hover:text-white">
                                        <a href="#">'@'.{{  $user->admin->aliase ?? '' }}</a>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mb-6 text-sm font-medium leading-[22px] text-gray-900 dark:text-white [&_a]:font-bold [&_a]:text-[#01deff] hover:[&_a]:text-gray-900 dark:hover:[&_a]:text-white [&_img]:my-4 [&_img]:block">
                                Remember that this Friday at 9:00PM PCT I’ll be live streaming with <a
                                    href="#">@gamehuntress</a> playing the new story mode DLC of Witch Hunters!

                            </div>

                            <div class="text-xs tracking-tighter">
                                <time datetime="2023-01-01">26 minutes ago</time>
                            </div>

                        </div>

                        <div class="bg-gray-50 p-6 dark:bg-gray-700 md:p-7 lg:p-8">
                            <div class="mb-7 flex items-center gap-x-3">
                                <figure class="flex-shrink-0 overflow-hidden rounded-full">
                                    <img class="aspect-square w-10 object-cover"
                                        src="{{ $user->image ?? '' }}" alt="NekoMaGiX">
                                </figure>
                                <div class="flex-1">
                                    <h5
                                        class="text-base font-bold leading-none tracking-tighter text-gray-900 dark:text-white">
                                        <a href="#">{{  $user->admin->aliase ?? '' }}</a>
                                    </h5>
                                    <div
                                        class="text-xs font-medium leading-tight tracking-tighter text-primary transition-colors hover:text-gray-900 dark:hover:text-white">
                                        <a href="#">'@'. {{  $user->admin->aliase ?? '' }}</a>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mb-6 text-sm font-medium leading-[22px] text-gray-900 dark:text-white [&_a]:font-bold [&_a]:text-[#01deff] hover:[&_a]:text-gray-900 dark:hover:[&_a]:text-white [&_img]:my-4 [&_img]:block">
                                I’m gonna be having a special stream tonight at 9pm PCT! <a
                                    href="#">bitlyx.com/sTrm</a>

                            </div>

                            <div class="text-xs tracking-tighter">
                                <time datetime="2023-01-01">3 hours ago</time>
                            </div>

                        </div>

                    </div>

                    <div class="grid gap-5 md:gap-6 lg:gap-7.5">

                        <div class="bg-gray-50 p-6 dark:bg-gray-700 md:p-7 lg:p-8">
                            <div class="mb-7 flex items-center gap-x-3">
                                <figure class="flex-shrink-0 overflow-hidden rounded-full">
                                    <img class="aspect-square w-10 object-cover"
                                        src="{{ $user->image ?? '' }}" alt="NekoMaGiX">
                                </figure>
                                <div class="flex-1">
                                    <h5
                                        class="text-base font-bold leading-none tracking-tighter text-gray-900 dark:text-white">
                                        <a href="#">{{  $user->admin->aliase ?? '' }}</a>
                                    </h5>
                                    <div
                                        class="text-xs font-medium leading-tight tracking-tighter text-primary transition-colors hover:text-gray-900 dark:hover:text-white">
                                        <a href="#">'@'.{{  $user->admin->aliase ?? '' }}</a>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mb-6 text-sm font-medium leading-[22px] text-gray-900 dark:text-white [&_a]:font-bold [&_a]:text-[#01deff] hover:[&_a]:text-gray-900 dark:hover:[&_a]:text-white [&_img]:my-4 [&_img]:block">
                                YEAH! Finally I got my Witch Hunters Deluxe Pack! Keep an eye out for the upcoming
                                unboxing video!
                                <p><img src="assets/img/main/samples/twitter-img-1.jpg" alt=""></p>
                                <a href="#">#unboxing</a> <a href="#">#witchhunters</a> <a
                                    href="#">#deluxe</a>

                            </div>

                            <div class="text-xs tracking-tighter">
                                <time datetime="2023-01-01">14 hours ago</time>
                            </div>

                        </div>

                    </div>

                    <div
                        class="md:col-span-full lg:col-span-1 grid md:grid-cols-2 lg:grid-cols-1 gap-5 md:gap-6 lg:gap-7.5">

                        <div class="bg-gray-50 p-6 dark:bg-gray-700 md:p-7 lg:p-8">
                            <div class="mb-7 flex items-center gap-x-3">
                                <figure class="flex-shrink-0 overflow-hidden rounded-full">
                                    <img class="aspect-square w-10 object-cover"
                                        src="{{ $user->image ?? '' }}" alt="NekoMaGiX">
                                </figure>
                                <div class="flex-1">
                                    <h5
                                        class="text-base font-bold leading-none tracking-tighter text-gray-900 dark:text-white">
                                        <a href="#">{{  $user->admin->aliase ?? '' }}</a>
                                    </h5>
                                    <div
                                        class="text-xs font-medium leading-tight tracking-tighter text-primary transition-colors hover:text-gray-900 dark:hover:text-white">
                                        <a href="#">'@'.{{  $user->admin->aliase ?? '' }}</a>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mb-6 text-sm font-medium leading-[22px] text-gray-900 dark:text-white [&_a]:font-bold [&_a]:text-[#01deff] hover:[&_a]:text-gray-900 dark:hover:[&_a]:text-white [&_img]:my-4 [&_img]:block">
                                I’ll be having a Mochi’s Island speedrun for charity! Hope to see you all there! <a
                                    href="#">bitlyx.com/chRty</a>

                            </div>

                            <div class="text-xs tracking-tighter">
                                <time datetime="2023-01-01">2 days ago</time>
                            </div>

                        </div>

                        <div class="bg-gray-50 p-6 dark:bg-gray-700 md:p-7 lg:p-8">
                            <div class="mb-7 flex items-center gap-x-3">
                                <figure class="flex-shrink-0 overflow-hidden rounded-full">
                                    <img class="aspect-square w-10 object-cover"
                                        src="{{ $user->image ?? '' }}" alt="NekoMaGiX">
                                </figure>
                                <div class="flex-1">
                                    <h5
                                        class="text-base font-bold leading-none tracking-tighter text-gray-900 dark:text-white">
                                        <a href="#">{{  $user->admin->aliase ?? '' }}</a>
                                    </h5>
                                    <div
                                        class="text-xs font-medium leading-tight tracking-tighter text-primary transition-colors hover:text-gray-900 dark:hover:text-white">
                                        <a href="#">'@'.{{  $user->admin->aliase ?? '' }}</a>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="mb-6 text-sm font-medium leading-[22px] text-gray-900 dark:text-white [&_a]:font-bold [&_a]:text-[#01deff] hover:[&_a]:text-gray-900 dark:hover:[&_a]:text-white [&_img]:my-4 [&_img]:block">
                                We’re a few days away from the charity livestream for <a
                                    href="#">@purplecross</a> Join us for a great cause!

                            </div>

                            <div class="text-xs tracking-tighter">
                                <time datetime="2023-01-01">5 days ago</time>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>

    </div>
</x-main>
