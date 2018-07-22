<nav class="navbar navbar-expand-lg navbar-dark bg-color">
		<!-- <a class="navbar-brand" href="#">SHOP PHONE</a> -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="plogo"></div>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="trangchu">Trang chủ <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Tin tức</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Bảo hành</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Liên hệ</a>
				</li>
			</ul>
			<form class="form-inline" action="{{ route('timkiem') }}">
				<input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Tìm kiếm" aria-label="Search">

				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button class="btn btn-outline-info my-2 my-sm-0" type="submit">Tìm kiếm</button>
			</form>
		</div>
		<div>
			<a href="{{ route('thanhtoan') }}"><i class="cart_anchor fa fa-shopping-bag"></i></a>
			<span class="badge badge-pill badge-danger" id="count-in-cart"></span>
		</div>
</nav> <!-- end-nav -->

	<!-- nav mobile -->
	<div class="d-lg-none navbar navbar-dark bg-color">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#side-menu-collapse" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div></div>
	</div> <!-- end nav mobile when open mobile -->