<x-main>
    <div class="container mx-auto px-4 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <img class="w-full h-48 object-cover" src="{{ $blog->thumbnail }}" alt="{{ $blog->title }}">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $blog->title }}</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-4">
                    {{ $blog->content }}
                </p>
                <div class="mt-4">
                    <span class="text-gray-500 dark:text-gray-300">{{ $blog->created_at->format('M d, Y') }}</span>
                </div>
            </div>
        </div>
    </div>
</x-main>
