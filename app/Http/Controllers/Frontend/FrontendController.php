<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\WebsitePolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $hotProducts = Product::where('status', 'active')->where('product_type', 'hot')->paginate(12);
        $newProducts = Product::where('status', 'active')->where('product_type', 'new')->paginate(12);
        $regularProducts = Product::where('status', 'active')->where('product_type', 'regular')->paginate(12);
        $discountProducts = Product::where('status', 'active')->where('product_type', 'discount')->paginate(12);

        return view('frontend.index', compact('hotProducts', 'newProducts', 'regularProducts', 'discountProducts'));
    }

    public function shopProducts(Request $request)
     {
        if(isset($request->cat_id)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->cat_id)->paginate(50);
        }
        elseif(isset($request->subcat_id)){
            $products = Product::orderBy('id', 'desc')->where('subcat_id', $request->subcat_id)->paginate(50);
        }
        else{
            $products = Product::orderBy('id', 'desc')->paginate(50);
        }

        return view('frontend.shop', compact('products'));
    }

    public function productDetails($slug)
    {
        $product = Product::with('color', 'size', 'galleryImages', 'review')->where('slug', $slug)->first();
        $detailsPageCategories = Category::get();

        return view('frontend.product-details', compact('product', 'detailsPageCategories'));
    }

    // add to cart details page
    public function addToCartDetailsPage(Request $request, $id)
    {
        $product = Product::find($id);

        $cartProduct = Cart::where('product_id', $product->id)->where('ip_address', $request->ip())->first();

        if ($cartProduct == null) {

            $cart = new Cart();

            $cart->product_id = $product->id;
            $cart->color = $request->color;
            $cart->size = $request->size;
            $cart->qty = $request->qty;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } else {
                $cart->price = $product->regular_price;
            }

            $cart->ip_address = $request->ip();

            if (Auth::check()) {
                $cart->user_id = Auth::user()->id;
            }

            $cart->save();
        } elseif ($cartProduct != null) {

            $cartProduct->color = $request->color;
            $cartProduct->size = $request->size;
            $cartProduct->qty = $request->qty;

            if ($product->discount_price != null) {
                $cartProduct->price = $product->discount_price;
            } else {
                $cartProduct->price = $product->regular_price;
            }

            $cartProduct->ip_address = $request->ip();

            $cartProduct->save();
        }

        toastr()->success('Product added to cart successfully');

        if ($request->action == 'buyNow') {
            return redirect('/checkout');
        } else {
            return redirect()->back();
        }
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        $cartProduct = Cart::where('product_id', $product->id)->where('ip_address', $request->ip())->first();

        if ($cartProduct == null) {

            $cart = new Cart();

            $cart->product_id = $product->id;
            $cart->qty = 1;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price;
            } else {
                $cart->price = $product->regular_price;
            }

            $cart->ip_address = $request->ip();

            if (Auth::check()) {
                $cart->user_id = Auth::user()->id;
            }

            $cart->save();
        } elseif ($cartProduct != null) {

            $cartProduct->qty += 1;

            if ($product->discount_price != null) {
                $cartProduct->price = $product->discount_price;
            } else {
                $cartProduct->price = $product->regular_price;
            }

            $cartProduct->ip_address = $request->ip();

            $cartProduct->save();
        }

        toastr()->success('Product added to cart successfully');
        return redirect()->back();
    }

    public function deleteCart ($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        
        return redirect()->back();
    }
    public function privacyPolicy()
    {
        $privacyPolicy = WebsitePolicy::select('privacy_policy')->first();
        return view('frontend.privacy-policy', compact('privacyPolicy'));
    }

    public function termsConditions()
    {
        $termsConditions = WebsitePolicy::select('terms_conditions')->first();
        return view('frontend.terms-conditions', compact('termsConditions'));
    }

    public function refundPolicy()
    {
        $refundPolicy = WebsitePolicy::select('refund_policy')->first();
        return view('frontend.refund-policy', compact('refundPolicy'));
    }

    public function paymentPolicy()
    {
        $paymentPolicy = WebsitePolicy::select('payment_policy')->first();
        return view('frontend.payment-policy', compact('paymentPolicy'));
    }

    public function aboutUs()
    {
        $aboutUs = WebsitePolicy::select('about_us')->first();
        return view('frontend.about-us', compact('aboutUs'));
    }

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function contactMessageStore(Request $request)
    {
        $contactMessage = new ContactMessage();

        $contactMessage->name = $request->name;
        $contactMessage->phone = $request->phone;
        $contactMessage->email = $request->email;
        $contactMessage->subject = $request->subject;
        $contactMessage->message = $request->message;

        $contactMessage->save();

        toastr()->success('Message sent successfully');
        return redirect()->back();
    }

    public function viewCart()
    {
        return view('frontend.viewcart');
    }

    public function checkOut()
    {
        return view('frontend.checkout');
    }

    public function orderStore(Request $request)
    {
        $order = new Order();

        $order->ip_address = $request->ip();
        $order->user_id = auth()->check() ? auth()->user()->id : null;
        
        $previousOrder = Order::orderBy('id', 'desc')->first();

        if($previousOrder == null){
            $generatedInvoiceId = 'XYZ-1';
            $order->invoice_number = $generatedInvoiceId;
        }
        elseif($previousOrder != null){
             $generatedInvoiceId = 'XYZ-' . ($previousOrder->id+1);
             $order->invoice_number = $generatedInvoiceId;
        }

        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->charge = $request->charge;
        $order->price = $request->grandTotalPriceInput;

        $cartProducts = Cart::where('ip_address', $request->ip())->get();

        if($cartProducts->isNotEmpty()){
            $order->save();

            foreach($cartProducts as $cart){
                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cart->product_id;
                $orderDetails->color = $cart->color;
                $orderDetails->size = $cart->size;
                $orderDetails->qty = $cart->qty;
                $orderDetails->price = $cart->price;

                $orderDetails->save();
                $cart->delete();
            }

            return redirect('/order-confirmation/'.$generatedInvoiceId);
        }
            else{
                toastr()->error('Your cart is empty. Please add products to cart before placing an order.');
                return redirect('/shop');
            }
    }

    public function orderConfirmation( $invoice_id)
    {
        return view('frontend.thankyou', compact('invoice_id'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->select('id')->first();
        $products = Product::where('cat_id', $category->id)->get();
        return view('frontend.category-products', compact('products'));
    }

    public function subCategoryProducts($slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->select('id')->first();
        $products = Product::where('subcat_id', $subCategory->id)->get();
        return view('frontend.subcategory-products', compact('products'));
    }

    public function typeProducts($type)
    {
        $products = Product::where('product_type', $type)->orderBy('id', 'desc')->get();
        return view('frontend.type-products', compact('products', 'type'));
    }

    public function searchProducts(Request $request)
    {
        $products = Product::where('name', 'LIKE', '%'. $request->search . '%')->get();
        return view('frontend.search-products', compact('products'));
    }

}
