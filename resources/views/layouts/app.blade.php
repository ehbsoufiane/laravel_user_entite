<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    {{--
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="{{ asset('css/Material-Icons.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper" id="app">
        <div class="sidebar" data-active-color="red" data-background-color="white">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="/users" class="simple-text logo-mini">
                    EU
                </a>
                <a href="/users" class="simple-text logo-normal">
                    Entité Users
                </a>
            </div>

            <div class="sidebar-wrapper">
                {{--
                <div class="user">
                    <div class="photo">
                        <img src="http://localhost:8000/storage/images/Qkt91viUj6xmJ64Q04S4m3Rjejt0VPIEq8KTe7MO.jpeg" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                USER NAME
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> MP </span>
                                        <span class="sidebar-normal"> My Profile </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> EP </span>
                                        <span class="sidebar-normal"> Edit Profile </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> S </span>
                                        <span class="sidebar-normal"> Settings </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <ul class="nav">
                    {{--
                    <li>
                        <a href="/restaurant/index">
                            <i class="material-icons">dashboard</i>
                            <p> Blog </p>
                        </a>
                    </li> --}}
                    <li>
                        <a data-toggle="collapse" href="#pagesEntites">
                            <i class="material-icons">bookmark</i>
                            <p> Entités
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesEntites">
                            <ul class="nav">
                                <li>
                                    <a href="{{ url('entites/create') }}">
                                        <span class="sidebar-mini"> AE </span>
                                        <span class="sidebar-normal"> Ajouter une Entité </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('entites') }}">
                                        <span class="sidebar-mini"> LE </span>
                                        <span class="sidebar-normal"> List Entités</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesUsers">
                            <i class="material-icons">person</i>
                            <p> Utilisateurs
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pagesUsers">
                            <ul class="nav">
                                <li>
                                    <a href="{{ url('users/create') }}">
                                        <span class="sidebar-mini"> AU </span>
                                        <span class="sidebar-normal"> Ajouter un Utilisateur </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('users') }}">
                                        <span class="sidebar-mini"> LU </span>
                                        <span class="sidebar-normal"> List Utilisateurs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>





                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="{{ url('entites') }}" class="dropdown-toggle">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">Deconnection</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <!-- <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder=" Search ">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form> -->
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">

                    @if(Session::has('success'))
                        <div class="alert alert-success" rol="alert">
                            <strong>Success: </strong> {{ Session::get('success') }}
                        </div>
                    @endif    
                    @if(Session::has('error'))
                        <div class="alert alert-warning" rol="alert">
                            <strong>Failed: </strong> {{ Session::get('error') }}
                        </div>
                    @endif 
                    
                    @if(count($errors) > 0)
                    <div class="alert alert-danger" rol="alert">
                        <strong>Errors: </strong>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif 
                    
                    @yield('content')
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portofolio
                                    </a>
                                </li>

                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="mailto:ehbissesoufian@gmail.com"> E. SOUFIANE</a>, made for a better web
                        </p>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    {{--
    <script src="{{ asset('js/app.js') }}"></script> --}}
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    {{--  <script src="{{ asset('js/ajax_libs_core-js_2.4.1_core.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/arrive.min.js') }}" type="text/javascript"></script>  --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    {{--  <script src="{{ asset('js/moment.min.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/chartist.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap-wizard.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/jquery.sharrre.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/jquery-jvectormap.js') }}"></script>  --}}
    {{--  <script src="{{ asset('js/nouislider.min.js') }}"></script>  --}}
    <script src="{{ asset('js/jquery.select-bootstrap.js') }}"></script>
    {{--  <script src="{{ asset('js/jquery.datatables.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/fullcalendar.min.js') }}"></script>  --}}
    <script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.js') }}"></script>

    <script type="text/javascript">
        function setFormValidation(id) {
            $(id).validate({
                errorPlacement: function(error, element) {
                    $(element).closest('div').addClass('has-error');
                }
            });
        }
    
        $(document).ready(function() {
            setFormValidation('#FormValidation');
        });
    </script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    {{--  <script src="{{ asset('js/demo.js') }}"></script>  --}}
</body>

</html>