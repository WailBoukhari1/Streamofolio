<x-main>
    <div class="pt-4 pb-4 lg:pt-24 xl:pt-32">
        <div class="container mx-auto">
            <h2 class="font-bold text-4xl md:text-5xl lg:text-6xl xl:text-7xl text-gray-900 dark:text-white mb-8 uppercase">
                Edit Product
            </h2>

            <!-- Form to edit an existing product -->
            <form action="{{ route('products.update', $product->id) }}" method="POST" class="max-w-lg mx-auto">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-lg text-gray-700 dark:text-white">Name:</label>
                    <input type="text" name="name" id="name" class="...">
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-lg text-gray-700 dark:text-white">Price:</label>
                    <input type="number" name="price" id="price" step="0.01" class="...">
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-lg text-gray-700 dark:text-white">Category:</label>
                    <input type="text" name="category" id="category" class="...">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg text-gray-700 dark:text-white">Description:</label>
                    <textarea name="description" id="description" class="..."></textarea>
                </div>

                <div class="mb-4">
                    <label for="thumbnail" class="block text-lg text-gray-700 dark:text-white">Thumbnail (URL):</label>
                    <input type="text" name="thumbnail" id="thumbnail" class="...">
                </div>

                <div class="mb-4">
                    <label for="stock" class="block text-lg text-gray-700 dark:text-white">Stock:</label>
                    <input type="number" name="stock" id="stock" class="...">
                </div>

                <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded">Update</button>
            </form>
        </div>
    </div>
</x-main>
