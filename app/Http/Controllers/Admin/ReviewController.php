<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviewCreate()
    {
        $products = Product::orderBy('name', 'desc')->get();
        return view('admin.review.create', compact('products'));
    }

   public function reviewStore (Request $request)
    {
        $review = new Review();

        $review->product_id = $request->product_id;
        $review->customer_name = $request->customer_name;
        $review->comments = $request->comments;
        $review->rating = $request->rating;

        if(isset($request->image)){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension(); //4347657.jpg
            $image->move('admin/review', $imageName);

            $review->image = url('admin/review/'.$imageName); //http://127.0.0.1:8000/admin/review/4347657.jpg
        }

        $review->save();

        toastr()->success('Review added successfully');
        return redirect()->back();
    }

    public function reviewList()
    {
        $reviews = Review::with('product')->orderBy('id', 'desc')->get();
        return view('admin.review.list', compact('reviews'));
    }

    public function reviewEdit($id)
    {
        $review = Review::find($id);
        $products = Product::orderBy('name', 'asc')->get();
        return view('admin.review.edit', compact('review', 'products'));
    }

    public function reviewUpdate(Request $request, $id)
    {
        $review = Review::find($id);

        $review->product_id = $request->product_id;
        $review->customer_name = $request->customer_name;
        $review->comments = $request->comments;
        $review->rating = $request->rating;

        if(isset($request->image)){

        if($review->image && file_exists('admin/review/'.basename($review->image))){
                unlink('admin/review/'.basename($review->image));
        }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension(); //4347657.jpg
            $image->move('admin/review', $imageName);

            $review->image = url('admin/review/'.$imageName); //http://127.0.0.1:8000/admin/review/4347657.jpg
        }

        $review->save();

        toastr()->success('Review updated successfully');
        return redirect()->back();
    }

    public function reviewDelete($id)
    {
        $review = Review::find($id);
        $review->delete();

        toastr()->success('Review deleted successfully');
        return redirect()->back();
    }
}