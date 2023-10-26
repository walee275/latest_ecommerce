<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductPicture;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $data = [
            'products' => Product::with('category', 'subcategory', 'pictures', 'vendor', 'sizes')->get(),
            'categories' => Category::with('subcategories')->where('parent_category', '=', null)->get(),
            'subcategories' => Category::where('parent_category', '!=', null)->get(),
        ];
        // dd($data);
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::where('parent_category', '=', null)->orderBy('name')->get(),
            'subcategories' => Category::where('parent_category', '!=', null)->get(),
            'vendors' => Vendor::all(),

        ];
        // dd($data);
        return view('admin.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // return json_encode($request->all());
        $request->validate([
            'title' => ['required'],
            'category' => ['required'],
            // 'subcategory' => ['required'],
            'vendor' => ['required'],
            'price' => ['required'],
            'cost_price' => ['required'],
            'description' => ['required'],
            // 'pictures' => ['required'],

        ]);
        if (!empty($request->pictures)) {
            // dd('here');
            $request->validate([
                'pictures' => ['array'],
                'pictures.*' => ['mimes:png,jpg,jpeg']
            ]);
            // dd('here');

        } else {
            $file_name = 'product.png';
            $file = '';
        }


        $product_already_exist = Product::where([
            ['title', $request->name],
            ['categorie_id', $request->category],
            ['sub_category_id', $request->subcategory],
        ])->first();

        if ($product_already_exist) {
            return redirect()->back()->with('error', 'Product already exist');
        }


        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'categorie_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'vendor_id' => $request->vendor,
            'price' => $request->price,
            'cost_price' => $request->cost_price,
            'inventory' => $request->inventory,
            'status' => 1,
        ];
        // dd($data);
        $is_product_created = Product::create($data);

        if ($is_product_created) {

            // if (count($request->sizes)) {
            //     foreach ($request->sizes as $size) {
            //         $size_already_exist = ProductSize::where([['product_id', $is_product_created->id], ['value', $size]])->first();
            //         if (!$size_already_exist) {
            //             $add_product_sizes = ProductSize::create([
            //                 'product_id' => $is_product_created->id,
            //                 'value' => $size,
            //             ]);
            //         }
            //     }
            // }

            if (str_contains($request->title, ' ')) {
                $product_name = str_replace(' ', '_', $request->title);
            } else {
                $product_name = $request->title;
            }


            $pictures = $request->pictures;
            $sizes_picture = $request->sizes_file;

            $sizes_picture = $request->sizes_file;
            if ($sizes_picture) {


                $category = Category::find($request->category);
                $category_name = str_replace('/', '_', str_replace(' ', '_', $category->name));
                $size_filename = microtime() . '-' . str_replace('/', '_', $category_name)  . '-' . $sizes_picture->getClientOriginalName();
                $size_filename = str_replace(' ', '_', $size_filename);


                $is_file_uploaded = $sizes_picture->move(public_path('products_uploads/' . $product_name . '/sizes'),  $size_filename);
                if ($is_file_uploaded) {
                    $file_path = 'products_uploads/' . $product_name . '/sizes' . '/' . $size_filename;

                    $data = [
                        'product_id' => $is_product_created->id,
                        'value' => $file_path,
                    ];
                    $size_added = ProductSize::create($data);
                }
            }
            if ($pictures) {

                for ($i = 0; $i < count($pictures); $i++) {
                    $file = $pictures[$i];

                    $category = Category::find($request->category);
                    $category_name = str_replace('/', '_', str_replace(' ', '_', $category->name));
                    $file_name = microtime() . '-' . $category_name  . '-' . $file->getClientOriginalName();


                    $is_file_uploaded = $file->move(public_path('products_uploads/' . $product_name),  $file_name);

                    if ($is_file_uploaded) {
                        $file_path = $product_name . '/' . $file_name;
                        $count = 0;
                        $data = [
                            'product_id' => $is_product_created->id,
                            'picture' => $file_path,
                        ];

                        $is_product_picture_stored = ProductPicture::create($data);
                        if ($is_product_picture_stored) {
                            $count++;
                        }
                    } else {
                    }
                }
                // dd(count($pictures ), $count);

                // if ($count == count($pictures)) {

                return redirect()->back()->with('success', 'Product has been successfully added');
                // } else {
                // return redirect()->back()->with('error', 'Product has failed to add');
                // }
            } else {
                return redirect()->back()->with('success', 'Product has been successfully added');
            }
        } else {
            return redirect()->back()->with('error', 'Product has failed to add');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::with('category', 'subcategory','sizes')->where('id', $product->id)->first();
        $related_products = Product::with('pictures')->where([['categorie_id', $product->categorie_id], ['id', '!=', $product->id]])->orWhere('sub_category_id', $product->sub_category_id)->get();
        $product_pictures = ProductPicture::where('product_id', $product->id)->get();
        // dd($product_pictures);
        return view('admin.products.product_details', compact('related_products', 'product', 'product_pictures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data = [
            'product' => Product::with('sizes')->where('id', $product->id)->first(),
            'categories' => Category::where('parent_category', '=', null)->orderBy('name')->get(),
            'subcategories' => Category::where('parent_category', '!=', null)->get(),
            'vendors' => Vendor::all(),
        ];
        // dd($data);

        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::with('sizes')->where('id', $product->id)->first();

        $request->validate([
            'title' => ['required'],
            'category' => ['required'],
            // 'subcategory' => ['required'],
            'vendor' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
        ]);
        // dd($request->all());

        if (!empty($request->pictures)) {
            $request->validate([
                'picture' => ['mimes:png,jpg,jpeg']
            ]);
            $file = $request->pictures[0];
            $category = Category::find($request->category);
            $category_name = str_replace('/', '_', str_replace(' ', '_', $category->name));

            $file_name = microtime() . '-' . $category_name  . '-' . $file->getClientOriginalName();
        } else {
            $file_name = $product->picture;
            $file = '';
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'categorie_id' => $request->category,
            'sub_category_id' => $request->subcategory,
            'vendor_id' => $request->vendor,
            'price' => $request->price,
            'cost_price' => $request->cost_price,
        ];

        $is_product_updated = Product::find($product->id)->update($data);
        $is_product_updated = Product::with('sizes', 'pictures', 'vendor')->where('id', $product->id)->first();

        // dd($is_product_updated);
        if ($is_product_updated) {

            if (str_contains($request->title, ' ')) {
                $product_name = str_replace(' ', '_', $request->title);
            } else {
                $product_name = $request->title;
            }
            $sizes_picture = $request->sizes_file;
            if ($sizes_picture) {
                // $size_filename = microtime() .'-' . $sizes_picture->getClientOriginalName();

                // ;

                if (count($product->sizes)) {
                    foreach ($product->sizes as $size) {
                        File::delete(public_path($size->value));
                        $picture_delete = ProductSize::find($size->id)->delete();
                    }
                }

                $size_file = $sizes_picture;

                $category = Category::find($request->category);
                $category_name = str_replace('/', '_', str_replace(' ', '_', $category->name));

                $size_filename =  microtime() . '-' . str_replace('/', '_', $category_name)  . '-' . $size_file->getClientOriginalName();
                $size_filename = str_replace(' ', '_', $size_filename);
                $file_path = 'products_uploads/' . $product_name . '/sizes' . '/' . $size_filename;

                $is_file_uploaded = $size_file->move(public_path('products_uploads/' . $product_name . '/sizes'),  $size_filename);
                if ($is_file_uploaded) {

                    $data = [
                        'product_id' => $is_product_updated->id,
                        'value' => $file_path,
                    ];
                    $size_added = ProductSize::create($data);
                }
            }

            if ($file) {

                $old_pictures = ProductPicture::where('product_id', $product->id)->get();
                if (count($old_pictures)) {
                    foreach ($old_pictures as $old_pict) {
                        File::delete(public_path('products_uploads/' . $old_pict->picture));
                        $picture_delete = ProductPicture::find($old_pict->id)->delete();
                    }
                }


                $is_file_uploaded = $file->move(public_path('products_uploads/' . $product_name), $file_name);
                if ($is_file_uploaded) {
                    $file_path = $product_name . '/' . $file_name;

                    $picture_update = ProductPicture::create([
                        'picture' => $file_path,
                        'product_id' => $product->id,
                    ]);
                    if ($picture_update) {

                        return redirect()->back()->with('success', 'Product has been successfully updated');
                    } else {
                        return redirect()->back()->with('error', 'Product picture has failed to update');
                    }
                }
            } else {
                return redirect()->back()->with('success', 'Product has been successfully updated');
            }
        } else {
            return redirect()->back()->with('error', 'Product has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $picture = $product->picture;

        if (str_contains($product->title, ' ')) {
            $product_name = str_replace(' ', '_', $product->title);
        } else {
            $product_name = $product->title;
        }
        File::delete(public_path('products_uploads/' . $product_name));


        $is_product_deleted = Product::find($product->id)->delete();
        if ($is_product_deleted) {
            return redirect()->back()->with('success', 'Product has been successfully added');
        } else {
            return redirect()->back()->with('error', 'Product has failed to add');
        }
    }
}
