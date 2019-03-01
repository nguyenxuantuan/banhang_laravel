@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Tìm thấy {{count($sanpham)}} sản phẩm</strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">Tên</th>
                          <th scope="col">Loại</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Giá</th>
                          <th scope="col">Giá Khuyến mãi</th>
                          <th scope="col">ảnh</th>
                          <th scope="col">Dơn vị tính</th>
                          <th scope="col">Mới</th>
                          <th scope="col">Sửa</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sanpham as $sp)
                          <tr>
                            <td>{{$sp->id}}</td>
                            <td>{{$sp->name}}</td>
                            @if($cate)
                            <td>{{$cate->name}}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$sp->description}}</td>
                            <td >{{$sp->unit_price}}</td>
                            <td >{{$sp->promotion_price}}</td>
                            <td >
                              <img src="{{config('app.url')}}/storage/uploads/uploads/{{$sp->image}}" height="70px" >
                            </td>
                            <td >{{$sp->unit}}</td>
                            <td >{{$sp->new}}</td>
                            <td><a href="{{route('sanphams.edit',$sp->id)}}"><button class="btn btn-warning">Sửa</button></a></td>
                            <td>
                               <form  style="display:inline;" action="{{route('sanphams.delete',$sp->id)}}" method="post">
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
                </div>
                 <div>
                   <a href="{{route('sanphams.create')}}"><button class="btn btn-success">Thêm mới sản phẩm</button></a>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
