<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Inventory</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div id="app" class="wrapper">
    <!-- Navbar -->
    <nav  v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true "  class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">User</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <router-link to="/logout" class="dropdown-item">
                        <i class="fas fa-sign-out mr-2"></i> Logout
                    </router-link>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside  v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/forget' ? false : true " class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="#" alt="Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="#" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">RS</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <router-link to="/home" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Dashboard</p>
                        </router-link>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><p>Employee</p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/store-employee" class="nav-link"><p>Add Employee</p></router-link>
                                <router-link to="/employee" class="nav-link"><p>All Employee</p></router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><p>Supplier</p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/store-supplier" class="nav-link"><p>Add Supplier</p></router-link>
                                <router-link to="/supplier" class="nav-link"><p>All Supplier</p></router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><p>Customer</p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/store-customer" class="nav-link"><p>Add Customer</p></router-link>
                                <router-link to="/customer" class="nav-link"><p>All Customer</p></router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><p>Category</p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/store-category" class="nav-link"><p>Add Category</p></router-link>
                                <router-link to="/category" class="nav-link"><p>All Category</p></router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link"><p>Product</p></a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/store-product" class="nav-link"><p>Add Product</p></router-link>
                                <router-link to="/product" class="nav-link"><p>All Product</p></router-link>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div  class="content-wrapper">
        <div class="content">
            <div class="container-fluid mt-3" >
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>
<!-- ./wrapper -->
<script src="{{asset('js/app.js')}}" defer></script>
</body>
</html>



