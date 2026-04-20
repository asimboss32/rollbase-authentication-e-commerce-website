<header class="header-section">
		<div class="container">
			<div class="header-top-wrapper">
				<a href="{{url('/')}}" class="brand-logo-outer">
					<img src="{{asset('frontend/assets/images/logo.png')}}" alt="Logo">
				</a>
				<div class="search-form-outer">
					<form action="" method="GET" class="form-group search-form">
						<input type="text" name="search" class="form-control" placeholder="Search for items...">
						<button type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>
				<div class="header-top-right-outer">
					<div class="res-search">
						<i class="fas fa-search"></i>
					</div>
					<div class="header-top-right-item dropdown">
						<div class="header-top-right-item-link">
							<span class="icon-outer">
								<i class="fas fa-cart-plus"></i>
								<span class="count-number">1</span>
							</span>
							Cart
						</div>
						<div class="cart-items-wrapper">
							<div class="cart-items-outer">
								<div class="cart-item-outer">
									<a href="#" class="cart-product-image">
										<img src="{{asset('frontend/assets/images/product.png')}}" alt="product">
									</a>
									<div class="cart-product-name-price">
										<a href="#" class="product-name">
											Test Product
										</a>
										<span class="product-price">
											৳ 300
										</span>
									</div>
									<div class="cart-item-delete">
										<a href="#" class="delete-btn">
											<i class="fas fa-trash-alt"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="shopping-cart-footer">
								<div class="shopping-cart-total">
									<h4>
										Total <span>৳ 300</span>
									</h4>
								</div>
								<div class="shopping-cart-button">
									<a href="{{url('/view-cart')}}" class="view-cart-link">View cart</a>
									<a href="{{url('/checkout')}}" class="checkout-link">Checkout</a>
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
									<li class="header__category-list-item item-has-submenu">
										<a href="{{url('/category-products')}}" class="header__category-list-item-link">
											<img src="{{asset('frontend/assets/images/product.png')}}" alt="category">
											Test Category
										</a>
										<ul class="header__nav-item-category-submenu">
											<li class="header__category-submenu-item">
												<a href="{{url('/subcategory-products')}}" class="header__category-submenu-item-link">
													Test Subcategory
												</a>
											</li>
										</ul>
									</li>
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
								<a href="{{url('/')}}" class="dynamic-page-list-item-link">
									Home
								</a>
							</li>
							<li class="dynamic-page-list-item">
								<a href="{{url('/shop')}}" class="dynamic-page-list-item-link">
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
