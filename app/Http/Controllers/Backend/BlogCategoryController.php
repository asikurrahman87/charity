<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BlogCategory;
use Illuminate\Http\Request;
use function Livewire\Features\SupportTesting\id;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.blog-categories.index', [
            'blogCategories' => BlogCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BlogCategory::updateOrCreateBlogCategory($request);
        return back()->with('success', 'Blog Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'hi';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.blog-categories.edit', [
            'blogCategory' => BlogCategory::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        BlogCategory::updateOrCreateBlogCategory($request, $id);
        return redirect()->route('blog-categories.index')->with('success', 'Blog Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogCategory::find($id)->delete();
        return back()->with('success', 'Blog Category deleted successfully.');
    }
}
