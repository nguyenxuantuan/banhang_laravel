<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline">
					<li><a href=""><i class="fa fa-home"></i> Ngõ 347 - Cổ Nhuế - Hà Nội</a></li>
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
						{{-- @if(Cart::count()>0) --}}
							<div class="cart">
								<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Cart::count()>0) {{Cart::count()}} @else Trống @endif)
								<i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
									@foreach (Cart::content() as $product)
										<div class="cart-item">
											<div class="media">
											<a class="pull-left" href="#"><img src="source/image/product/{{$product->options->image}}"></a>
												<div class="media-body">
												<span class="cart-item-title"><a href="{{route('home.chitietsp',$product->id)}}">{{$product->name}}</a></span>
													{{-- <span class="cart-item-options">Size: XS; Colar: Navy</span> --}}
												<span class="cart-item-amount">{{$product->qty}}*{{number_format($product->price)}}
												VND<span></span></span>
												</div>
												<a href="{{route('home.delete_one_cart',$product->rowId)}}">Xóa sản phẩm</a>
											</div>
										</div>
									@endforeach
								<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền : <span class="cart-total-value">
										{{Cart::total()}} VND
								</span></div>
							<div class="clearfix"><a href="{{route('home.deletecart')}}">Xóa giỏ hàng</a> </div>
									<div class="center">
										<div class="space10">&nbsp;</div>
									<a href="{{route('home.dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
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
