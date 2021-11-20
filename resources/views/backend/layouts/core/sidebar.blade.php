<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="" alt="" width="100%">
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://banner2.cleanpng.com/20180616/evo/kisspng-computer-icons-circled-icon-human-5b24fcf17d0085.362600701529150705512.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ (\Illuminate\Support\Facades\Auth::user()->name) }}</a>
                        </div>
        </div>

        <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column show" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li> --}}
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <img src="https://cdn4.vectorstock.com/i/1000x1000/83/33/teamwork-management-icon-or-business-team-vector-30688333.jpg" alt="" width="30px" height="30px">
                        {{-- <i class="nav-icon fas fa-copy"></i> --}}
                        <p>
                            Quản lý người dùng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link">
                                <i class="fas fa-id-badge"></i>
                                <p>Danh sach người dùng</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <img src="https://img.pngio.com/vector-fast-food-packa-16024-png-images-pngio-food-png-vector-260_260.png" alt="" width="30px" height="30px">
                        {{-- <i class="nav-icon fas fa-chart-pie"></i> --}}
                        <p>
                            Quản lý đồ ăn
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('foods.list')}}" class="nav-link">
                                <i class="fas fa-hamburger"></i>
                                <p>Danh sách đồ ăn</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('categories.list')}}" class="nav-link">
                                <i class="fas fa-hamburger"></i>
                                <p>Danh sách thể loại đồ ăn</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
