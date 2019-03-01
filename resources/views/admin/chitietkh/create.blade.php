@extends('admin.layouts.app')
@section('content')

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Thêm mới</strong> Thong tin khach hang
            </div>
            <div class="card-body card-block">
              <form action="{{route('chitietkhs.insert')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                      @foreach ($errors->all() as $err)
                        * {{$err}} <br>
                      @endforeach
                    </div>
                  @endif
                </div>
                {{-- tên tài khoản--}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Khach hang</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Tên tài khoản" class="form-control"></div>
                </div>
                {{-- hết tên tài khoản --}}
                {{-- Gioi tinh--}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gioi tinh</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="gioitinh" placeholder="nhap gioi tinh" class="form-control"></div>
                </div>
                {{-- hết gioi tinh --}}
                {{-- email --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="email" placeholder="example@gmail.com" class="form-control"></div>
                </div>
                {{-- hết email --}}
                {{-- Dia chi --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Dia chi</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="diachi" placeholder="Mời nhập dia chi" class="form-control"></div>
                </div>
                {{-- hết dia chi --}}
                {{-- SDT --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">SDT</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="SDT" placeholder="Mời nhập SDT" class="form-control"></div>
                </div>
                {{-- hết SDT --}}
                {{-- Ghi chu --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ghi chu</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="ghichu" placeholder="Ghi chu" class="form-control"></div>
                </div>
                {{-- hết ghi chu --}}
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Thêm mới thong tin khach hang
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
