@extends('layout.index')
@section('content')

	<div> <h4 style="padding-top: 15px;color:#d69832;">Sản phẩm với từ khoá: "{{ $keyword }}"</h4>
	</div>
				<!-- List product -->

				<div class="list-product">

					@foreach($sanpham as $sp)
					<div class="card">
						<center><img class="img-thumb" src="asset/image/{{ $sp->image }}"></center>
						<div class="card-body">
							<p style="margin: 0px;">{{ $sp->name }}</p>
							<p class="card-text text-danger">{{ number_format($sp->unit_price, 0)  }} <u>đ</u></p>
							<center name="button">
								<a href="{{ route('chitietsanpham',$sp->id) }}" class="btn btn-secondary" role="button" aria-pressed="true">Chi tiết</a>
								<button type="button" class="btn btn-primary" onclick="addBuy(this,1,'{{ $sp->name }}','{{ $sp->image }}',1,{{ $sp->unit_price }});">
									Đặt mua
								</button>
							</center>
						</div>
					</div>
					@endforeach


			</div> <!-- end List product -->
			<br>
			<div class="row" style="margin:auto; ">{!! $sanpham->links() !!}</div>
@endsection