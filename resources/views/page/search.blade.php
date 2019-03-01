@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Kết quả tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm </p>
								<div class="clearfix"></div>
							</div>
							{{-- san pham moi --}}
							<div class="row">
								@foreach ($product as $new)
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
							{{-- {{ $product->links()}} --}}
						</div> <!-- .beta-products-list -->
						{{-- het san pham moi --}}

						{{-- <div class="space50">&nbsp;</div> --}}
					</div>
						{{-- tat ca cac san pham --}}
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
@endsection
