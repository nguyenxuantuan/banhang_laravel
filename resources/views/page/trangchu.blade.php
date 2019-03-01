@extends('master')
@section('content')
<div class="fullwidthbanner-container">
<div class="fullwidthbanner">
  <div class="bannercontainer" >
    <div class="banner" >
      <ul>
			@foreach ($slide as $sl)
						 <!-- THE FIRST SLIDE -->
					<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
						<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
						<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$sl->image}}" data-src="source/image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
							</div>
						</div>
					</li>
				@endforeach
      </ul>
    </div>
  </div>
  <div class="tp-bannertimer"></div>
</div>
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
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>
							{{-- san pham moi --}}
							<div class="row">
								@foreach ($new_product as $new)
									<div class="col-sm-3">
										<div class="single-item">
											@if($new->promotion_price!=0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
											<a href="{{route('home.chitietsp',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
												<p class="single-item-price">
												@if($new->promotion_price==0)
												<span class="flash-sale" style="font-size:18px">{{number_format($new->unit_price)}} VND</span>
												@else
													<span class="flash-del" style="font-size:18px">{{number_format($new->unit_price)}} VND</span>
													<span class="flash-sale" style="font-size:18px">{{number_format($new->promotion_price)}} VND</span>
												</p>
												@endif
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('home.addtocart',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('home.chitietsp',$new->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							{{ $new_product->links()}}
						</div> <!-- .beta-products-list -->
						{{-- het san pham moi --}}

						<div class="space50">&nbsp;</div>

					{{-- spkm --}}

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($promotion_products)}} sản phẩm khuyến mãi</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($promotion_products as $spkm)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
										<a href="{{route('home.chitietsp',$spkm->id)}}"><img src="source/image/product/{{$spkm->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
										<p class="single-item-title">{{$spkm->names}}</p>
											<p class="single-item-price">
												<span class="flash-del" style="font-size:18px">{{number_format($spkm->unit_price)}} VND</span>
												<span class="flash-sale" style="font-size:18px">{{number_format($spkm->promotion_price)}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('home.addtocart',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('home.chitietsp',$spkm->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
					{{$promotion_products->links()}}
				</div> <!-- end section with sidebar and main content -->
					{{-- het spkm --}}

						{{-- tat ca cac san pham --}}

					<div class="beta-products-list">
							<h4>Tất cả sản phẩm </h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach ($all_product as $all)
								<div class="col-sm-3">
									<div class="single-item">
										@if($all->promotion_price!=0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
										<div class="single-item-header">
										<a href="{{route('home.chitietsp',$all->id)}}"><img src="source/image/product/{{$all->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
										<p class="single-item-title">{{$all->name}}</p>
											<p class="single-item-price">
												@if ($all->promotion_price==0)
														<span class="flash-sale" style="font-size:18px">{{number_format($all->unit_price)}} VND</span>
												@else
													<span class="flash-del" style="font-size:18px">{{number_format($all->unit_price)}} VND</span>
													<span class="flash-sale" style="font-size:18px">{{number_format($all->promotion_price)}} VND</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('home.addtocart',$all->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('home.chitietsp',$all->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->
					</div>
					{{$all_product->links()}}
				</div> <!-- end section with sidebar and main content -->
					{{-- het spkm --}}

			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
</div>
@endsection
