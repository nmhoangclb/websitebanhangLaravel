<?php

namespace App\Http\Controllers;
use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Customer;
use App\Product;
use App\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller {
	//
	public function getIndex() {
		// $slide = Slide::all();
		// $new_product = Product::where('new', 1)->paginate(4);
		// $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
		//return view('pages.trangchu', ['slide' => $slide]);
		$producttype = ProductType::all();
		$sanpham = Product::paginate(10);
		return view('page.trangchu', compact('producttype', 'sanpham'));
	}

	public function getLoaiSP($type) {
		$sanpham = Product::where('id_type', $type)->paginate(10);
		$idsp = $sanpham[0]['id_type'];
		$loaisp = ProductType::find($idsp);
		return view('page.sanpham', compact('sanpham', 'loaisp'));
	}

	public function getChiTietSP($id) {
		$sanpham = Product::where('id', $id)->first();
		$idsp = $sanpham->id_type;
		$loaisp = ProductType::find($idsp);
		return view('page.chitiet', compact('sanpham', 'loaisp'));
	}

	public function getTimKiem(Request $request) {
		$keyword = $request->keyword;
		$sanpham = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(2);
		return view('page.timkiem', compact('sanpham', 'keyword'));
	}

	public function getThanhToan() {

		return view('page.thanhtoan');
	}

	public function getCheckOut(Request $request) {
		return view('page.infocustomer');

	}

	public function postCheckOut(Request $request) {

		$customer = new Customer;
		$customer->name = $request->name;
		$customer->email = $request->email;
		$customer->address = $request->address;
		$customer->phone_number = $request->phonenumber;
		//$customer->note = $request->note;
		$customer->save();

		$bill = new Bill;
		$total = 0;
		$bill->id_customer = $customer->id;
		$timenow = Carbon::now();
		$timenow = $timenow->format('Y-m-d');
		$bill->date_order = $timenow;
		$bill->note = $request->note;

		$bill->save();

		$order = json_decode($request->order);
		foreach ($order as $value) {
			$billDetail = new BillDetail;
			$billDetail->id_bill = $bill->id;
			$product = $value[0];
			$soluong = $value[1];
			$billDetail->id_product = $product;
			$billDetail->quantity = $soluong;
			$billDetail->unit_price = $billDetail->product->unit_price * $soluong;
			$total += $billDetail->product->unit_price * $soluong;
			$billDetail->save();
			unset($billDetail);

		}
		$bill->total = $total;
		$bill->save();

		return redirect('xac-nhan/' . $customer->id)->with('thongbao', 'Đặt hàng thành công');

	}

	public function getXacNhan($id) {
		$customer = Customer::find($id)->bill;
		$idBill = $customer[0]['id'];
		$customer1 = Customer::find($id);
		$product = Product::all();

		$bill = Bill::find($idBill)->bill_detail;

		// $id_customer = $customer->bill->id;

		// dd($id_customer);die();
		// $billDetail = BillDetail::where('id_bill', $bill->id);
		// $product = Product::where('id', $billDetail->id_product);

		return view('page.xacnhan', compact('customer', 'customer1', 'product', 'bill'));
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
