<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliate;

class AffiliateController extends Controller
{
    public function index()
    {
        $affiliates = Affiliate::all();
        return view('admin.affiliate-manage.index', compact('affiliates'));
    }

    public function create()
    {
        return view('admin.affiliate-manage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'stars' => 'required|integer|min:0|max:5',
            'discount' => 'required|integer|min:0',
            'link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $affiliate = new Affiliate();
        $affiliate->fill($request->all());

        // Upload image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $affiliate->image = $imagePath;
        }

        $affiliate->save();

        return redirect()->route('affiliates.index')->with('success', 'Affiliate created successfully!');
    }

    public function edit($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        return view('admin.affiliate-manage.edit', compact('affiliate'));
    }

    public function update(Request $request, $id)
    {
        $affiliate = Affiliate::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'stars' => 'required|integer|min:0|max:5',
            'discount' => 'required|integer|min:0',
            'link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $affiliate->fill($request->all());

        // Upload new image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $affiliate->image = $imagePath;
        }

        $affiliate->save();

        return redirect()->route('affiliates.index')->with('success', 'Affiliate updated successfully!');
    }

    public function destroy($id)
    {
        $affiliate = Affiliate::findOrFail($id);
        $affiliate->delete();
        return redirect()->route('affiliates.index')->with('success', 'Affiliate deleted successfully!');
    }
}
