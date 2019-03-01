@extends('admin.layouts.app')
@section('content')
<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <strong class="card-title pull-left">Tất cả sản phẩm</strong>
                  <div class="search-container pull-right">
                    <form action="{{route('sanphams.timkiem')}}" method="post" >
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
                          <th scope="col">Loại</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Giá</th>
                          <th scope="col">Giá Khuyến mãi</th>
                          <th scope="col">ảnh</th>
                          <th scope="col">Dơn vị tính</th>
                          <th scope="col">Mới</th>
                          <th scope="col">Sửa</th>
                          <th scope="col">Xóa</th>
                          <th>Xoa Ajax</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sanpham as $sp)
                        @php
                        $cate = App\ProductType::where('id',$sp->id_type)->first();
                        @endphp
                        <tr id="product_{{$sp->id}}">
                            <td>{{$sp->id}}</td>
                            <td>{{$sp->name}}</td>
                            @if($cate)
                            <td>{{$cate->name}}</td>
                            @else
                            <td></td>
                            @endif
                            <td>{{$sp->Description}}</td>
                            <td >{{$sp->unit_price}}</td>
                            <td >{{$sp->promotion_price}}</td>
                            <td >
                              <img src="/source/image/product/{{$sp->image}}" width="100px" >
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
                          <td><a href="" class="delete_ajax" data-id="{{$sp->id}}"><button class="btn btn-danger">Delete Ajax</button></a></td>
                          </tr>
                       @endforeach
                      </tbody>
                    </table>
                  {{-- <a href="{{route('admin.logout')}}">logout</a> --}}
                  {{$sanpham->links()}}
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
<script type="text/javascript">
  $(document).ready(function() {
    $(".delete_ajax").click(function (e) {
      e.preventDefault();
      var id_product = $(this).data('id');
      if (confirm('Are you sure you want to delete this?'))
      {
        $.ajax({
          type: "POST",
          url: "{{route('delete_ajax')}}",
          data: {id_product:id_product},
          dataType: "JSON",
          success: function (response)
            {
            // console.log(response);
              $("#product_"+response).fadeOut(500);
            }
          });
        }
      });
  });

</script>
@endsection
