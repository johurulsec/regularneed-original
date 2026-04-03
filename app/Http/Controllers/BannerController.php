<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Helpers\FileHelper;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::with('category')
            ->latest('id')
            ->paginate(10);
        return view('backend.banner.index', compact('banners'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.banner.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $validatedData['url'] = $request->url ?? null;
        $validatedData['category_id'] = $request->category_id ?? null;

        $slug = $this->generateUniqueSlug($request->title);
        $validatedData['slug'] = $slug;

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/banners');
        }

        $banner = Banner::create($validatedData);

        $message = $banner
            ? 'Banner successfully added'
            : 'Error occurred while adding banner';

        return redirect()->route('banner.index')->with(
            $banner ? 'success' : 'error',
            $message
        );
    }

    public function show($id)
    {
        // Implement if needed
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $validatedData['url'] = $request->url ?? null;
        $validatedData['category_id'] = $request->category_id ?? null;

        $slug = $this->generateUniqueSlug($request->title, $banner->id);
        $validatedData['slug'] = $slug;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($banner->photo && file_exists(public_path($banner->photo))) {
                unlink(public_path($banner->photo));
            }

            $validatedData['photo'] = FileHelper::upload($request->file('photo'), 'backend/img/banners');
        }

        $status = $banner->update($validatedData);

        $message = $status
            ? 'Banner successfully updated'
            : 'Error occurred while updating banner';

        return redirect()->route('banner.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $status = $banner->delete();

        $message = $status
            ? 'Banner successfully deleted'
            : 'Error occurred while deleting banner';

        return redirect()->route('banner.index')->with(
            $status ? 'success' : 'error',
            $message
        );
    }

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = Banner::where('slug', $slug)->count();

        if ($count > 0) {
            $slug = $slug . '-' . date('ymdis') . '-' . rand(0, 999);
        }

        return $slug;
    }
}
