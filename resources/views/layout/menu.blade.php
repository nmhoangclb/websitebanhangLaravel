
			<div class="col-lg-2" style="padding-right: 0px; padding-top: 15px;">

				<div class="collapse navbar-collapse" id="side-menu-collapse">
					<div class="list-group-item bg-color text-white">
						Danh mục sản phẩm
					</div>
				@if($producttype)
					@foreach($producttype as $protype)
					<a href="{{ route('loaisanpham',$protype->id) }}" class="list-group-item list-group-item-action">{{ $protype->name }}</a>
					@endforeach
				@else
					<a>Chưa có dữ liệu!</a>
				@endif
				</div>
			</div>