 <!-- Left Panel -->
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('admin.home.index')}}"><img src="/assets/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{route('admin.home.index')}}"><img src="/assets/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- Admin -->
                    <li class="active menu-item-has-children dropdown">
                        <a href="{{route('admin.home.index')}}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-dashboard"></i>ADMIN</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="{{route('admins.index')}}">Danh mục admin</a>
                            </li>
                            <li>
                                <a href="{{route('admin.logout')}}">Đăng Xuất</a>
                            </li>
                        </ul>
                    </li>
                    <!-- hết Admin-->

                    <h3 class="menu-title">Quản Lý ADMIN</h3>

                    {{-- Danh mục sản phẩm --}}
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Danh mục sản phẩm</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <a href="{{route('loaisanphams.index')}}">Loại Sản Phẩm</a>
                            </li>
                            <li>
                                <a href="{{route('sanphams.index')}}">tất cả sản Phẩm</a>
                            </li>
                        </ul>
                    </li>
                    {{-- hết danh mục sản phẩm --}}

                    {{-- Danh mục đơn hàng --}}
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Danh mục đơn hàng</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-puzzle-piece"></i><a href="{{route('donhangs.index')}}">Danh sách đơn hàng</a>
                            </li>

                        </ul>
                    </li>
                    {{-- hết Danh mục đơn hàng --}}

                    {{-- danh mục khách hàng --}}
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Danh mục khách hàng</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-address-book-o"></i><a href="{{route('khachhangs.index')}}">Danh sách tài khoản khách hàng</a>
                            </li>
                            <li>
                                <i class="fa fa-id-badge"></i><a href="{{route('chitietkhs.index')}}">Thông tin khách hàng </a>
                            </li>
                        </ul>
                    </li>
                    {{-- hết danh mục khách hàng --}}

                    {{--  danh mục khách hàng--}}
                    <li class="menu-item-has-children dropdown">
                        <a  class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Danh mục khách hàng</a>
                        <ul class="sub-menu children dropdown-menu">
                            {{-- <li>
                                <i class="fa fa-vcard-o"></i><a href="{{route('khachhangs.index')}}">Danh sách tài khoản khách hàng</a>
                            </li> --}}
                            <li>
                                <i class="fa fa-id-badge"></i><a href="{{route('chitietkhs.index')}}">Thông tin khách hàng</a>
                            </li>
                        </ul>
                    </li>
                    {{-- hết danh mục khách hàng --}}

                    {{-- Thống kê báo cáo --}}
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>thống kê báo cáo</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="fa fa-puzzle-piece"></i><a href="#">thống kê</a>
                            </li>
                            <li>
                                <i class="fa fa-id-badge"></i><a href="#">báo cáo </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Thống kê báo cáo --}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
<!-- /#left-panel -->
