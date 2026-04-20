@extends('frontend.master')

@section('content')
    <main>
        <section class="product-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="filter-items-wrapper">
                            <div class="res_filter-items-top-outer">
                                <h3 class="res_filter-items-top-title">Filters</h3>
                            </div>
                            <div class="filter-items-outer">
                                <div class="label">
                                    <span>categories</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <form class="filter-items" id="collapseOne" action="" method="GET">                                    
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>Hot Products</span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>Hot Products</span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>Hot Products</span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>Hot Products</span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="filter-items-outer">
                                <div class="label">
                                    <span>sub categories</span>
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <form class="filter-items" id="collapseTwo" action="" method="GET">
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>
                                                Test Subcategory
                                            </span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>
                                                Test Subcategory
                                            </span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>
                                                Test Subcategory
                                            </span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>
                                                Test Subcategory
                                            </span>
                                        </label>
                                    </div>
                                    <div class="item-label">
                                        <label>
                                            <input type="checkbox" value="" id="" name="" class="checkbox" />
                                            <span>
                                                Test Subcategory
                                            </span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-page-header-wrapper">
                                    <div class="left-side-box">
                                        <h4 class="title">
                                            Shop Products
                                        </h4>
                                    </div>
                                    <div class="right-side-box">
                                        <h4 class="product-qty">
                                            Total Products
                                            <span class="number">10</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="product__item-outer">
                                    <div class="product__item-image-outer">
                                        <a href="#" class="product__item-image-inner">
                                            <img src="{{asset('frontend/assets/images/product.png')}}" alt="Product Image" />
                                        </a>
                                        <div class="product__item-add-cart-btn-outer">
                                            <a href="#" class="product__item-add-cart-btn-inner">
                                                Add to Cart
                                            </a>
                                        </div>
                                        <div class="product__type-badge-outer">
                                            <span class="product__type-badge-inner">
                                               Hot
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product__item-info-outer">
                                        <a href="#" class="product__item-name">
                                            Test Product
                                        </a>
                                        <div class="product__item-price-outer">
                                            <div class="product__item-discount-price">
                                                <del>400 Tk.</del>
                                            </div>
                                            <div class="product__item-regular-price">
                                                <span>300 Tk.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
	</main>
@endsection