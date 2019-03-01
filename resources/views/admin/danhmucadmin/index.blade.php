@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Danh sách admin</strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">Tên</th>
                          <th scope="col">email</th>
                          <th scope="col">password</th>
                          <th scope="col">Sửa</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($admin as $ad)
                          <tr>
                            <td>{{$ad->id}}</td>
                            <td>{{$ad->name}}</td>
                            <td>{{$ad->email}}</td>
                            <td>{{md5($ad->password)}}</td>
                            <td>
                              <a href="#"><button class="btn btn-warning">Sửa</button></a>
                            </td>
                            <td>
                              <form  style="display:inline;" action="{{route('admins.delete',$ad->id)}}" method="post">
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
                   <a href="{{route('admins.create')}}"><button class="btn btn-success">Thêm mới</button></a>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
