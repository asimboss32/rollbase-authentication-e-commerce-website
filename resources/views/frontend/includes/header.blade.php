<header class="header-section">
    <div class="container">
        <div class="header-top-wrapper">
            <a href="{{ url('/') }}" class="brand-logo-outer">
                <img src="{{ $globalSiteSettings->logo }}" alt="Logo">
            </a>
            <div class="search-form-outer">
                <form action="{{ url('/search-products') }}" method="GET" class="form-group search-form">
                    @csrf
                    <input type="text" name="search" class="form-control" placeholder="Search for items...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="header-top-right-outer">
                <div class="res-search">
                    <i class="fas fa-search"></i>
                </div>
                <!-- 🔐 Login Icon (NEW) -->
                @if (Auth::user() && Auth::user()->role === 'customer')
                    <div class="header-top-right-item">
                        <a href="{{ url('/customer/dashboard') }}" class="header-top-right-item-link">
                            <span class="icon-outer">
                                <i class="fas fa-user-circle"></i>
                            </span>
                            Dashboard
                        </a>
                    </div>
                @else
                    <div class="header-top-right-item">
                        <a href="{{ url('/customer/login') }}" class="header-top-right-item-link">
                            <span class="icon-outer">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>
                            Login
                        </a>
                    </div>
                @endif
                <div class="header-top-right-item dropdown">
                    <div class="header-top-right-item-link">
                        <span class="icon-outer">
                            <i class="fas fa-cart-plus"></i>
                            <span class="count-number">{{ $cartCount }}</span>
                        </span>
                        Cart
                    </div>
                    <div class="cart-items-wrapper">
                        <div class="cart-items-outer">
                            @php
                                $cartTotal = 0;
                            @endphp
                            @foreach ($globalCarts as $cart)
                                @php
                                    $cartTotal = $cartTotal + $cart->price * $cart->qty;
                                @endphp
                                <div class="cart-item-outer">
                                    <a href="{{ url('/product-details/' . $cart->product->slug) }}"
                                        class="cart-product-image">
                                        <img src="{{ $cart->product->image }}" alt="product">
                                    </a>
                                    <div class="cart-product-name-price">
                                        <a href="{{ url('/product-details/' . $cart->product->slug) }}"
                                            class="product-name">
                                            {{ $cart->product->name }}
                                        </a>
                                        <span class="product-price">
                                            ৳ {{ $cart->price }} x {{ $cart->qty }} = ৳
                                            {{ $cart->price * $cart->qty }}
                                        </span>
                                    </div>
                                    <div class="cart-item-delete">
                                        <a href="{{ url('/delete-cart/' . $cart->id) }}" class="delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach


                        </div>

                        <div class="shopping-cart-footer">
                            <div class="shopping-cart-total">
                                <h4>
                                    Total <span>৳ {{ $cartTotal }}</span>
                                </h4>
                            </div>
                            <div class="shopping-cart-button">
                                <a href="{{ url('/view-cart') }}" class="view-cart-link">View cart</a>
                                <a href="{{ url('/checkout') }}" class="checkout-link">Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom-wrapper">
        <div class="container">
            <div class="header__bottom-outer">
                <div class="header__category-outer">
                    <div class="header__category-items-wrapper">
                        <div class="header__category-icon-outer">
                            <span>Categories</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="header__category-items-outer">
                            <ul class="header__category-list">
                                @foreach ($categoriesGlobal as $category)
                                    <li class="header__category-list-item item-has-submenu">
                                        <a href="{{ url('/category-products/' . $category->slug) }}"
                                            class="header__category-list-item-link">
                                            <img src="{{ $category->image }}" alt="category">
                                            {{ $category->name }}
                                        </a>
                                        <ul class="header__nav-item-category-submenu">
                                            @foreach ($category->subCategory as $subCategory)
                                                <li class="header__category-submenu-item">
                                                    <a href="{{ url('/subcategory-products/' . $subCategory->slug) }}"
                                                        class="header__category-submenu-item-link">
                                                        {{ $subCategory->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nav-toggle-btn">
                    <div class="btn-inner"></div>
                </div>
                <div class="header__dynamic-page-wrapper">
                    <ul class="dynamic-page-list">
                        <li class="dynamic-page-list-item">
                            <a href="{{ url('/') }}" class="dynamic-page-list-item-link">
                                Home
                            </a>
                        </li>
                        <li class="dynamic-page-list-item">
                            <a href="{{ url('/shop') }}" class="dynamic-page-list-item-link">
                                Shop
                            </a>
                        </li>
                        </li>
                        <li class="dynamic-page-list-item">
                            <a href="return-process.html" class="dynamic-page-list-item-link">
                                Return Process
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
