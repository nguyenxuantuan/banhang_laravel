@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Đơn hàng</strong>
                  <div class="search-container pull-right">
                    <form action="#">
                      <input type="text" placeholder="Tìm kiếm đơn hàng...." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">Tên khách hàng</th>
                          <th scope="col">Ngày đặt hàng</th>
                          <th scope="col">Tổng tiền</th>
                          <th scope="col">Hình thức thanh toán</th>
                          <th scope="col">Ghi chú</th>
                          <th scope="col">Chi Tiết</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($donhang as $dh)
                        @php
                        $cate = App\Customer::where('id',$dh->id_customer)->first();
                        @endphp
                          <tr>
                            <td>{{$dh->id}}</td>
                            @if($cate)
                            <td>{{$cate->name}}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$dh->date_order}}</td>
                            <td >{{$dh->total}}</td>
                            <td >{{$dh->payment}}</td>
                            <td >{{$dh->note}}</td>
                            <td><a href="{{route('donhangs.chitiet',$dh->id)}}"><button class="btn btn-info">Chi Tiet</button></a></td>
                            <td>
                               <form  style="display:inline;" action="{{route('donhangs.delete',$dh->id)}}" method="post">
                               @csrf
                                <div class="form-group">
                                  <button type="Delete" class="btn btn-danger">Xóa</button>
                                </div>
                              </form>
                            </td>
                          </tr>
                       @endforeach
                      </tbody>
                    </table>
                  {{$donhang->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
