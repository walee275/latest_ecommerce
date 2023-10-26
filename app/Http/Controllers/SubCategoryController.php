<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('parent')->where('parent_category', '!=', null)->get();

        // dd($categories);
        return view('admin.sub_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.sub_categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'unique:categories,name'],
            'parent_category' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'parent_category' => $request->parent_category,
        ];
        $is_category_created = Category::create($data);

        if ($is_category_created) {
            return redirect()->back()->with('success', 'Category added Successfully');
        } else {
            return redirect()->back()->with('error', 'Category has failed to be created!');
        }
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
        $categories = Category::where('id', '!=', $category->id)->get();

        return view('admin.sub_categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,'.$category->id.',id',
            'parent_category' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'parent_category' => $request->parent_category,
        ];
        $updated = Category::find($category->id)->update($data);

        if ($updated) {
            return redirect()->back()->with('success', 'Category updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Category has failed to be updated!');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category){
            $deleted = Category::find($category->id)->delete();

            if ($deleted) {
                return redirect()->back()->with('success', 'Category deleted Successfully');
            } else {
                return redirect()->back()->with('error', 'Category has failed to be deleted!');
            }
        }
    }
}
