
<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href=""><i class="fa fa-home"></i> Số 68 Ngõ 347 - Cổ Nhuế - Hà Nội</a></li>
					<li><a href=""><i class="fa fa-phone"></i> 0373658696</a></li>
				</ul>
			</div>
			<div class="pull-right auto-width-right">
				<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
							<li><a href="#">Chào bạn {{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('home.dangxuat')}}">Đăng xuất</a></li>
						@else
							<li><a href="{{route('home.sigup')}}">Đăng kí</a></li>
							<li><a href="{{route('home.login')}}">Đăng nhập</a></li>
						@endif
				</ul>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
				<a href="{{route('home.index')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" ></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
					<form role="search" method="get" id="searchform" action="{{route('home.search')}}">
					        <input type="text" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
							<div class="cart">
								<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Cart::count()>0) {{Cart::count()}} @else Trống @endif)
								<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body" id="cart">
									@foreach (Cart::content() as $product)
										<div class="cart-item">
											<div class="media">
											<a class="pull-left" href="#"><img src="source/image/product/{{$product->options->image}}"></a>
												<div class="media-body">
												<span class="cart-item-title"><a href="{{route('home.chitietsp',$product->id)}}">{{$product->name}}</a></span>
													{{-- <span class="cart-item-options">Size: XS; Colar: Navy</span> --}}
												<span class="cart-item-amount">{{$product->qty}}*{{number_format($product->price)}}
												VND<span></span></span>
												{{-- </div>
													<a href="{{route('home.delete_one_cart',$product->rowId)}}">Xóa sản phẩm</a>
												</div> --}}

												{{-- xoa san pham ajax --}}
												</div>
													<a href="" class="delete_onecart_ajax" data-id="{{$product->rowId}}">Xóa sản phẩm ajax</a>
											</div>
											{{-- het xoa san pham bang ajax --}}
										</div>
									@endforeach
								<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền : <span class="cart-total-value">
										{{Cart::total()}} VND
								</span></div>
							<div class="clearfix"><a href="{{route('home.deletecart')}}">Xóa giỏ hàng</a> </div>

							{{-- delete cart ajax --}}
								<div >
									<a href="" class="xoagiohang_ajax">
										xoa gio hang ajax</a>
								</div>
							{{-- delete cart ajax --}}

									<div class="center">
										<div class="space10">&nbsp;</div>
									<a href="{{route('home.dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					{{-- @endif --}}
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{ route('home.index') }}">Trang chủ</a></li>
						<li><a href="{{ route('home.loaisp') }}">Loai Sản phẩm</a>
							<ul class="sub-menu">

								@foreach ($loai_sp as $loai)
									<li><a href="{{ route('home.loaisp',$loai->id) }}">{{$loai->name}}</a></li>
								@endforeach

							</ul>
						</li>
						<li><a href="{{route('home.gioithieu')}}">Giới thiệu</a></li>
					<li><a href="{{route('home.lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>
	 {{-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> --}}
	 {{-- <script src="jquery-3.3.1.min.js"></script> --}}
	 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".delete_onecart_ajax").click(function (e) {
      e.preventDefault();
			var id_product = $(this).data('id');
			if (confirm('Are you sure you want to delete this?'))
			{
			  $.ajax({
			    type: "POST",
			    url: "{{route('delete_onecart_ajax')}}",
			    data: {id_product:id_product},
			    dataType: "JSON",
			    success: function (response)
			      {
			      // console.log(response);
			        // $("#product_"+response).fadeOut(500);
			      }
			    });
			  }
      });
  });

</script>
