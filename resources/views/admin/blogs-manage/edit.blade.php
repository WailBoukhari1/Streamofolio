<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <div class="container mx-auto">
            <h2 class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                Edit Blog
            </h2>

            <!-- Form to edit the blog -->
            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="thumbnail" class="block text-lg text-gray-700 dark:text-white">Thumbnail:</label>
                    <input type="file" name="thumbnail" id="thumbnail"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"></textarea>
                </div>

                <!-- Display currently selected thumbnail image -->
                <div class="mb-4">
                    <label class="block text-lg text-gray-700 dark:text-white">Currently Selected Thumbnail:</label>
                    @if($blog->thumbnail)
                    <img src="{{ asset($blog->thumbnail) }}" alt="Blog Thumbnail" class="rounded-md mb-2">
                    @else
                    <p>No thumbnail selected</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-lg text-gray-700 dark:text-white">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $blog->title }}"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"></textarea>
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-lg text-gray-700 dark:text-white">Content:</label>
                    <textarea name="content" id="content" rows="5"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"></textarea>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-lg text-gray-700 dark:text-white">Category:</label>
                    <input type="text" name="category" id="category" value="{{ $blog->category }}"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"></textarea>
                </div>

                <!-- Add other fields here if needed -->

                <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded hover:bg-primary-dark transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">Update Blog</button>
            </form>
        </div>
    </div>
</x-main>
