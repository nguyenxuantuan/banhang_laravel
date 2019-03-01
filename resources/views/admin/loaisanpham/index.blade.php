@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Loại sản phẩm</strong>
                  <div class="search-container pull-right">
                    <form action="{{route('loaisanphams.timkiem')}}" method="POST">
                      @csrf
                      <input type="text" placeholder="Search.." name="key">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">Tên</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Ảnh minh họa</th>
                          <th scope="col">sửa</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($loaisanpham as $lsp)
                          <tr>
                            <td>{{$lsp->id}}</td>
                            <td>{{$lsp->name}}</td>
                            <td>{{$lsp->description}}</td>
                            <td><img src="/source/image/product/{{$lsp->image}}" height="100px" width="150px"></td>
                            <td><a href="{{route('loaisanphams.edit',$lsp->id)}}"><button class="btn btn-warning">Sửa</button></a></td>
                            <td>
                               <form  style="display:inline;" action="{{route('loaisanphams.delete',$lsp->id)}}" method="post">
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
                  {{$loaisanpham->links()}}
                </div>
                 <div>
                   <a href="{{route('loaisanphams.create')}}"><button class="btn btn-success">Thêm mới</button></a>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
