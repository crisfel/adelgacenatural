<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adelgace Naturalmente</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://app.adelgacenatural.com/img/favicon.png" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/css/style.min.css">
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/a53ddba772.js" crossorigin="anonymous"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"/>
    <!--Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Magnific popup-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css">
    <!--JQuery-->
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <!--Highcharts-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!--Calendar-->
    <link rel="stylesheet" href="/css/rome.css">
    <link rel="stylesheet" href="/css/style-calendar.css">




    <!--Datatables-->
    <style>
        .dataTables_filter {
            float: right;
            width: 60%;
            margin-right: 5%;
            margin-bottom: 5%;
            margin-left: 5%;
            margin-top: 1%;
            /*border: 1px solid black;*/
        }
        .dataTables_length {
            float: left;
            width: 20%;
            margin-left: 5%;
            margin-bottom: 5%;
            margin-top: 1%;
            /*border: 1px solid black;*/
        }

        .dataTables_info {
            margin: 1%;
        }
        .dataTables_paginate {
            margin: 1%;
        }
    </style>
</head>

<body>
<div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="/" class="logo-wrapper" title="Home">
                    <span class="sr-only">Home</span>
                    <img src="https://app.adelgacenatural.com/img/logo-web4.png">

                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    @hasrole('administrator')
                    <!--<li>
                        <a class="active" href="/"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                    </li>-->
                    <li>
                        <a style="color:white !important; opacity:1 !important;" class="show-cat-btn text-white text-opacity-100" href="##">
                            <span class="icon user-3" aria-hidden="true"></span>Administradores
                            <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a style="color:white !important; opacity:1 !important;" href="{{route('users.index', ['id' => 'administrator'])}}">Ver administradores</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a style="color:white !important; opacity:1 !important;" class="show-cat-btn text-white text-opacity-100" href="##">
                            <span class="icon user-3" aria-hidden="true"></span>Terapeutas
                            <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a style="color:white !important; opacity:1 !important;" href="{{route('users.index', ['id' => 'therapist'])}}">Ver terapeutas</a>
                            </li>
                        </ul>
                    </li>
                    @endhasrole
                    @hasanyrole('administrator|therapist')
                    <li>
                        <a style="color:white !important; opacity:1 !important;" class="show-cat-btn text-white text-opacity-100" href="##">
                            <span class="icon user-3" aria-hidden="true"></span>Pacientes
                            <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a style="color:white !important; opacity:1 !important;" href="{{route('users.index', ['id' => 'patient'])}}">Ver pacientes</a>
                            </li>
                        </ul>
                    </li>
                    @endhasanyrole
                    <li>
                        <a style="color:white !important; opacity:1 !important;" class="show-cat-btn text-white text-opacity-100" href="##">
                            <span class="icon folder" aria-hidden="true"></span>Tratamientos
                            <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a style="color:white !important; opacity:1 !important;" href="{{route('treatments.index')}}">
                                    @hasanyrole('administrator|therapist')
                                        Ver tratamientos
                                    @endhasanyrole
                                    @hasrole('patient')
                                        Mis tratamientos
                                    @endhasrole
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a style="color:white !important; opacity:1 !important;" class="show-cat-btn text-white text-opacity-100" href="##">
                            <span class="icon edit" aria-hidden="true"></span>Citas
                            <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a style="color:white !important; opacity:1 !important;" href="{{route('appointments.index')}}">
                                    @hasanyrole('administrator|therapist')
                                        Ver citas
                                    @endhasanyrole
                                    @hasrole('patient')
                                        Mis citas
                                    @endhasrole
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
        </div>
    </aside>
    <div class="main-wrapper">
        <!-- ! Main nav -->
        <nav class="main-nav--bg">
            <div class="container main-nav">
                <div class="main-nav-start">

                </div>
                <div class="main-nav-end">
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                    </button>
                    </button>
                    <div class="notification-wrapper">
                        <ul class="users-item-dropdown notification-dropdown dropdown">
                            <li>
                                <a href="##">
                                    <div class="notification-dropdown-icon info">
                                        <i data-feather="check"></i>
                                    </div>
                                    <div class="notification-dropdown-text">
                                        <span class="notification-dropdown__title">System just updated</span>
                                        <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                  here.</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="notification-dropdown-icon danger">
                                        <i data-feather="info" aria-hidden="true"></i>
                                    </div>
                                    <div class="notification-dropdown-text">
                                        <span class="notification-dropdown__title">The cache is full!</span>
                                        <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                  interfere ...</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="notification-dropdown-icon info">
                                        <i data-feather="check" aria-hidden="true"></i>
                                    </div>
                                    <div class="notification-dropdown-text">
                                        <span class="notification-dropdown__title">New Subscriber here!</span>
                                        <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="link-to-page" href="##">Go to Notifications page</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-user-wrapper">
                        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                            <span class="sr-only">My profile</span>
                            <span class="nav-user-img">
            <picture>
                <img class="rounded-2" width="100px" src="https://adelgacenatural.com{{Auth::user()->url_img}}"
                     onError="this.onerror=null;this.src='https://app.adelgacenatural.com/img/without-photo.png';">
            </picture>
          </span>
                        </button>
                        <ul class="users-item-dropdown nav-user-dropdown dropdown">
                            <li>
                                <a class="danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out" aria-hidden="true"></i>
                                    <span>Cerrar sesión</span>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- ! Main -->
        <main class="main users chart-page" id="skip-target">
            <div class="container">
                @yield('content')
            </div>
        </main>
        <!-- ! Footer -->
        <footer class="footer">
            <div class="container footer--flex">
            </div>
        </footer>
    </div>
</div>

<!-- Chart library -->
<script src="/plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="/plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="/js/script.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>


<!--Datatables-->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#my_table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "=>",
                    "previous": "<="
                }
            },
            "aaSorting": [],
            "bDestroy": true,
            responsive: true,
            "pageLength": 20,
            searching: true,
        });
    } );
</script>
<!--Magnific popup-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.js"></script>
<script type="text/javascript">
    $('.image-link').magnificPopup({type:'image'});
</script>

<!--Calendar-->
<script src="/js/popper.min.js"></script>
<script src="/js/rome.js"></script>
<script src="/js/main.js"></script>

</body>

</html>
