@extends('admin.layouts.app')
@section('content')

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Thêm mới</strong> Sản phẩm
            </div>
            <div class="card-body card-block">
            <form action="{{route('sanphams.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
              {{-- validate --}}
                @if(count($errors)>0)
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                      *{{$err}} <br>
                    @endforeach
                  </div>
                @endif
                {{-- validate --}}
                {{-- tên sản phẩm --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Sản phẩm</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="tensp" placeholder="Tên sản phẩm" class="form-control"></div>
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
                  <div class="col-12 col-md-9"><textarea name="mota" id="" cols="84" rows="7" placeholder="Mô tả loại sản phẩm" ></textarea></div>
                </div>
                  {{-- hết mô tả --}}

                {{-- Đơn giá --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn giá</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="dongia" placeholder="Nhập vào giá sản phẩm" class="form-control"></div>
                </div>
                  {{-- hết đơn giá --}}

                {{-- giá khuyến mãi --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá Khuyến mãi</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="giakm" placeholder="Nhập vào giá khuyển mãi của sản phẩm (nếu có)" class="form-control"></div>
                </div>
                  {{-- hết giá khuyến mãi --}}

                {{-- hình ảnh --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                  <div class="col-12 col-md-9"><input type="file" id="file-input" name="anh" class="form-control-file"></div>
                </div>
                  {{-- hết hình ảnh --}}

                {{-- đơn vị --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn vị</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="donvi" placeholder="Nhập vào đơn vị" class="form-control"></div>
                </div>
                  {{-- hết đơn vị --}}

                {{-- Mới --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mới</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="moi" placeholder="Sản phẩm mới nhập - 1 ngược lại nhập 0" class="form-control"></div>
                </div>
                  {{-- hết mới --}}

                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Thêm mới
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
