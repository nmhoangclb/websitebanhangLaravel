@extends('layout.index')
@section('content')

	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class=""></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2" class="active"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item">
				<img data-src="holder.js/100px250" class="img-fluid" alt="100%x250" style="height: 250px; width: 100%; display: block;" src="asset/1.jpg" data-holder-rendered="true">
			</div>
			<div class="carousel-item">
				<img data-src="holder.js/100px250" class="img-fluid" alt="100%x250" style="height: 250px; width: 100%; display: block;" src="asset/2.jpg" data-holder-rendered="true">
			</div>
			<div class="carousel-item active">
				<img data-src="holder.js/100px250" class="img-fluid" alt="100%x250" style="height: 250px; width: 100%; display: block;" src="asset/3.jpg" data-holder-rendered="true">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">V</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Tiếp</span>
		</a>
	</div> <!-- end slide -->
	<br>

	<div class="title-sp-dep">
		<span class="chudep">Các sản phẩm của UyênSHOP</span><br>
		<hr style="width:90%; background-color:  #d69832; ">
		<!-- <img class="alignnone size-full wp-image-263 aligncenter" src="asset/image/r3w.png" alt="" width="448" height="39"> -->
	</div>
	<!-- List product -->
	<div class="list-product">

		@foreach($sanpham as $sp)
		<div class="card">
			<center><img class="img-thumb" src="asset/image/{{ $sp->image }}"></center>
			<div class="card-body">

				<p style="height: 40px;">{{ $sp->name }}</p>
				<p class="card-text text-danger">{{ number_format($sp->unit_price, 0)  }} <u>đ</u></p>
				<center name="button">
					<a href="{{ route('chitietsanpham',$sp->id) }}" class="btn btn-secondary" role="button" aria-pressed="true">Chi tiết</a>
					<button type="button" class="btn btn-primary" onclick="addBuy(this,{{ $sp->id }},'{{ $sp->name }}','{{ $sp->image }}',1,{{ $sp->unit_price }});">
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

@section('css')
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&amp;subset=vietnamese" rel="stylesheet">
@endsection