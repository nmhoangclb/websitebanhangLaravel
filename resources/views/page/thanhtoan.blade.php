@extends('layout.index')
@section('content')

<div class="col-lg-10" style="padding-top: 15px; padding-bottom: 20px;">
	<div><h4>Thông tin giỏ hàng</h4></div>
				<table class="table table-bordered" id="table-cart">
					<thead>
						<tr>
							<th scope="col">Sản phẩm</th>
							<th scope="col">Số lượng</th>
							<th scope="col">Giá</th>
							<th scope="col">Tổng cộng</th>
							<th scope="col">Xoá</th>

						</tr>
					</thead>
					<tbody>
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
								<td style="text-align: right" id="total">123</td>
							</tr>
						</tbody>
					</table>
					<a class="btn btn-success" role="button" aria-pressed="true" href="{{ route('checkout') }}">Thanh toán </a>
				</div>
				<script type="text/javascript">
					showListBuy();
				</script>
			</div> <!-- end right column -->

@endsection