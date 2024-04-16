<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $blogs = Blog::where('title', 'like', '%' . $query . '%')->get();

        return view('pages.blogs', compact('blogs' , 'query'));
    }

    // Display all blogs
    public function index()
    {
         $blogs = Blog::paginate(10); 
        return view('admin.blogs-manage.index', compact('blogs'));
    }

    // Display the form to create a new blog
    public function create()
    {
        return view('admin.blogs-manage.create');
    }

    // Store the newly created blog
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            'category' => 'required|string|max:255', // Validation for category field
            // Add any other validation rules here
        ]);

        // Upload the image
        $imageName = time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'), $imageName);

        // Create the blog
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => 'images/' . $imageName,
            'category' => $request->category,
            // Add any other fields here
        ]);

        return redirect()->route('blogs.manage')->with('success', 'Blog created successfully.');
    }

    // Update the specified blog


    // Display the form to edit a specific blog
    public function edit(Blog $blog)
    {
        return view('admin.blogs-manage.edit', compact('blog'));
    }

    // Update the specified blog
    public function update(Request $request, Blog $blog)
    {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255', // Validation for category field
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Updated validation for image upload
            // Add any other validation rules here
        ]);

        // Update the blog
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category = $request->category;

        // Check if a new image is uploaded
        if ($request->hasFile('thumbnail')) {
            // Upload the new image
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $imageName);
            $blog->thumbnail = 'images/' . $imageName;
        }

        $blog->save();

        return redirect()->route('blogs.manage')->with('success', 'Blog updated successfully.');
    }


    // Delete the specified blog
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.manage')->with('success', 'Blog deleted successfully.');
    }
}
