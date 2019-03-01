@extends('admin.layouts.app')
@section('content')

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Thêm mới</strong> Danh mục sản phẩm
            </div>
            <div class="card-body card-block">
              <form action="{{route('loaisanphams.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @if(count($errors)>0)
                <div class="alert alert-danger">
                  @foreach ($errors->all() as $err)
                      *{{$err}} <br>
                  @endforeach
                </div>
                @endif
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Loại sản phẩm</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="tenlsp" placeholder="Tên Loại sản phẩm" class="form-control"></div>
                </div>

                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô Tả</label></div>
                  <div class="col-12 col-md-9"><textarea name="mota" id="" cols="84" rows="7" placeholder="Mô tả loại sản phẩm" ></textarea></div>

                </div>

                <div class="row form-group">
                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                  <div class="col-12 col-md-9"><input type="file" id="file-input" name="anh" class="form-control-file"></div>
                </div>
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
