<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;


class CategoryController extends Controller
{
    //
    public function list_categories()
    {
        $categories =Category::latest()->simplePaginate(2);
        return view('category.category', compact('categories'));
    }

    public function create_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);


        $uploadDir = 'img/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);


        $category = new Category();
        $category->name = $request->name;
        $category->image_path = $uploadFileName;
        $category->save();

        return redirect('/categories')->with('success', 'Category created successfully');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/categories')->with('success', 'Category deleted successfully');
    }

    public function update_category(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'img/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->image_path = $uploadFileName;
        $category->update();

        return redirect('/categories')->with('success', 'Category updated successfully');
    }

    public function edit_category($id)
    {
        $category = category::find($id);
        return view('category.editcategory', compact('category'));
    }
}
