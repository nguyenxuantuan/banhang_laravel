@extends('admin.layouts.app')
@section('content')

<div class="content mt-3">
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <strong>Thêm mới</strong> Admin
            </div>
            <div class="card-body card-block">
              <form action="{{route('admins.insert')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                  {{-- {{dd($errors)}} --}}
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                      @foreach ($errors->all() as $err)
                        * {{$err}} <br>
                      @endforeach
                    </div>
                  @endif
                </div>
                @if(Session::has('thanhcong'))
                  <div class="alert alert-success">
                    {{Session::get('thanhcong')}}
                  </div>
                  <div><a href="{{route('admins.index')}}"><button>danh muc admin</button></a></div>
                @else
                {{-- tên tài khoản--}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên tài khoản</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Tên tài khoản" class="form-control"></div>
                </div>
                {{-- hết tên tài khoản --}}
                {{-- email --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="email" placeholder="example@gmail.com" class="form-control"></div>
                </div>
                {{-- hết email --}}
                {{-- password --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                  <div class="col-12 col-md-9"><input type="password" id="text-input" name="password" placeholder="Mời nhập password" class="form-control"></div>
                </div>
                {{-- hết password --}}
                {{-- confirm password --}}
                <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Confirm Password</label></div>
                  <div class="col-12 col-md-9"><input type="password" id="text-input" name="password_confirm" placeholder="Mời nhập lại password" class="form-control"></div>
                </div>
                {{-- hết password --}}
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Thêm mới admin
                </button>
              </form>
              @endif
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
