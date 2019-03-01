@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Thong tin khach hang</strong>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">STT</th>
                          <th scope="col">Tên</th>
                          <th scope="col">gioi tinh</th>
                          <th scope="col">email</th>
                          <th scope="col">dia chi</th>
                          <th scope="col">SDT</th>
                          <th scope="col">ghi chu</th>
                          <th scope="col">sua</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($khachhang as $kh)
                          <tr>
                            <td>{{$kh->id}}</td>
                            <td>{{$kh->name}}</td>
                            <td>{{$kh->gender}}</td>
                            <td>{{$kh->email}}</td>
                            <td>{{$kh->address}}</td>
                            <td>{{$kh->phone_number}}</td>
                            <td>{{$kh->note}}</td>
                            <td>
                              <a href="#"><button class="btn btn-warning">Sửa</button></a>
                            </td>
                            <td>
                              <form  style="display:inline;" action="{{route('chitietkhs.delete',$kh->id)}}" method="post">
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
                  <a href="{{route('chitietkhs.create')}}"><button class="btn btn-success">Thêm mới</button></a>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
