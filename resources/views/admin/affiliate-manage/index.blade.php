<x-main>
    <div class="py-12 lg:py-16 xl:py-20">
        <div class="container mx-auto">
            <!-- Page Title -->
            <div class="mb-7">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-gray-900 dark:text-white mb-8 uppercase">
                    Affiliates</h1>
            </div>

            <!-- Add New Affiliate Button -->
            <div class="mb-4">
                <a href="{{ route('affiliates.create') }}" class="bg-primary text-white font-bold py-2 px-4 rounded">Create New Affiliate</a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Table Head -->
                    <thead class="bg-gray-200 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">Thumbnail</th>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">Title</th>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">Stars</th>
                            <th class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($affiliates as $affiliate)
                            <tr>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $affiliate->image) }}" alt="{{ $affiliate->title }}" class="w-16 h-16 object-cover">
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $affiliate->title }}</td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <div class="flex items-center gap-x-2 relative text-sm leading-none">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $affiliate->stars)
                                                <svg role="img" class="h-5 w-5 fill-current text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M12 1.938l2.383 6.406h6.198a.766.766 0 0 1 .533 1.3l-5.227 4.144 1.978 6.114a.768.768 0 0 1-1.174.896L12 17.714l-5.689 4.084a.768.768 0 0 1-1.174-.896l1.978-6.114-5.227-4.144a.766.766 0 0 1 .533-1.3h6.198z"/>
                                                </svg>
                                            @else
                                                <svg role="img" class="h-5 w-5 fill-current text-gray-200 dark:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M12 1.938l2.383 6.406h6.198a.766.766 0 0 1 .533 1.3l-5.227 4.144 1.978 6.114a.768.768 0 0 1-1.174.896L12 17.714l-5.689 4.084a.768.768 0 0 1-1.174-.896l1.978-6.114-5.227-4.144a.766.766 0 0 1 .533-1.3h6.198z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <a href="{{ route('affiliates.edit', $affiliate->id) }}" class="text-green-500 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('affiliates.destroy', $affiliate->id) }}" method="POST" class="inline">
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
        </div>
    </div>
</x-main>
