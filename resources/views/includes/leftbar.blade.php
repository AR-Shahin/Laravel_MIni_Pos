<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($main_menu == 'Dashboard') active @endif" href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($main_menu == 'Users') active @endif" href="#" data-toggle="collapse" aria-expanded="false" data-target="#users" aria-controls="users"><i class="fa fa-fw fa-users"></i>Users</a>
                        <div id="users" class="collapse submenu @if($main_menu == 'Users') show @endif" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Groups') active @endif" href="{{ url('user.groups') }}">Groups</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Users') active @endif" href="{{ url('users') }}">Users</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($main_menu == 'Products') active @endif" href="#" data-toggle="collapse" aria-expanded="false" data-target="#Products" aria-controls="submenu-2"><i class="fa fa-fw fa-bars"></i>Products</a>
                        <div id="Products" class="collapse submenu @if($main_menu == 'Products') show @endif" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Category') active @endif" href="{{ route('category.index') }}">Category <span class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Product') active @endif" href="{{ route('product.index') }}">Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Stock') active @endif" href="{{ route('stock') }}">Stock</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($main_menu == 'Reports') active @endif" href="#" data-toggle="collapse" aria-expanded="false" data-target="#Reports" aria-controls="submenu-2"><i class="fa fa-fw fa-chart-bar"></i>Reports</a>
                        <div id="Reports" class="collapse submenu @if($main_menu == 'Reports') show @endif" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Sales') active @endif" href="{{ route('reports.sales') }}">Sales <span class="badge badge-secondary"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Purchases') active @endif" href="{{ route('reports.purchases') }}">Purchases</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Payments') active @endif" href="{{ route('reports.payments') }}">Payments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if($sub_menu == 'Receipts') active @endif" href="{{ route('reports.receipts') }}">Receipts</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
