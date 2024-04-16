<x-main>
    <div class="py-12 lg:py-16 xl:py-20">
        <div class="container mx-auto">
            <!-- Page Title -->
            <div class="mb-7">
                <h2
                    class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                    Blog <span class="text-primary">Management</span>
                </h2>
            </div>

            <!-- Add New Blog Button -->
            <div class="mb-4">
                <a href="{{ route('blogs.create') }}" class="bg-primary text-white font-bold py-2 px-4 rounded">Add New
                    Blog</a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Head -->
                    <thead class="bg-gray-200 dark:bg-gray-800">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Thumbnail</th> <!-- Added column for thumbnail -->
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Title</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Content</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Category</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Tags</th> <!-- Added column for Tags -->
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($blogs as $blog)
                            <tr>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <img src="{{ $blog->thumbnail }}" alt="{{ $blog->title }}"
                                        class="w-16 h-16 object-cover">
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white"><a
                                        href="{{ route('blog.show', $blog->id) }}"
                                        class="text-primary hover:underline">{{ $blog->title }} </a> </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    {{ \Illuminate\Support\Str::limit($blog->content, 150, $end = '...') }}
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $blog->category }}</td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $blog->tags }}</td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <a href="{{ route('blogs.edit', $blog->id) }}"
                                        class="text-green-500 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <!-- Pagination Links -->
            <nav class="pt-2 md:pt-3 lg:pt-4">
                <ul class="flex flex-wrap items-center justify-center gap-x-1.5 md:gap-x-2 lg:gap-x-4">
                    <!-- Page Number Links -->
                    @if ($blogs->lastPage() > 1)
                        @for ($page = 1; $page <= $blogs->lastPage(); $page++)
                            <li>
                                <a href="{{ $blogs->url($page) }}"
                                    class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square font-bold transition-colors bg-gray-{{ $page == $blogs->currentPage() ? '50' : '100' }} dark:bg-gray-{{ $page == $blogs->currentPage() ? '700' : '800' }} hover:bg-primary dark:hover:bg-primary text-gray-{{ $page == $blogs->currentPage() ? '900' : '700' }} dark:text-white hover:text-white dark:hover:text-white">{{ $page }}</a>
                            </li>
                        @endfor
                    @endif
                </ul>
            </nav>

        </div>
    </div>
</x-main>
