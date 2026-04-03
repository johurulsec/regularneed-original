<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::getAllProduct();
        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $parent_cats = Category::whereNull('parent_id')->get(); // only parent categories
        $brands = Brand::all();

        return view('backend.product.create', compact('categories', 'parent_cats', 'brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'size' => 'nullable|array',
            'size.*' => 'string',
            'stock' => 'required|numeric|min:0',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'is_featured' => 'sometimes|in:1',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|between:0,100', // percent
        ]);

        // Generate slug
        $validatedData['slug'] = generateUniqueSlug($request->title, Product::class);

        // Handle featured
        $validatedData['is_featured'] = $request->input('is_featured', 0);

        // Handle discount default
        $validatedData['discount'] = $request->filled('discount') ? $request->discount : 0;

        // Handle size (convert array → comma-separated string)
        if ($request->has('size')) {
            $validatedData['size'] = implode(',', $request->input('size'));
        } else {
            $validatedData['size'] = '';
        }

        // Upload photo
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/product');
        }

        // Create product
        $product = Product::create($validatedData);

        return redirect()->route('product.index')->with(
            $product ? 'success' : 'error',
            $product ? 'Product Successfully added' : 'Please try again!!'
        );
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brands = Brand::get();
        $product = Product::findOrFail($id);
        $categories = Category::where('is_parent', 1)->get();
        $items = Product::where('id', $id)->get();

        return view('backend.product.edit', compact('product', 'brands', 'categories', 'items'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048', // not required on update
            'size' => 'nullable',
            'stock' => 'required|numeric',
            'cat_id' => 'required|exists:categories,id',
            'child_cat_id' => 'nullable|exists:categories,id',
            'is_featured' => 'sometimes|in:1',
            'brand_id' => 'nullable|exists:brands,id',
            'status' => 'required|in:active,inactive',
            'condition' => 'required|in:default,new,hot',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
        ]);

        $validatedData['is_featured'] = $request->input('is_featured', 0);
        $validatedData['discount'] = $request->discount !== null && $request->discount !== '' ? $request->discount : 0;

        // Handle size
        $validatedData['size'] = $request->has('size') ? implode(',', $request->input('size')) : '';

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($product->photo && file_exists(public_path($product->photo))) {
                unlink(public_path($product->photo));
            }
            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/category');
        } else {
            // keep the old photo if no new one uploaded
            $validatedData['photo'] = $product->photo;
        }

        $status = $product->update($validatedData);

        $message = $status ? 'Product Successfully updated' : 'Please try again!!';
        return redirect()->route('product.index')->with($status ? 'success' : 'error', $message);
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = $product->delete();

        $message = $status ? 'Product successfully deleted' : 'Error while deleting product';
        return redirect()->route('product.index')->with($status ? 'success' : 'error', $message);
    }
}
