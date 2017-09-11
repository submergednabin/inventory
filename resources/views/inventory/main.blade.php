<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
    @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->

    {{ Html::style('bootstrap/css/bootstrap.min.css') }}

            <!-- Font Awesome -->

    {{ Html::style('font-awesome/font-awesome.min.css') }}

            <!-- Ionicons -->

    {{ Html::style('font-awesome/ionicons.min.css') }}


    {{ Html::style('plugins/datepicker/datepicker3.css') }}

    {{ Html::style('plugins/daterangepicker/daterangepicker-bs3.css') }}



    {{ Html::style('fonts/font/flaticon.css') }}

            <!-- Select2 -->

    {{ Html::style('plugins/select2/select2.min.css') }}

    {{ Html::style('choosen/css/chosen.min.css') }}

            <!-- Theme style -->

    {{ Html::style('dist/css/AdminLTE.min.css') }}

            <!-- AdminLTE Skins. We have chosen the skin-blue for this starter

          page. However, you can choose any other skin. Make sure you

          apply the skin class to the body tag so the changes take effect.

    -->

    {{ Html::style('dist/css/skins/skin-blue.min.css') }}


    {{ Html::style('plugins/iCheck/all.css') }}
    {{ Html::style('dist/css/sweetalert.css') }}

            <!-- DataTables -->


    {{ Html::style('plugins/datatables/dataTables.bootstrap.css') }}


    {!!  Html::style('css/global.css') !!}
    {{ Html::style('css/radiobutton.css') }}

    {{ Html::style('css/gallery.css') }}


    {{ Html::style('plugins/timepicker/bootstrap-timepicker.css') }}



    {{--{!! Html::script("http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js") !!}--}}


            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->


    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9] -->

    {{ Html::script('js/html5shiv.min.js') }}

    {{ Html::script('js/respond.min.js') }}

    {{ Html::script('plugins/jQuery/jQuery-2.1.4.min.js') }}

{{ Html::script('chart/highcharts.js') }}
    {{ Html::script('chart/exporting.js') }}


</head>


<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

    {{----}}

    {{----}}


    <!-- Main Header -->

    <header class="main-header">


        <!-- Logo -->

        <a href="{{ url('admin/dashboard') }}" class="logo">

            <!-- mini logo for sidebar mini 50x50 pixels -->

            <span class="logo-mini">LT</span>

            <!-- logo for regular state and mobile devices -->

            <span class="logo-lg">

                {{ Html::image('images/logo.png', '') }}

            </span>

        </a>


        <!-- Header Navbar -->

        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Sidebar toggle button-->

            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

                <span class="sr-only">Toggle navigation</span>

            </a>

            <!-- Navbar Right Menu -->

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">



            @if(Auth::user())

                    <!-- User Account Menu -->

                    <li class="dropdown user user-menu">

                        <!-- Menu Toggle Button -->

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <!-- The user image in the navbar-->


                         
                             {{ Auth::user()->fullname }}





                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->

                            <!-- {{--<span class="hidden-xs"> {{ Auth::user()->first_name }}</span>--}} -->

                        </a>

                        <ul class="dropdown-menu">

                            <!-- The user image in the menu -->

                            <li class="user-header">


                                {{ Html::image('dist/img/avatar5.png', 'User Image', ['class'=>'img-circle']) }}

                                <p>

                                    {{ Auth::user()->fullname }}


                                </p>



                            </li>


                                        <!-- Menu Body -->



                                <!-- Menu Footer-->

                                <li class="user-footer">

                                    <div class="pull-left">

                                        <a href="{{ url('admin/profile') }}" class="btn btn-default">Profile</a>

                                    </div>

                                    <div class="pull-right">

                                        <a href="{{ url('admin/logout') }}" class="btn btn-warning">Sign out</a>

                                    </div>

                                </li>

                        </ul>

                    </li>

                    <!-- Control Sidebar Toggle Button -->

                    {{--<li>--}}

                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}

                    {{--</li>--}}

                </ul>
                @endif

            </div>

        </nav>

    </header>

    <!-- Left side column. contains the logo and sidebar -->

    <aside class="main-sidebar">


        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">


            <!-- Sidebar Menu -->

            <ul class="sidebar-menu nav" id="side-menu">


                <!-- Optionally, you can add icons to the links -->


                @if(Auth::user())


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>User</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/user/create') }}">Add New</a></li>
                            <li><a href="{{ url('admin/user') }}">All User</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-sliders"></i>
                            <span>Vendor</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/vendor/create') }}">Add New</a></li>
                            <li><a href="{{ url('admin/vendor') }}">All Vendors</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="flaticon-interface"></i>
                            <span>Product Categories</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/product-category/create') }}">Add New</a></li>
                            <li><a href="{{ url('admin/product-category') }}">All Categories</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Unit</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/unit/create') }}">Add New</a></li>
                            <li><a href="{{ url('admin/unit') }}">All Unit</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Product</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/product/create') }}">Add New</a></li>
                            <li><a href="{{ url('admin/product') }}">All product</a></li>
                        </ul>
                    </li>
                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Order</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <?php
                            $order = \App\Models\Order::all();
                            $count = count($order);
                            $pendingOrder = \App\Models\Order::where('order_status',1)->get();
                            $completedOrder = \App\Models\Order::where('order_status',2)->get();
                            $cancelledOrder = \App\Models\Order::where('order_status',3)->get();
                        ?>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('admin/order/create') }}">Add New</a></li>
                            <li><a href="{{ url('admin/order') }}">All Orders 
                            @if($count>0)
                            <span class="count">
                            {{$count}}
                            </span>
                            @endif
                            </a></li>
                            <li><a href="{{ url('admin/order/pending-order') }}">Pending Orders 
                            @if(count($pendingOrder)>0)
                            <span class="count">
                            {{count($pendingOrder)}}
                            </span>
                            @endif
                            </a></li>
                            <li><a href="{{ url('admin/order/completed-order') }}">Completed Orders 
                            @if(count($completedOrder)>0)
                            <span class="count">
                            {{count($completedOrder)}}
                            </span>
                            @endif
                            </a></li>
                            <li><a href="{{ url('admin/order/cancel-order') }}">Cancelled Orders 
                            @if(count($cancelledOrder)>0)
                            <span class="count">
                            {{count($cancelledOrder)}}
                            </span>
                            @endif
                            </a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        @yield('content')


    </div>
    <!-- /.content-wrapper -->
    @include('inventory.partials.popUpModal')
   

    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->


<script type="text/javascript">

    var APP_URL = {!! json_encode(url('/')) !!};

</script>


        <!-- jQuery 2.1.4 -->



<![endif]-->


{{--<!-- Bootstrap 3.3.5 -->--}}
{{--{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.js') }}--}}




{{ Html::script('bootstrap/js/bootstrap.min.js') }}


{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>--}}

{{ Html::script('plugins/datepicker/bootstrap-datepicker.js') }}

{{ Html::script('plugins/daterangepicker/daterangepicker.js') }}

{{ Html::script('dist/js/sweetalert.min.js') }}


{!! Html::script('plugins/iCheck/icheck.min.js') !!}

{{ Html::script('plugins/select2/select2.full.min.js') }}

{{ Html::script('choosen/js/chosen.jquery.min.js') }}
{{----}}
        <!-- DataTables -->

{{ Html::script('plugins/datatables/jquery.dataTables.min.js') }}

{{ Html::script('plugins/datatables/dataTables.bootstrap.min.js') }}

{{ Html::script('dist/js/app.min.js') }}
{{ Html::script('plugins/ckeditor/ckeditor.js') }}

{{ Html::script('js/inventory.js') }}

{{ Html::script('js/location.js') }}



{{ Html::script('plugins/timepicker/bootstrap-timepicker.min.js') }}
{{ Html::script('js/map.js') }}

<script>
    $(function () {
        $(".select2").select2();
    });
</script>

<script>

    $(document).ready(function () {

        $('#date-range').daterangepicker();

    });


</script>

<script>

    $(function () {

        var url = window.location;

        var element = $('ul.sidebar-menu a').filter(function () {

            return this.href == url || url.href.indexOf(this.href) == 0;

        }).addClass('active').parent().parent().addClass('in').parent();

        if (element.is('li')) {

            element.addClass('active');

        }
    });

</script>



</script>
</body>

</html>












