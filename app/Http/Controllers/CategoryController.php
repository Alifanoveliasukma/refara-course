<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoryRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function list_Category()
    {
        $list_category = Category::all();
        return view('category.index', compact('list_category'));
    }
    public function create_category()
    {
        return view('category.create-category-kursus');
    }

    public function store_category(KategoryRequest $request)
    {
        $validated = $request->validated();

            if ($request->hasFile('image')) {
                // put image in the public storage
                $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('image'));
                $validated['image'] = $filePath;
            }

            // insert only requests that already validated in the StoreRequest
            $create = Category::create($validated);

            if($create) {
                // add flash for the success notification
                
                return redirect('/panel/data')->with('success', 'Kategori berhasil di update');
            }

            return abort(500);
    }

    public function edit_category(Request $request, $id)
    {
        $category = Category::findorfail($id);
        return view('category.edit-category',compact('category'));
    }


    public function proses_edit_category(UpdateKategoriRequest $request, $id)
    {

        $post = Category::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($post->image);

            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }
        $update = $post->update($validated);
        
        if($update) {
            session()->flash('notif.success', 'kategori updated successfully!');
            return redirect('/panel/data');
        }

        return abort(500);
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        dd($category);
        $category->delete();
        return redirect('/panel/data')
                ->withSuccess('Category Berhasil Di Delete!');
    }
}