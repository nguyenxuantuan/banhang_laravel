@extends('master')
@section('content')
<br><br><br>
<div class="container">
<form action="{{route('home.xacnhandathang')}}" method="post" class="beta-form-checkout">
			@csrf
				<div class="row">
					@if(Auth::check())
					@dump(Auth::user()->get());
						<div class="col-sm-6">
							<h4>Đặt hàng</h4>
							<div class="space20">&nbsp;</div>
							<div class="form-block"> <!--ho va ten-->
									<label for="name">Họ tên*</label>
									<input type="text" id="name" name="name" placeholder="Họ tên" value="{{Auth::user()->full_name}}" required>
							</div>
							<div class="form-block"><!--Email-->
								<label for="email">Email*</label>
								<input type="email" name="email" id="email" value="{{Auth::user()->email}}" required placeholder="expample@gmail.com">
							</div>
							<div class="form-block">
								<label for="adress" >Địa chỉ*</label>
								<input type="text" name="adress" id="adress"  value="{{Auth::user()->address}}" required>
							</div>
							<div class="form-block">
								<label for="phone">Điện thoại*</label>
								<input type="text" id="phone" name="phone"  value="{{Auth::user()->phone}}" required>
							</div>
							<div class="form-block">
								<label for="notes">Ghi chú</label>
								<textarea id="notes" name="note"></textarea>
							</div>
						</div>
					@else
						<div class="col-sm-6">
							<h4>Đặt hàng</h4>
							<div class="space20">&nbsp;</div>
							<div class="form-block">
									<label for="name">Họ tên*</label>
									<input type="text" id="name" name="name" placeholder="Họ tên" required>
							</div>
							<div class="form-block">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
							</div>
							<div class="form-block">
								<label for="email">Email*</label>
								<input type="email" name="email" id="email" required placeholder="expample@gmail.com">
							</div>
							<div class="form-block">
								<label for="adress" >Địa chỉ*</label>
								<input type="text" name="adress" id="adress" placeholder="Street Address" required>
							</div>
							<div class="form-block">
								<label for="phone">Điện thoại*</label>
								<input type="text" id="phone" name="phone" required>
							</div>
							<div class="form-block">
								<label for="notes">Ghi chú</label>
								<textarea id="notes" name="note"></textarea>
							</div>
						</div>
					@endif
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							@foreach (Cart::content() as $sanpham )
								<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										<div class="media">
										<img width="25%" src="source/image/product/{{$sanpham->options->image}}" class="pull-left" >
											<div class="media-body">
												<p class="font-large">{{$sanpham->name}}</p>
												{{-- <span class="color-gray your-order-info">Color: Red</span> --}}
												{{-- <span class="color-gray your-order-info">Size: M</span> --}}
											</div>
											<br><br>
											<div><span class="color-gray your-order-info">Số lượng : {{$sanpham->qty}}*{{number_format($sanpham->price)}}
												VND</span>
											</div>
										</div>
									<!-- end one item -->
							@endforeach
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
								<div class="pull-right"><h5 class="color-black">
									{{Cart::total()}}</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>
									</li>
									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn Xuân Tuấn
											<br>- Ngân hàng BIDV, Chi nhánh HA NOI
										</div>
									</li>

								</ul>
							</div>
				{{-- <div class="text-center"><a class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></a></div> --}}
				<div class="text-center"><button class="btn btn-success" type="submit" name="submit"> Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
  </div>
  </div>
@endsection
