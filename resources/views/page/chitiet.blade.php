@extends('layout.index')
@section('content')
				<!-- breadcrumb -->
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="trangchu">Trang chủ</a></li>
					<li class="breadcrumb-item"><a href="loai-san-pham/{{{$loaisp->id}}}">{{$loaisp->name}}</a></li>
					<li class="breadcrumb-item"><a href="chi-tiet-san-pham/{{{$sanpham->id}}}">{{$sanpham->name}}</a></li>
				</ul>

				<!-- Info product -->
				<div class="row">
					<div class="col-lg-5">
						<div id="demo" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="card card-border" style="width: 100%">
										<center><img src="asset/image/serum.jpg" height="400px"></center>
									</div>
								</div>
								<div class="carousel-item">
									<div class="card" style="width: 100%">
										<center><img src="asset/image/body_1.jpg" height="400px"></center>
									</div>
								</div>
								<div class="carousel-item">
									<div class="card" style="width: 100%">
										<center><img src="asset/image/body_nho.jpg" height="400px"></center>
									</div>
								</div>
								<!-- <div class="carousel-item">
									<div class="card" style="width: 100%">
										<center><img src="phone2.png" height="400px"></center>
									</div>
								</div>
								-->
							</div>
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>

							<div style="position: unset;" class="carousel-indicators btn-group" role="group" aria-label="Basic example">
								<img src="asset/image/serum.jpg" height="50px" class="btn btn-outline-secondary" data-target="#demo" data-slide-to="0">
								<img src="asset/image/body_1.jpg" height="50px" class="btn btn-outline-secondary" data-target="#demo" data-slide-to="1">
								<img src="asset/image/body_nho.jpg" height="50px" class="btn btn-outline-secondary" data-target="#demo" data-slide-to="2">
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<h2><b>{{ $sanpham->name }}</b></h2>
						<h3><b class="text-primary">{{ number_format($sanpham->unit_price, 0)  }}<u>đ</u></b></h3>
						<br>
						<p class="text-muted">Màu sắc: Đỏ da cam, vàng, lục lam, chàm, tím</p>
						<h4>Quà tặng và ưu đãi</h4>

						<ul>
							<li class="text-muted">Tặng 1 cặp pin con thỏ</li>
							<li class="text-muted">Tặng 1 khẩu trang</li>
							<li class="text-muted">Tặng 2 gói mì tôm</li>
							<li class="text-muted">Tặng 1 đôi dép tổ ong</li>
						</ul>
						<div class="form-row"> <!-- count buy -->
							<div class="form-group col-xs-1">
						        <button type="button" class="btn btn-secondary" onclick="setbuy(-1);">
						        	<i class="fa fa-minus"></i>
						        </button>
						    </div>
						    <div class="form-group col-md-2">
						    	<input style="vertical-align: middle; display: inline-block;" type="number" class="form-control" id="countbuy" value="1" onchange="setbuy(0);">
						    </div>
						    <div class="form-group col-xs-1">
						        <button type="button" class="btn btn-secondary" onclick="setbuy(1);">
						        	<i class="fa fa-plus"></i>
						        </button>
						    </div>
						</div> <!-- end count buy -->
						<button type="submit" class="btn btn-primary" onclick="storedToCard(this, {{ $sanpham->id }},'{{ $sanpham->name }}','{{ $sanpham->image }}',+$('#countbuy').val(),{{ $sanpham->unit_price }});">Đặt mua</button>
					</div>
				</div>

				<!-- tab -->
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="mota-tab" data-toggle="tab" href="#mota" role="tab" aria-controls="mota" aria-selected="true">Mô tả</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="thongso-tab" data-toggle="tab" href="#thongso" role="tab" aria-controls="thongso" aria-selected="false">Thông số</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="danhgia-tab" data-toggle="tab" href="#danhgia" role="tab" aria-controls="danhgia" aria-selected="false">Đánh giá</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="mota" role="tabpanel" aria-labelledby="mota-tab">Mô tả</div>
					<div class="tab-pane fade" id="thongso" role="tabpanel" aria-labelledby="thongso-tab">Thông số</div>
					<div class="tab-pane fade" id="danhgia" role="tabpanel" aria-labelledby="danhgia-tab">
						<iframe src="asset/rate.html" style="border:none; width: 100%; height: 1000px;"></iframe>
					</div>
				</div>
			</div>
@endsection

@section('title')
	{{$sanpham->name}}
@endsection