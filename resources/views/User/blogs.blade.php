<x-main>
    <div class="py-12 lg:py-16 xl:py-20">
        <div class="container mx-auto px-4 lg:px-8 xl:px-0">
            <!-- Standard form submission -->
            <form id="searchForm" action="{{ route('blogs.search') }}" method="GET" class="mb-6">
                <input
                    class="px-4 py-2 bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 border border-gray-300 rounded-lg bg-white font-medium leading-8 text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 w-full md:w-3/4"
                    type="text" id="searchInput" name="query" placeholder="Search blogs">
                <button
                    class="mt-2 md:mt-0 md:ml-2 py-2 px-4 bg-primary text-white font-bold uppercase rounded-lg hover:bg-primary-dark focus:outline-none focus:bg-primary-dark transition duration-150 ease-in-out"
                    type="submit">Search</button>
            </form>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @forelse ($blogs as $blog)
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover object-center" src="{{ $blog->thumbnail }}" alt="{{ $blog->title }}">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $blog->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                                {{ Illuminate\Support\Str::limit($blog->content, 150, '...') }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 dark:text-gray-300">{{ $blog->created_at->format('M d, Y') }}</span>
                                <a href="{{ route('blog.show', $blog->id) }}" class="text-primary dark:text-primary hover:underline">Read more</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-600 dark:text-gray-300">No results found for "{{ request('query') }}"</div>
                @endforelse
            </div>
        </div>
    </div>
</x-main>
