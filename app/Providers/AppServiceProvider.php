<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\setting;
use App\Models\SubCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view){
            $view->with('globalCarts', Cart::where('ip_address', request()->ip())->with('product')->get());
            $view->with('cartCount', Cart::where('ip_address', request()->ip())->with('product')->count());
            $view->with('categoriesGlobal', Category::orderBy('name', 'asc')->with('subCategory')->get());
            $view->with('subCategoriesGlobal', SubCategory::orderBy('name', 'asc')->get());
            $view->with('globalSiteSettings', setting::first());
            // $view->with('topBanners', Banner::get());
            // $view->with('termPolicy', Policy::first());
        });
    }
}
