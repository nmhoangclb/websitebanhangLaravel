<div id="header">
		<!-- <div class="header-top">

			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> 90-92 Đông Thọ, Thạnh Trị, Tân Hiệp - Kiên Giang</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0165 6987</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li>
						<li><a href="#">Đăng kí</a></li>
						<li><a href="#">Đăng nhập</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		<!--</div>  -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<!--Tìm kiếm <div class="beta-comp">
						<form role="search" method="get" id="searchform" action="/">
					        <input type="text" value="" name="s" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div> -->

					<div class="beta-comp">
						@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng ( @if(Session::has('cart')) {{ Session('cart')->totalQty }} @else Trống  @endif)<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">

									@foreach($product_cart as $product)
										<div class="cart-item">
											<div class="media">
												<a class="pull-left" href="#"><img src="source/image/product/{{ $product['item']['image'] }}" alt=""></a>
												<div class="media-body">
													<span class="cart-item-title">{{ $product['item']['name'] }}</span>
													<span class="cart-item-amount">Số lượng: {{ $product['qty']}}<b>x</b>
														<span>
														@if($product['item']['promotion_price'] == 0)
															{{ number_format($product['item']['unit_price'], 0) }} đ
														@else
															{{ number_format($product['item']['promotion_price'], 0) }} đ
														@endif
														</span></span>
												</div>
												<a class="cart-item-delete" style="background: none;" href="{{ Route('xoagiohang',$product['item']['id']) }}"><span style="font-size: 18px" class="glyphicon glyphicon-remove-circle"></span></a>
											</div>
										</div>
									@endforeach



								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{  number_format(Session('cart')->totalPrice, 0) }} đ</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">

			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu Ne</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ Route('trang-chu') }}">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loai_sp as $lsp)
								<li><a href="{{ Route('loaisanpham',$lsp->id) }}">{{ $lsp->name }}</a></li>
							@endforeach
							</ul>
						</li>
						<li><a href="{{ Route('gioithieu') }}">Giới thiệu</a></li>
						<li><a href="{{ Route('lienhe') }}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div>
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->