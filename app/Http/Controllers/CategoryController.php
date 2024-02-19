<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store_category(Request $request)
    {
            // Validasi input
            $request->validate([
                'nama_category' => ['required', 'string', 'max:255'],
            ]);
    
            // Simpan data category ke database
            $category = Category::create([
                'nama_category' => $request->nama_category,
            ]);
    
            // Redirect ke halaman yang sesuai
            return redirect('/panel/category/list-category')->with('success', 'Category Telah Berhasil!');
    }

    public function edit_category(Request $request, $id)
    {
        $category = Category::findorfail($id);
        return view('category.edit-category',compact('category'));
    }


    public function proses_edit_category(Request $request, $id)
    {

        $category = Category::findorfail($id);
        $category->update($request->all());

        return redirect('panel/category/list-category');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/panel/category/list-category')
                ->withSuccess('Category Berhasil Di Delete!');
    }
}