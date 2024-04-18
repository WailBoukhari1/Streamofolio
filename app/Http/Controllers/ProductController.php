<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function create()
    {
        return view('admin.products-manage.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if thumbnail URL is provided
        if ($request->hasFile('thumbnail_image')) {
            // Get the uploaded file
            $thumbnailImage = $request->file('thumbnail_image');

            // Store the uploaded file in the public/assets directory
            $path = $thumbnailImage->store('assets', 'public');

            // Prepend 'storage/' to the path
            $thumbnail = 'storage/' . $path;
        } else {
            $thumbnail = null;
        }
        // Create the product
        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'stock' => $request->input('stock'),
            'thumbnail' => $thumbnail,
        ]);

        // Redirect to index page or wherever you need
        return redirect()->route('products.index');
    }
    public function edit(Product $product)
    {
        return view('admin.products-manage.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'rating' => 'nullable|integer|min:0',
            'stock' => 'required|integer|min:0',
            'sold' => 'nullable|integer|min:0',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if a new thumbnail image is uploaded
        if ($request->hasFile('thumbnail_image')) {
            // Get the uploaded file
            $thumbnailImage = $request->file('thumbnail_image');

            // Store the uploaded file in the public/assets directory
            $path = $thumbnailImage->store('assets', 'public');

            // Prepend 'storage/' to the path
            $thumbnail = 'storage/' . $path;

            // Delete the old thumbnail if exists
            if ($product->thumbnail) {
                Storage::disk('public')->delete(str_replace('storage/', '', $product->thumbnail));
            }
        } else {
            // Keep the existing thumbnail if no new image uploaded
            $thumbnail = $product->thumbnail;
        }

        // Update the product
        $product->update(array_merge($validatedData, ['thumbnail' => $thumbnail]));

        return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
