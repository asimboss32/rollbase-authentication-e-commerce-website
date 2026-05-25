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
                              @php
                            $cartTotal = 0;
                        @endphp
                           @foreach ($globalCarts as $cart )
                           @php
                               $cartTotal = $cart->price*$cart->qty;
                            @endphp
                                <tr>
                                <td class="cart-product-image-outer">
                                    <img src="{{$cart->product->image}}" height="70" width="120">
                                </td>
                                <td class="cart-product-name-outer">
                                    {{$cart->product->name}}
                                </td>
                                <td class="cart-product-price-outer">
                                    ৳ {{$cart->price}}
                                </td>
                                <td class="qty-increment-decrement-outer">
                                    <input type="number" name="qty" readonly value="{{$cart->qty}}" min="1" />
                                </td>
                                <td>
                                    <a href="{{ url('/delete-cart/'.$cart->id) }}" class="remove-product">Remove</a>
                                </td>
                                <td class="cart-product-total-outer">
                                    ৳ {{$cartTotal}}
                                </td>
                            </tr>
                           @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <a href="{{ url('/checkout') }}" class="process-checkout-btn">
                        Proceed To CheckOut
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
        </section>
	</main>
@endsection