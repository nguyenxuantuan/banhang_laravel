@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Chi tiết đơn hàng</strong>
                </div>
              </div>
          </div>
          <div>
          </div>
          @if($chitietdonhang==null)
          <div class="container">
            <div class="alert alert-danger" role="alert">
              không có id trong table conection của sản phẩm
            </div>
          </div>
          <div class="container"><a href="{{ URL::previous() }}"><button class="btn btn-info">back</button></a></div>
          {{-- neu khac null --}}
           @else
            <div class="card-body">
                <table class="table table-light">
                  <thead class="thead-light">
                    <tr>
                      <th>Ten khach hang</th>
                      <th>Ten san pham</th>
                      <th>Gia</th>
                      <th>hinh anh</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($chitietdonhang as $key => $value)
                    @php
                    $sanpham = App\Product::where('id',$value->id_product)->first();
                    @endphp
                    <tr>
                      <td>{{$khachhang->name}}</td>
                      <td>{{$sanpham->name}}</td>
                      <td>{{$sanpham->unit_price}}</td>
                      <td><img src="/source/image/product/{{$sanpham->image}}" height="70px" ></td>
                    </tr>
                    @endforeach
                    <tr>
                      <thead class="thead-light"><th>Tong tien</th>
                      <td>{{$id_donhang->total}}</td></thead>
                    </tr>
                  </tbody>

                </table>
                <div >
                  <a href="{{route('donhangs.index')}}"><button class="btn btn-info">Back</button></a>
                </div>
              </div>
              @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
