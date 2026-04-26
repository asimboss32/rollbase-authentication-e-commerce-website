<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function createCategory()
    {
        return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if(isset($request->image)){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension();
            $image->move('admin/category/', $imageName);

            $category->image = url('admin/category/'.$imageName);
        }

        $category->save();
         toastr()->success('Category created successfully');
        return redirect()->back();
    }

    public function listCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.category.list', compact('categories'));
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if(isset($request->image)){

        if($category->image && file_exists('admin/category/'.basename($category->image))){  //jehetu image update korar somoy ager image delete korte hobe tai file_exists diye check kora hocche je image file ta exist kore kina and tarpor unlink diye delete kora hocche.
            unlink('admin/category/'.basename($category->image));
        }

        if(isset($request->image)){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension();
            $image->move('admin/category/', $imageName);

            $category->image = url('admin/category/'.$imageName);
        }

        $category->save();
         toastr()->success('Category updated successfully');
        return redirect('/manage/category/list');
       }
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);

        if($category->image && file_exists('admin/category/'.basename($category->image))){  //jehetu image delete korar somoy image file ta exist kore kina check kora hocche and tarpor unlink diye delete kora hocche.
            unlink('admin/category/'.basename($category->image));
        }

        $category->delete();
         toastr()->success('Category deleted successfully');
        return redirect()->back();
    }


}
