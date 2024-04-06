<x-main>

    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <iframe class="w-full aspect-[585/323] mb-6 lg:mb-7.5"
                src="https://player.twitch.tv/?channel={{ $twitchUsername }}&parent=localhost" allowfullscreen>
            </iframe>

            <div class="grid grid-cols-12 gap-5 md:gap-6 lg:gap-7.5">
                <div class="col-span-full md:col-span-6">

                    <div
                        class="relative isolate w-full aspect-[57/16] md:aspect-[57/12] flex bg-gradient-to-r from-primary to-[#ffe400] text-white overflow-hidden justify-between items-center">
                        <div class="leading-tight pl-5 lg:pl-8 xl:pl-10 flex-1">
                            <h4
                                class="font-bold text-2xl md:text-2xl md:leading-none leading-none lg:text-2.5xl xl:text-3xl xl:leading-none tracking-tighter uppercase mb-1.5">
                                Join the Conversation!</h4>
                            <div
                                class="font-bold text-sm leading-none md:text-base md:leading-none uppercase tracking-tighter">
                                Click here and participate in the chat!</div>
                        </div>

                        <img class="absolute -z-10 right-0 top-0 bottom-0 object-cover object-left max-w-[39%]"
                            src="assets/img/main/samples/stream-banner-1.png" alt="">

                        <svg class="absolute left-2 top-0.5 w-full h-full -z-20" fill="none" viewBox="0 0 570 120">
                            <defs>
                                <pattern id="dotted-pattern" x="0" y="0" width="26" height="26"
                                    patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="3" height="3" class="text-white/30"
                                        fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="570" height="120" fill="url(#dotted-pattern)" />
                        </svg>

                        <a href="#" class="block absolute inset-0"></a>
                    </div>

                </div>

                <div class="col-span-full md:col-span-6">

                    <div
                        class="relative isolate w-full aspect-[57/16] md:aspect-[57/12] flex bg-gradient-to-r from-[#7f26ff] to-[#ff46aa] text-white overflow-hidden justify-between items-center">
                        <div class="leading-tight pl-5 lg:pl-8 xl:pl-10 flex-1">
                            <h4
                                class="font-bold text-2xl md:text-2xl md:leading-none leading-none lg:text-2.5xl xl:text-3xl xl:leading-none tracking-tighter uppercase mb-1.5">
                                Subscribe to the Channel!</h4>
                            <div
                                class="font-bold text-sm leading-none md:text-base md:leading-none uppercase tracking-tighter">
                                Be the first to be notified of new streams!
                            </div>
                        </div>

                        <img class="absolute hidden sm:block -z-10 right-0 top-0 bottom-0 object-cover object-left max-w-[39%]"
                            src="assets/img/main/stream-banner-2.png" alt="">

                        <svg class="absolute left-2 top-0.5 w-full h-full -z-20" fill="none" viewBox="0 0 570 120">
                            <defs>
                                <pattern id="dotted-pattern" x="0" y="0" width="26" height="26"
                                    patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="3" height="3" class="text-white/20"
                                        fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="570" height="120" fill="url(#dotted-pattern)" />
                        </svg>

                        <a href="#" class="block absolute inset-0"></a>
                    </div>

                </div>
            </div>

            <div class="h-20 sm:h-28 md:h-36 lg:h-40 xl:h-44"></div>

            <div class="not-prose flex flex-row mb-9 sm:mb-12 md:mb-14 lg:mb-16 xl:mb-20 justify-between items-end">
                <div class="flex flex-col">
                    <div
                        class="text-base font-medium uppercase tracking-tight text-primary md:text-lg lg:text-xl xl:text-1.5xl">
                        Stream</div>
                    <h2
                        class="font-bold uppercase leading-none tracking-tighter text-gray-900 before:inline-block before:text-primary before:content-['.'] before:mr-[0.15em] dark:text-white text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5.5xl">
                        Schedule</h2>
                </div>

            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-y-7 gap-x-5">
                @foreach ($schedule as $day => $time)
                    <div class="flex flex-col">
                        <h5
                            class="text-gray-900 dark:text-white font-bold uppercase tracking-tighter text-base leading-none mb-4">
                            {{ $day }}</h5>
                        <div
                            class="flex-1 flex flex-col justify-center items-center py-7 px-5 lg:min-h-[120px] xl:min-h-[150px] bg-gray-50 dark:bg-gray-700 border-b-[6px] border-primary">
                            @if ($time)
                                <div
                                    class="font-bold uppercase leading-none tracking-tighter mb-0.5 text-xl md:text-2xl xl:text-3xl xl:mb-1.5">
                                    <span class="text-primary">{{ $time }}</span><span
                                        class="text-gray-900 dark:text-white">PM</span>
                                </div>
                                <div
                                    class="text-gray-600 text-sm uppercase font-bold tracking-tighter leading-none lg:text-base lg:leading-none">
                                    Eastern DT</div>
                            @else
                                <div
                                    class="font-bold uppercase leading-none tracking-tighter text-xl md:text-2xl lg:text-2.5xl xl:text-3xl text-gray-600">
                                    -</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

</x-main>
