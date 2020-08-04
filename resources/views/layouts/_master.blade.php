<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Web System - PONOROGOWEB">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"> <p style="font-size: 30px;"> Web System </p></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('style/images/logo2.png') }}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/dashboard"> <i class="menu-icon fa fa-dashboard"></i>DASHBOARD </a>
                    </li>
                    <li>
                        <a href="/list-website/data"> <i class="menu-icon fa fa-globe"></i> WEBSITE </a>
                    </li>
                    <li>
                        <a href="/jenis-website/data"> <i class="menu-icon fa fa-globe"></i> JENIS WEBSITE </a>
                    </li>
                    <li>
                        <a href="/pelanggan/data"> <i class="menu-icon fa fa-users"></i> PELANGGAN </a>
                    </li>


                    

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <p>Hari/Tanggal : {{ date('D, d F Y') }}</p>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        {{ Auth::user()->name }} 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            
                            <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->

    @yield('breadcrumbs')

    @yield('content')

</div><!-- /#right-panel -->


<script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('style/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugins.js') }}"></script>
<script src="{{ asset('style/assets/js/main.js') }}"></script>

<script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('.table-data').DataTable();
  });
</script>

</body>
</html>



