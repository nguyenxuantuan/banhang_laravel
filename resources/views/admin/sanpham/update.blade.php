@extends('admin.layouts.app')
@section('content')

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Sửa </strong> Sản phẩm
            </div>
            <div class="card-body card-block">
              <form action="{{route('sanphams.update',$sp->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                {{-- tên sản phẩm --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Sản phẩm</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="tensp" class="form-control" value="{{$sp->name}}"></div>
                </div>
                  {{-- hết tên sản phẩm --}}

                {{-- loại sản phẩm --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Loai san pham</label></div>
                  <div class="col-12 col-md-9">
                    <select class="form-control" name="loaisanpham">

                        @foreach ($loaisp as $lsp)
                        <option value="{{$lsp->id}}">{{$lsp->name}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                  {{-- hết loại sản phẩm --}}

                {{-- Mô tả --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô Tả</label></div>
                  <div class="col-12 col-md-9"><textarea name="mota"  cols="84" rows="7" value="{{$sp->description}}"></textarea></div>
                </div>
                  {{-- hết mô tả --}}

                {{-- Đơn giá --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn giá</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="dongia"  class="form-control" value="{{$sp->unit_price}}"></div>
                </div>
                  {{-- hết đơn giá --}}

                {{-- giá khuyến mãi --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá Khuyến mãi</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="giakm"  class="form-control" value="{{$sp->promotion_price}}"></div>
                </div>
                  {{-- hết giá khuyến mãi --}}

                {{-- hình ảnh --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                  <div class="col-12 col-md-9"><input type="file" id="file-input" name="anh" class="form-control-file" value="">{{$sp->image}}</div>
                </div>
                  {{-- hết hình ảnh --}}

                {{-- đơn vị --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn vị</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="donvi" class="form-control" value="{{$sp->unit}}"></div>
                </div>
                  {{-- hết đơn vị --}}

                {{-- Mới --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mới</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="moi" class="form-control" value="{{$sp->new}}"> </div>
                </div>
                  {{-- hết mới --}}

                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Chỉnh sửa
                </button>
              </form>
            </div>

          </div>

        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#test").click(function(event) {
            /* Act on the event */
            console.log("fda");
        });
    });
</script>
@endsection
