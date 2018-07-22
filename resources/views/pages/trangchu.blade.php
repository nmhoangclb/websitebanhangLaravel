@extends('master')

@section('content')
@include('slide')
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($new_product) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $new)
								<div class="col-sm-3">
									<div class="space30">&nbsp;</div>
									<div class="single-item">
									@if($new->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif

										<div class="single-item-header">
											<a href="{{ route('chitietsanpham',$new->id) }}"><img src="source/image/product/{{ $new->image }}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $new->name }}</p>
											<p class="single-item-price">
											@if($new->promotion_price == 0)
												<span class="flash-sale">{{ number_format($new->unit_price, 0) }} VNĐ</span>
											@else
												<span class="flash-del">{{ number_format($new->unit_price, 0) }} VNĐ</span>
												<span class="flash-sale">{{ number_format($new->promotion_price, 0) }} VNĐ</span>
											@endif
											</p>
										</div>
										<div class="space10">&nbsp;</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$new->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitietsanpham',$new->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{ $new_product->links() }}</div>
						</div> <!-- .beta-products-list -->

					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($sanpham_khuyenmai) }} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sanpham_khuyenmai as $spkm)
								<div class="col-sm-3">
									<div class="space30">&nbsp;</div>
									<div class="single-item">
									@if($spkm->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif

										<div class="single-item-header">
											<a href="{{ route('chitietsanpham',$spkm->id) }}"><img src="source/image/product/{{ $spkm->image }}" alt="" height="200px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $spkm->name }}</p>
											<p class="single-item-price">
												<span class="flash-del">{{ number_format($spkm->unit_price, 0) }} VNĐ</span>
												<span class="flash-sale">{{ number_format($spkm->promotion_price, 0) }} VNĐ</span>
											</p>
										</div>
										<div class="space10">&nbsp;</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$new->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitietsanpham',$spkm->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">{{ $sanpham_khuyenmai->links() }}</div>
						</div> <!-- .beta-products-list -->


					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
@endsection