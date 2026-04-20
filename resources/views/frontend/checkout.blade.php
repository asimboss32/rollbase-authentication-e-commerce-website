@extends('frontend.master')

@section('content')
    <main>
		<section class="checkout-section">
            <div class="container">
                <form action="" method="post" class="form-group billing-address-form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout-wrapper">
                                <div class="billing-address-wrapper">
                                    <h4 class="title">Billing / Shipping Details</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="name" class="form-control" placeholder="Enter Full Name *"/>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone *"/>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea rows="4" name="address" class="form-control" id="address"
                                                placeholder="Enter Full Address"></textarea>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div style="background: lightgrey;padding: 10px;margin-bottom: 10px;">
                                                <input type="radio" id="inside_dhaka" name="area" value="80"/>
                                                <label for="inside_dhaka"
                                                    style="font-size: 18px;font-weight: 600;color: #000;">Inside Dhaka (80
                                                    Tk.)</label>
                                            </div>
                                            <div style="background: lightgrey;padding: 10px;">
                                                <input type="radio" id="outside_dhaka" name="area" value="150"/>
                                                <label for="outside_dhaka"
                                                    style="font-size: 18px;font-weight: 600;color: #000;">Outside Dhaka (150
                                                    Tk.)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout-items-wrapper">
                                <div class="checkout-item-outer">
                                    <div class="checkout-item-left">
                                        <div class="checkout-item-image">
                                            <img src="{{asset('frontend/assets/images/product.png')}}" alt="Image"/>
                                        </div>
                                        <div class="checkout-item-info">
                                            <h6 class="checkout-item-name">
                                                Test Product
                                            </h6>
                                            <p class="checkout-item-price">
                                                300 Tk.
                                            </p>
                                            <span class="checkout-item-count">
                                                1 item
                                            </span>
                                            <br />
                                            <span class="checkout-item-count">
                                                Size:                                                 
                                            </span>                                                
                                            <span class="checkout-item-count">
                                                Color: 
                                            </span>
                                            <div class="checkout-product-incre-decre">
                                                <button type="button" title="Decrement" class="qty-decrement-btn">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="number" readonly name="" placeholder="Qty" min="1" style="height: 35px;" value="1">
                                                <button type="button" title="Increment" class="qty-increment-btn">
                                                    <i class="fas fa-plus"></i>
                                                </button>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkout-item-right">
                                        <a href="#" class="delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="sub-total-wrap">
                                    <div class="sub-total-item">
                                         <strong>Sub Total</strong>
                                        <strong id="subTotal">৳ 300</strong>
                                    </div>
                                    <div class="sub-total-item">
                                        <strong>Delivery charge</strong>
                                        <strong id="deliveryCharge">৳ 80</strong>
                                    </div>
                                    <div class="sub-total-item grand-total">
                                         <strong>Grand Total</strong>
                                         <strong id="grandTotal">৳ 380</strong>
                                    </div>
                                </div>
                                <div class="payment-item-outer">
                                    <h6 class="payment-item-title">
                                        Select Payment Method
                                    </h6>
                                    <div class="payment-items-wrap justify-content-center">
                                        <div class="payment-item-outer">
                                            <input type="radio" name="payment_type" id="cod" value="cod" checked="">
                                            <label class="payment-item-outer-lable" for="cod">
                                                <strong>Cash On Delivery</strong>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-place-btn-outer">
                                    <button type="submit" class="order-place-btn-inner">
                                        Place an Order
                                        <i class="fas fa-sign-out-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
	</main>
@endsection