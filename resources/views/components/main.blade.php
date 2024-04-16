<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Streamer and Youtuber HTML Template">
        <meta name="author" content="Dan Fisher">
        <meta name="keywords" content="youtube, streamer, stream, creator">
        <!-- Favicons -->
        <link rel="shortcut icon" href="{{ asset('assets/img/main/favicons/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/main/favicons/favicon-120.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/main/favicons/favicon-152.png') }}">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;700&amp;family&#x3D;Rock+Salt&display=swap"
            rel="stylesheet">
        <!-- Tailwind CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Vendor CSS -->
        <link href="{{ asset('assets/vendors/common/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendors/common/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">
        <!-- Template CSS -->
        <link href="{{ asset('assets/css/main/style.css') }}" rel="stylesheet">
    </head>

    <body
        class="relative z-10 antialiased font-base text-gray-500 text-sm font-medium h-full bg-white dark:bg-gray-800 overflow-x-hidden dark:text-gray lg:text-base">
        <div id="site-wrapper" class="flex flex-col h-full js-site-wrapper">
            @include('layouts.navigation_main')
            <main id="main-content" class="grow lg:pt-0">
                {{ $slot }}
            </main>
        </div>
        <footer id="site-footer">

            <div class="bg-gray-50 py-12 dark:bg-gray-900 sm:py-16 md:py-20 lg:py-24 xl:py-[104px]">
                <div class="mx-auto max-w-[1440px] px-5">
                    <div class="grid grid-cols-1 items-baseline justify-center gap-y-10 lg:grid-cols-[20%_1fr_20%]">
                        <div class="justify-self-center lg:justify-self-start">
                            <p class=" bolder text-3xl"> <span
                                    class="text-primary dark:text-primary">S</span>treamofilio
                            </p>
                        </div>

                        <nav>
                            <ul
                                class="flex flex-wrap justify-center gap-x-4 text-base font-bold uppercase tracking-tight sm:gap-x-6 lg:gap-x-7 xl:gap-x-10">
                                <li>
                                    <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                        href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                        href="{{ route('stream') }}">Stream</a>
                                </li>
                                <li>
                                    <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                        href="{{ route('affiliates') }}">Affiliates</a>
                                </li>
                                <li>
                                    <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                        href="{{ route('shop') }}">Shop</a>
                                </li>
                                <li>
                                    <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                        href="{{ route('contact') }}">Contact</a>
                                </li>
                                <li>
                                    <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                        href="{{ route('blogs') }}">Blogs</a>
                                </li>
                            </ul>
                        </nav>

                        <!-- Social Links -->
                        <ul class="flex flex-wrap gap-6 justify-self-center lg:gap-4 lg:justify-self-end xl:gap-6">
                            <li>
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="https://www.facebook.com/" title="Facebook">
                                    <svg class="h-4 w-4" fill="currentColor">
                                        <use xlink:href="assets/img/main/social-icons.svg#facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="https://twitter.com/" title="Twitter">
                                    <svg class="h-4 w-4" fill="currentColor">
                                        <use xlink:href="assets/img/main/social-icons.svg#twitter"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="https://instagram.com/" title="Instagram">
                                    <svg class="h-4 w-4" fill="currentColor">
                                        <use xlink:href="assets/img/main/social-icons.svg#instagram"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="https://twitch.tv/" title="Twitch">
                                    <svg class="h-4 w-4" fill="currentColor">
                                        <use xlink:href="assets/img/main/social-icons.svg#twitch"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="https://discord.com" title="Discord">
                                    <svg class="h-4 w-4" fill="currentColor">
                                        <use xlink:href="assets/img/main/social-icons.svg#discord"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="text-gray-900 transition-colors hover:text-primary dark:text-white dark:hover:text-primary"
                                    href="https://patreon.com" title="Patreon">
                                    <svg class="h-4 w-4" fill="currentColor">
                                        <use xlink:href="assets/img/main/social-icons.svg#patreon"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        <!-- Social Links / End -->

                    </div>
                </div>
            </div>

            <div class="bg-primary py-8">
                <div class="mx-auto max-w-[1440px] px-5">
                    <div
                        class="flex flex-col flex-wrap items-center justify-between gap-y-2 text-center text-sm font-bold leading-6 tracking-tight text-white md:flex-row">
                        <div>
                            Fil Rouge - 2024 / 2025
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <dialog id="login-register"
            class="js-vv-modal mx-auto w-[470px] max-w-[90%] border-none bg-transparent p-0 backdrop:bg-gray-900/90">
            <div class="pt-[22px]">
                <div class="bg-white dark:bg-gray-700 shadow-3xl overflow-y-auto">
                    <div
                        class="relative overflow-hidden isolate flex h-28 items-center bg-primary px-6 md:px-10 lg:h-[140px]">
                        <div class="relative z-[4] text-white sm:ml-[56%]">
                            <h4
                                class="text-2xl leading-none font-bold mb-1 lg:text-3xl xl:text-[38px] xl:leading-[0.74em] tracking-tighter uppercase">
                                <span>Login &</span>
                                <span class="block xl:leading-none xl:text-[32px]">Register</span>
                            </h4>
                            <div class="font-bold leading-none uppercase tracking-tighter">I’m glad to see you here!
                            </div>
                        </div>
                        <svg class="absolute left-0 top-0 w-full h-full -z-20" fill="none" viewBox="0 0 470 140">
                            <defs>
                                <pattern id="dotted-pattern" x="0" y="0" width="26" height="26"
                                    patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="3" height="3" class="text-white/30"
                                        fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="470" height="140" fill="url(#dotted-pattern)" />
                        </svg>
                        <img class="hidden sm:block absolute left-0 top-0 h-full z-[5] object-cover aspect-[251/140]"
                            src="{{ asset('assets/img/main/samples/modal-header-hero.png') }}" alt="">
                    </div>
                    <div>
                        <div class="tabs">
                            <nav class="tabs__header overflow-hidden">
                                <ul class="grid grid-cols-2 gap-x-[1px] dark:bg-gray-500/20">
                                    <li class="tabs__header-item is-active group">
                                        <a href="#"
                                            class="flex justify-center uppercase tracking-tighter border-b bg-gray-50 dark:bg-gray-800 group-[.is-active]:bg-white border-gray-500/20 py-4 text-center font-bold text-gray-600 transition-colors hover:text-gray-900 dark:hover:text-white group-[.is-active]:text-primary dark:group-[.is-active]:border-gray-700 group-[.is-active]:border-white dark:group-[.is-active]:bg-gray-700 dark:group-[.is-active]:hover:text-primary">Login</a>
                                    </li>
                                    <li class="tabs__header-item group flex-1">
                                        <a href="#"
                                            class="flex justify-center uppercase tracking-tighter border-b bg-gray-50 dark:bg-gray-800 group-[.is-active]:bg-white border-gray-500/20 py-4 text-center font-bold text-gray-600 transition-colors hover:text-gray-900 dark:hover:text-white group-[.is-active]:text-primary dark:group-[.is-active]:border-gray-700 group-[.is-active]:border-white dark:border-gray-500/20 dark:group-[.is-active]:bg-gray-700 dark:group-[.is-active]:hover:text-primary">Register</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="tabs__content py-6 px-6 lg:px-10 lg:py-9">
                                <div class="tabs__content-item">
                                    <x-login-form />
                                </div>
                                <div class="tabs__content-item">
                                    <x-register-form />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </dialog>
        </div>

        <!-- Scripts -->
        <!-- Vendors JS -->
        <script src="{{ asset('assets/vendors/common/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/common/swiper/js/swiper-bundle.min.js') }}"></script>

        <!-- Template JS -->
        <script src="{{ asset('assets/js/main/common.js') }}"></script>
        <script src="{{ asset('assets/js/main/init.js') }}"></script>
    </body>

</html>
