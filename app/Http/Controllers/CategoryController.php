<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Helpers\FileHelper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::getAllCategory();
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        $parent_cats = Category::where('is_parent', 1)->orderBy('title', 'ASC')->get();
        return view('backend.category.create', compact('parent_cats'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Generate unique slug
        $slug = generateUniqueSlug($request->title, Category::class);
        $validatedData['slug'] = $slug;

        // Set is_parent value
        $validatedData['is_parent'] = $request->has('is_parent') ? 1 : 0;

        // If it's a parent category, remove parent_id
        if ($validatedData['is_parent'] == 1) {
            $validatedData['parent_id'] = null;
        }

        // Upload photo if exists
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/category');
        }

        // Create category
        $category = Category::create($validatedData);

        $message = $category
            ? 'Category successfully added'
            : 'Error occurred, please try again!';

        return redirect()->route('category.index')
            ->with($category ? 'success' : 'error', $message);
    }


    public function show($id)
    {
        // Implement if needed
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parent_cats = Category::where('is_parent', 1)->get();
        return view('backend.category.edit', compact('category', 'parent_cats'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string',
            'summary' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $validatedData['is_parent'] = $request->input('is_parent', 0);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Optional: Delete old photo if exists
            if ($category->photo && file_exists(public_path($category->photo))) {
                unlink(public_path($category->photo));
            }

            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/category');
        }

        $status = $category->update($validatedData);

        $message = $status
            ? 'Category successfully updated'
            : 'Error occurred, Please try again!';

        return redirect()->route('category.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $child_cat_id = Category::where('parent_id', $id)->pluck('id');

        $status = $category->delete();

        if ($status && $child_cat_id->count() > 0) {
            Category::shiftChild($child_cat_id);
        }

        $message = $status
            ? 'Category successfully deleted'
            : 'Error while deleting category';

        return redirect()->route('category.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    public function getChildByParent(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $child_cat = Category::getChildByParentID($request->id);

        if ($child_cat->count() <= 0) {
            return response()->json(['status' => false, 'msg' => '', 'data' => null]);
        }

        return response()->json(['status' => true, 'msg' => '', 'data' => $child_cat]);
    }
}
