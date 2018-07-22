@include('layout.header')
<body>
	@include('layout.nav')

	<div class="container-fluid">
		<div class="row">
			@include('layout.menu')
			<div class="col-lg-10" style="width: 100%">
				@yield('content')
			</div>
		</div>
		@include('layout.footer')

	</div>
	@yield('script')

</body>
</html>