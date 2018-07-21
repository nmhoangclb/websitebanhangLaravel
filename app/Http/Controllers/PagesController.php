<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use App\Slide;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller {
	//
	public function getIndex() {
		$slide = Slide::all();
		$new_product = Product::where('new', 1)->paginate(4);
		$sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
		//return view('pages.trangchu', ['slide' => $slide]);
		return view('pages.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
	}

	public function getLoaiSP($type) {
		$sp_theoloai = Product::where('id_type', $type)->get();
		return view('pages.loai_sanpham', compact('sp_theoloai'));
	}

	public function getChiTietSP($id) {
		$sanpham = Product::where('id', $id)->first();
		return view('pages.chitiet_sanpham', compact('sanpham'));
	}

	public function getLienHe() {
		return view('pages.lienhe');
	}

	public function getGioiThieu() {
		return view('pages.gioithieu');
	}

	public function getAddtoCart(Request $request, $id) {
		$product = Product::find($id);
		$oldCart = Session('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $id);
		$request->session()->put('cart', $cart);

		return redirect()->back();
	}

	public function getDelItemCart($id) {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);

		if (count($cart->items) > 0) {
			Session::put('cart', $cart);
		} else {
			Session::forget('cart');
		}

		return redirect()->back();
	}

}
