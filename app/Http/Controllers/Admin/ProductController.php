<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createProduct()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategories = SubCategory::orderBy('name', 'asc')->get();
        return view('admin.product.create', compact('categories', 'subCategories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku_code' => 'nullable|unique:products,sku_code',
            'cat_id' => 'required|integer',
            'subcat_id' => 'integer',
            'regular_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'buying_price' => 'required|numeric|min:0',
            'qty' => 'required|integer',
            'product_type' => 'required|string|max:255',
            'description' => 'required|string',
            'product_policy' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            // 'gallery_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ], [
            // name
            'name.required' => 'Product name is required.',
            'name.string' => 'Product name must be a valid string.',
            'name.max' => 'Product name cannot exceed 255 characters.',

            // sku
            'sku_code.unique' => 'This SKU code already exists.',

            // category
            'cat_id.required' => 'Please select a category.',
            'cat_id.integer' => 'Category must be a valid ID.',

            // subcategory
            'subcat_id.integer' => 'Subcategory must be a valid ID.',

            // price
            'regular_price.required' => 'Regular price is required.',
            'buying_price.required' => 'Buying price is required.',
            'regular_price.numeric' => 'Regular price must be a valid number.',
            'buying_price.numeric' => 'Buying price must be a valid number.',
            'discount_price.numeric' => 'Discount price must be a valid number.',
            'regular_price.min' => 'Regular price must be at least 0.',
            'buying_price.min' => 'Buying price must be at least 0.',
            'discount_price.min' => 'Discount price cannot be negative.',

            // qty
            'qty.required' => 'Quantity is required.',
            'qty.integer' => 'Quantity must be a number.',

            // product type
            'product_type.required' => 'Product type is required.',
            'product_type.string' => 'Product type must be a valid string.',
            'product_type.max' => 'Product type cannot exceed 255 characters.',

            // description
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be text.',

            // policy
            'product_policy.string' => 'Product policy must be text.',

            // image
            'image.required' => 'Product image is required.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Image must be jpeg, png, jpg or svg format.',
            'image.max' => 'Image size must be less than 2MB.',

            // gallery image
            'gallery_image.required' => 'Product image is required.',
            'gallery_image.image' => 'File must be an image.',
            'gallery_image.mimes' => 'Image must be jpeg, png, jpg or svg format.',
            'gallery_image.max' => 'Image size must be less than 2MB.',
        ]);



        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->buying_price = $request->buying_price;
        $product->qty = $request->qty;
        $product->sku_code = $request->sku_code;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

        if (isset($request->image)) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension(); //4347657.jpg
            $image->move('admin/product', $imageName);

            $product->image = url('admin/product/' . $imageName); //http://127.0.0.1:8000/admin/category/4347657.jpg
        }

        $product->save();

        //add color
        if (isset($request->color_name) && $request->color_name[0] != null) {
            foreach ($request->color_name as $singleColor) {

                $color = new Color();

                $color->product_id = $product->id;
                $color->color_name = $singleColor;
                $color->save();
            }
        }

        //add size
        if (isset($request->size_name) && $request->size_name[0] != null) {
            foreach ($request->size_name as $singleSize) {

                $size = new Size();

                $size->product_id = $product->id;
                $size->size_name = $singleSize;
                $size->save();
            }
        }

        // add gallery images

        if (isset($request->gallery_image)) {
            foreach ($request->gallery_image as $singleImage) {

                $galleryImage = new GalleryImage();

                $galleryImage->product_id = $product->id;

                $imageName = rand() . '.' . $singleImage->getClientOriginalExtension(); //4347657.jpg
                $singleImage->move('admin/galleryImages', $imageName);

                $galleryImage->image = url('admin/galleryImages/' . $imageName); //http://

                $galleryImage->save();
            }
        }



        toastr()->success('Product created successfully');
        return redirect()->back();
    }

    public function listProduct()
    {
        $products = Product::orderBy('id', 'desc')->with(['category', 'subCategory'])->paginate(5);
        return view('admin.product.list', compact('products'));
    }


    public function changeStatus($id)
    {
        $product = Product::find($id);

        if ($product->status == 'active') {
            $product->status = 'inactive';
        } else {
            $product->status = 'active';
        }

        $product->save();
        return redirect()->back();
    }

    public function editProduct($id)
    {
        $product = Product::where('id', $id)->with(['color', 'size', 'galleryImages'])->first();
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategories = SubCategory::orderBy('name', 'asc')->get();
        return view('admin.product.edit', compact('product', 'categories', 'subCategories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku_code' => 'nullable|unique:products,sku_code,'.$id,
            'cat_id' => 'required|integer',
            'subcat_id' => 'integer',
            'regular_price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'buying_price' => 'required|numeric|min:0',
            'qty' => 'required|integer',
            'product_type' => 'required|string|max:255',
            'description' => 'required|string',
            'product_policy' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            // 'gallery_image' => 'image|mimes:jpeg,png,jpg,svg',
        ], [
            // name
            'name.required' => 'Product name is required.',
            'name.string' => 'Product name must be a valid string.',
            'name.max' => 'Product name cannot exceed 255 characters.',

            // sku
            'sku_code.unique' => 'This SKU code already exists.',

            // category
            'cat_id.required' => 'Please select a category.',
            'cat_id.integer' => 'Category must be a valid ID.',

            // subcategory
            'subcat_id.integer' => 'Subcategory must be a valid ID.',

            // price
            'regular_price.required' => 'Regular price is required.',
            'buying_price.required' => 'Buying price is required.',
            'regular_price.numeric' => 'Regular price must be a valid number.',
            'buying_price.numeric' => 'Buying price must be a valid number.',
            'discount_price.numeric' => 'Discount price must be a valid number.',
            'regular_price.min' => 'Regular price must be at least 0.',
            'buying_price.min' => 'Buying price must be at least 0.',
            'discount_price.min' => 'Discount price cannot be negative.',

            // qty
            'qty.required' => 'Quantity is required.',
            'qty.integer' => 'Quantity must be a number.',

            // product type
            'product_type.required' => 'Product type is required.',
            'product_type.string' => 'Product type must be a valid string.',
            'product_type.max' => 'Product type cannot exceed 255 characters.',

            // description
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be text.',

            // policy
            'product_policy.string' => 'Product policy must be text.',

            // image
            'image.required' => 'Product image is required.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'Image must be jpeg, png, jpg or svg format.',
            'image.max' => 'Image size must be less than 2MB.',

            // gallery image
            'gallery_image.required' => 'Product image is required.',
            'gallery_image.image' => 'File must be an image.',
            'gallery_image.mimes' => 'Image must be jpeg, png, jpg or svg format.',
            'gallery_image.max' => 'Image size must be less than 2MB.',
        ]);



        $product = Product::find($id);

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->buying_price = $request->buying_price;
        $product->qty = $request->qty;
        $product->sku_code = $request->sku_code;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

        if (isset($request->image)) {

            if ($product->image && file_exists('admin/product/' . basename($product->image))) {  //jehetu image update korar somoy ager image delete korte hobe tai file_exists diye check kora hocche je image file ta exist kore kina and tarpor unlink diye delete kora hocche.
                unlink('admin/product/' . basename($product->image));
            }

            if (isset($request->image)) {
                $image = $request->file('image');
                $imageName = rand() . '.' . $image->getClientOriginalExtension(); //4347657.jpg
                $image->move('admin/product', $imageName);

                $product->image = url('admin/product/' . $imageName); //http://127.0.0.1:8000/admin/category/4347657.jpg
            }

            $product->save();

                //add color
                
        }       
        if (isset($request->color_name) && $request->color_name[0] != null) {
            Color::where('product_id', $id)->delete(); //update korar somoy age je color gulo chilo ta delete kore new color add kora hocche.

            foreach ($request->color_name as $singleColor) {

                $color = new Color();

                $color->product_id = $product->id;
                $color->color_name = $singleColor;
                $color->save();
            }
        }

        //add size
        if (isset($request->size_name) && $request->size_name[0] != null) {
            Size::where('product_id', $id)->delete(); //update korar somoy age je size gulo chilo ta delete kore new size add kora hocche.

            foreach ($request->size_name as $singleSize) {

                $size = new Size();

                $size->product_id = $product->id;
                $size->size_name = $singleSize;
                $size->save();
            }
        }

         //Gallery Images...
        if(isset($request->gallery_image)){
            $oldImages = GalleryImage::where('product_id', $id)->get();

            foreach($oldImages as $singleOldImage){
                if($singleOldImage->image && file_exists('admin/galleryImages/'.basename($singleOldImage->image))){
                    unlink('admin/galleryImages/'.basename($singleOldImage->image));
                }
            }

            GalleryImage::where('product_id', $id)->delete();

            foreach($request->gallery_image as $singleImage){
                $galleryImage = new GalleryImage();
                
                $galleryImage->product_id = $product->id;

                $imageName = rand().'.'.$singleImage->getClientOriginalExtension(); //4347657.jpg
                $singleImage->move('admin/galleryImages', $imageName);

                $galleryImage->image = url('admin/galleryImages/'.$imageName); //http://127.0.0.1:8000/admin/category/4347657.jpg

                $galleryImage->save();
            }
        }

            toastr()->success('Product updated successfully');
            return redirect()->back();

    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        Color::where('product_id', $id)->delete();

        Size::where('product_id', $id)->delete();

        $oldImages = GalleryImage::where('product_id', $id)->get();

        foreach($oldImages as $singleOldImage){
            if($singleOldImage->image && file_exists('admin/galleryImages/'.basename($singleOldImage->image))){
                unlink('admin/galleryImages/'.basename($singleOldImage->image));
            }
        }

        GalleryImage::where('product_id', $id)->delete();

        if($product->image && file_exists('admin/product/'.basename($product->image))){
            unlink('admin/product/'.basename($product->image));
        }

        $product->delete();

        toastr()->success('Product Deleted Successfully');
        return redirect()->back();
    }
}
