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
            'title' => 'required',
            'content' => 'required',
            // Add any other validation rules here
        ]);

        // Create the blog
        Blog::create($request->all());

        return redirect()->route('admin.blogs-manage.index')->with('success', 'Blog created successfully.');
    }

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
            'title' => 'required',
            'content' => 'required',
            // Add any other validation rules here
        ]);

        // Update the blog
        $blog->update($request->all());

        return redirect()->route('admin.blogs-manage.index')->with('success', 'Blog updated successfully.');
    }

    // Delete the specified blog
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('admin.blogs-manage.index')->with('success', 'Blog deleted successfully.');
    }
}
