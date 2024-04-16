<x-main>

    <div class="pt-12 pb-20 lg:pb-44 lg:pt-24 xl:pt-[105px]">
        <div class="container">

            <iframe class="w-full aspect-[585/323] mb-6 lg:mb-7.5"
                src="https://player.twitch.tv/?channel={{ $twitchUsername }}&parent=localhost" allowfullscreen>
            </iframe>

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
