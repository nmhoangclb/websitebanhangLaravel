@extends('layout.index')
@section('content')

<div class="col-lg-10" style="padding-top: 15px; padding-bottom: 20px;">
				@if(session('thongbao'))
					<script type="text/javascript">window.removeAllProduct();</script>
					<div class="alert alert-success">{{ session('thongbao') }}</div>

				@endif

				<div><h4>Thông tin giỏ hàng</h4></div>
				<table class="table table-bordered" id="table-cart">
					<thead>
						<tr>
							<th scope="col">Sản phẩm</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Giá</th>
							<th scope="col">Tổng cộng</th>
						</tr>
					</thead>
					<tbody>
						@foreach($bill as $bl)
						<tr>
							<td>

								@foreach($product as $pro)
									@if($pro->id == $bl->id_product)
										<img width="65px" height="50px" src="asset/image/{{ $pro->image }}">  {{ $pro->name }}
									@endif
								@endforeach
							</td>
							<td>{{ $bl->quantity }}</td>
							<td>
								@foreach($product as $pro)
									@if($pro->id == $bl->id_product)
										{{ number_format($pro->unit_price, 0) }} <u>đ</u>
									@endif
								@endforeach
							</td>
							<td>{{ number_format($bl->unit_price, 0) }} <u>đ</u></td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<div><h4>Thông tin khách hàng</h4></div>
				<table class="table table-bordered" id="table-cart">
					<thead>
						<tr>
							<th scope="col">Tên khách hàng</th>
							<th scope="col">Số điện thoại</th>
							<th scope="col">Địa chỉ</th>
							<th scope="col">Chú thích</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $customer1->name }}</td>
							<td>{{ $customer1->phone_number }}</td>
							<td>{{ $customer1->address }}</td>
							<td>{{ $customer[0]['note'] }}</td>
						</tr>
					</tbody>
				</table>


				<div class="float-right" style="max-width: 400px; width: 100%;">
					<table class="table">
						<thead>
							<tr>
								<th scope="col" colspan="2" >Thông tin thanh toán</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Tổng tiền: </td>
								<td style="text-align: right" id="total">{{ number_format($customer[0]['total'], 0) }}<u> đ</u></td>
							</tr>
						</tbody>
					</table>
					<a class="btn btn-success" role="button" aria-pressed="true" href="trangchu">Hoàn tất </a>
				</div>
			</div> <!-- end right column -->

@endsection