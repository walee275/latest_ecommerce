<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('read categories')) {
            $categories = Category::all();
            $data = [
                'categories' => $categories
            ];

            return view('admin.categories.index', $data);
        }else{
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('i am here');

        $request->validate([
            'name' => ['required', 'unique:categories,name'],
        ]);

        $data = [
            'name' => $request->name,
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
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'category' => $category,
        ];
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name,' . $category->id . ',id'],
        ]);

        $data = [
            'name' => $request->name,
        ];
        $is_category_updated = Category::find($category->id)->update($data);

        if ($is_category_updated) {
            return redirect()->back()->with('success', 'Category updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Category has failed to be update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $is_category_deleted = Category::find($category->id)->delete();

        if ($is_category_deleted) {
            return redirect()->back()->with('success', 'Category deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Category has failed to delete');
        }
    }
}
