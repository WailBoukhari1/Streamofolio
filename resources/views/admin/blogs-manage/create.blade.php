<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <div class="container mx-auto">
            <h2
                class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                Create New Blog
            </h2>

            <!-- Form to create a new blog -->
            <form action="{{ route('blogs.store') }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-lg text-gray-700 dark:text-white">Title:</label>
                    <input type="text" name="title" id="title"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" ">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-lg text-gray-700 dark:text-white">Content:</label>
                    <textarea name="content" id="content" rows="5"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full" "></textarea>
                </div>

                <!-- Add other fields here if needed -->

                <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded hover:bg-primary-dark transition-colors duration-300">Create Blog</button>
            </form>
        </div>
    </div>
</x-main>
