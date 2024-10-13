<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Middleware\HandleInertiaRequests;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Blade::render('admin.portfolio-category.create');
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required| max:255',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);

        $category->save();

        toastr()->success('Category Created Successfully');

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Blade::render('admin.portfolio-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required| max:255',
        ]);

        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);

        $category->update();

        toastr()->success('Category Updated Successfully');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
