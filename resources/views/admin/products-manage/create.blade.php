<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <div class="container mx-auto">
            <h2
                class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                Add New Product
            </h2>

            <!-- Form to create a new product -->
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="thumbnail_image" class="block text-lg text-gray-700 dark:text-white">Thumbnail
                        Image:</label>
                    <input type="file" name="thumbnail_image" id="thumbnail_image" class="...">
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-lg text-gray-700 dark:text-white">Name:</label>
                    <input type="text" name="name" id="name"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-lg text-gray-700 dark:text-white">Price:</label>
                    <input type="number" name="price" id="price"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        step="0.01" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-lg text-gray-700 dark:text-white">Category:</label>
                    <input type="text" name="category" id="category"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg text-gray-700 dark:text-white">Description:</label>
                    <textarea name="description" id="description"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"></textarea>
                </div>

                <div class="mb-4">
                    <label for="thumbnail" class="block text-lg text-gray-700 dark:text-white">Thumbnail (URL):</label>
                    <input type="text" name="thumbnail" id="thumbnail"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full">
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-lg text-gray-700 dark:text-white">Stock:</label>
                    <input type="number" name="stock" id="stock"
                        class="py-2 border-base bg-white bg-[length:18px_18px,_38px_38px] bg-[position:right_16px_center,_right_6px_center] bg-no-repeat font-medium leading-8 tracking-tight text-gray-900 transition-all duration-150 placeholder:font-normal placeholder:text-gray-500/60 focus:border-accent focus:bg-white focus:text-gray-900 focus:outline-0 focus:ring-0 dark:border-gray-600 dark:group-[.is-success]:bg-input-success dark:bg-gray-800 dark:text-white dark:placeholder:text-gray-500/80 dark:focus:border-accent dark:focus:bg-gray-900 w-full"
                        required>
                </div>

                <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded">Submit</button>
            </form>
        </div>
    </div>
</x-main>
