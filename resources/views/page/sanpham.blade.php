@extends('layout.index')
@section('content')

	<!-- breadcrumb -->
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
					<li class="breadcrumb-item"><a href="loai-san-pham/{{{$loaisp->id}}}">{{$loaisp->name}}</a></li>
				</ul>
	<!-- List product -->
			<div class="list-product">
				@foreach($sanpham as $sp)
				<div class="card">
					<center><img class="img-thumb" src="asset/image/{{ $sp->image }}"></center>
					<div class="card-body">
						<p style="height: 40px;">{{ $sp->name }}</p>
						<p class="card-text text-danger">{{ number_format($sp->unit_price , 0)}} <u>đ</u></p>
						<center name="button">
							<a href="{{ route('chitietsanpham',$sp->id) }}" class="btn btn-secondary" role="button" aria-pressed="true">Chi tiết</a>
							<button type="button" class="btn btn-primary" onclick="addBuy(this,{{ $sp->id }},'{{ $sp->name }}','{{ $sp->image }}',1,{{ $sp->unit_price }});">
								Đặt mua
							</button>
						</center>
					</div>
				</div>
				@endforeach

			</div> <!-- List product -->
			<br>
			<div class="row" style="margin:auto; ">{!! $sanpham->links() !!}</div>


@endsection

@section('title')
	{{$loaisp->name}}
@endsection
