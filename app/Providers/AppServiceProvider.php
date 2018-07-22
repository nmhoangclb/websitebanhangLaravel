<?php

namespace App\Providers;

use App\Cart;
use App\ProductType;
use Illuminate\Support\ServiceProvider;
use Session;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//view share qua header
		view()->composer('header', function ($view) {
			$loai_sp = ProductType::all();

			$view->with('loai_sp', $loai_sp);
		});

		view()->composer('header', function ($view) {
			if (Session('cart')) {
				$oldCart = Session::get('cart');
				$cart = new Cart($oldCart);
				$view->with(['cart' => Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
			}

		});

		view()->composer('layout.menu', function ($view) {
			$producttype = ProductType::all();

			$view->with('producttype', $producttype);
		});

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
