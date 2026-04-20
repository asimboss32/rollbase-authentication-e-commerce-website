@extends('frontend.master')

@section('content')
    <main>
		<section class="cart-products-section">
            <div class="container">
                <a href="index.html" class="continue-shopping-btn">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Continue Shopping
                </a>
                <div class="cart-products-wrapper">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Product Name</th>
                                <th>price</th>
                                <th>quantity</th>
                                <th>remove</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="cart-product-image-outer">
                                    <img src="{{asset('/assets/images/product.png')}}" height="70" width="120">
                                </td>
                                <td class="cart-product-name-outer">
                                    Test Product
                                </td>
                                <td class="cart-product-price-outer">
                                    ৳ 300
                                </td>
                                <td class="qty-increment-decrement-outer">
                                    <input type="number" name="qty" readonly value="300" min="1" />
                                </td>
                                <td>
                                    <a href="#" class="remove-product">Remove</a>
                                </td>
                                <td class="cart-product-total-outer">
                                    ৳ 300
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <a href="checkout.html" class="process-checkout-btn">
                        Proceed To CheckOut
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
        </section>
	</main>
@endsection