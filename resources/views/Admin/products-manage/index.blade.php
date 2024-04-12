<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <div class="container mx-auto">
            <!-- Page Title -->
            <div class="mb-7">
                <h2
                    class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                    Product <span class="text-primary">Management</span>
                </h2>
            </div>

            <!-- Add New Product Button -->
            <div class="mb-4">
                <a href="{{ route('products.create') }}" class="bg-primary text-white font-bold py-2 px-4 rounded">Add New
                    Product</a>
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
                                Name</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Price</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Category</th>
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Rating</th> <!-- Added column for Rating -->
                            <th
                                class="px-6 py-3 text-left text-lg md:text-xl font-semibold text-gray-800 dark:text-white">
                                Actions</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                                        class="w-16 h-16 object-cover">
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white"><a
                                        href="{{ route('single-product', $product->id) }}"
                                        class="text-primary hover:underline">{{ $product->name }} </a> </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">${{ $product->price }}</td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">{{ $product->category }}</td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <div class="flex items-center gap-x-2 relative text-sm leading-none">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $product->rating)
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
                                </td>
                                <td class="px-6 py-4 text-lg text-gray-900 dark:text-white">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="text-green-500 hover:underline mr-2">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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
            <nav class="pt-2 md:pt-3 lg:pt-4">
                <ul class="flex flex-wrap items-center justify-center gap-x-1.5 md:gap-x-2 lg:gap-x-4">
                    <!-- Page Number Links -->
                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="inline-flex justify-center items-center w-8 lg:w-12.5 aspect-square font-bold transition-colors bg-gray-{{ $page == $products->currentPage() ? '50' : '100' }} dark:bg-gray-{{ $page == $products->currentPage() ? '700' : '800' }} hover:bg-primary dark:hover:bg-primary text-gray-{{ $page == $products->currentPage() ? '900' : '700' }} dark:text-white hover:text-white dark:hover:text-white">{{ $page }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>

        </div>
    </div>
</x-main>
