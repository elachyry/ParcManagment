<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', '') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assets/auth/img/dakhla-region.png" rel="icon">
    <link href="/assets/auth/img/dakhla-region.png" rel="dakhla-region">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/auth/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/auth/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/auth/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/auth/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/assets/auth/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/assets/auth/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/auth/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/tailwind.output.css" />
    <link href="/css/show.css" rel="stylesheet" />
    <script src="/js/init-alpine.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Template Main CSS File -->
    <link href="/assets/auth/css/style.css" rel="stylesheet">




</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{route('home')}}" class="logo d-flex align-items-center">
                <img src="/assets/auth/img/dakhla-region.png" alt="">
                <span class="d-none d-lg-block">Gestion Parc</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div> -->
        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <!-- <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li> -->
                <!-- End Search Icon-->

                <!-- <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a> -->
                    <!-- End Notification Icon -->

                    <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>

                    </ul> -->
                    <!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a> -->
                    <!-- End Messages Icon -->

                    <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="/assets/auth/img/messages-1.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="/assets/auth/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="/assets/auth/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li> -->

                    <!-- </ul> -->
                    <!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="/assets/auth/img/profile-img.png" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>Responsable du Département</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('profile.show')}}">
                                <i class="bi bi-person"></i>
                                <span>Mon Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center"><svg id="icon-logout"
                                        xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18"
                                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg><span class="ml-2"> Se déconnecter </span></button>
                            </form>


                            <!--<a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>-->
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- 
      <li class="nav-item"> -->
            <!-- <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a> -->
            <li class="nav-item">
                <a class="nav-link collapsed " style=" {{Request::is('dashboard') ? 'background: #f6f9ff;' : ''}}"
                    href="{{route('dashboard')}}">
                    <i class="bi bi-grid" style="{{Request::is('dashboard') ? 'color: #4154f1;' : ''}}"></i>
                    <span class="{{Request::is('dashboard')? 'active-nav' : ''}}">Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed "
                    style=" {{Request::is('car') || Request::is('car/create') || Request::is('car/trash') ? 'background: #f6f9ff;' : ''}}"
                    data-bs-target="#cars-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-truck"
                        style="{{Request::is('car') || Request::is('car/create') || Request::is('car/trash') ? 'color: #4154f1;' : ''}}"></i>
                    <span
                        class="{{Request::is('car') || Request::is('car/create') || Request::is('car/trash') ? 'active-nav' : ''}}">Véhicules</span>
                    <i class="bi bi-chevron-down ms-auto"
                        style="{{Request::is('car') || Request::is('car/create') || Request::is('car/trash') ? 'color: #4154f1; transform: rotate(180deg);' : ''}}"></i>
                </a>
                <ul id="cars-nav"
                    class="nav-content collapse {{Request::is('car') || Request::is('car/create') || Request::is('car/trash') ? 'show' : ''}}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('car.index')}}">
                            <i class="bi bi-circle" style="{{Request::is('car') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('car') ? 'active-nav' : ''}}">Tout les Véhicules</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('car.create')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('car/create') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('car/create') ? 'active-nav' : ''}}">Ajouter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('car.trash')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('car/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('car/trash') ? 'active-nav' : ''}}">supprimé</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style=" {{Request::is('employee') || Request::is('employee/create') || Request::is('employee/trash') ? 'background: #f6f9ff;' : ''}}"
                    data-bs-target="#employee-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"
                        style="{{Request::is('employee') || Request::is('employee/create') || Request::is('employee/trash') ? 'color: #4154f1;' : ''}}"></i>
                    <span
                        class="{{Request::is('employee') || Request::is('employee/create') || Request::is('employee/trash') ? 'active-nav' : ''}}">Utilisateurs</span>
                    <i class="bi bi-chevron-down ms-auto"
                        style="{{Request::is('employee') || Request::is('employee/create') || Request::is('employee/trash') ? 'color: #4154f1; transform: rotate(180deg);' : ''}}"></i>
                </a>
                <ul id="employee-nav"
                    class="nav-content collapse {{Request::is('employee') || Request::is('employee/create') || Request::is('employee/trash') ? 'show' : ''}}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('employee.index')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('employee') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('employee') ? 'active-nav' : ''}}">Tout les Utilisateurs</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('employee.create')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('employee/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('employee/create') ? 'active-nav' : ''}}">Ajouter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('employee.trash')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('employee/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('employee/trash') ? 'active-nav' : ''}}">supprimé</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed"
                    style=" {{Request::is('reparation') || Request::is('reparation/create') || Request::is('reparation/trash') ? 'background: #f6f9ff;' : ''}}"
                    data-bs-target="#reparation-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-tools"
                        style="{{Request::is('reparation') || Request::is('reparation/create') || Request::is('reparation/trash') ? 'color: #4154f1;' : ''}}"></i>
                    <span
                        class="{{Request::is('reparation') || Request::is('reparation/create') || Request::is('reparation/trash') ? 'active-nav' : ''}}">Réparations</span>
                    <i class="bi bi-chevron-down ms-auto"
                        style="{{Request::is('reparation') || Request::is('reparation/create') || Request::is('reparation/trash') ? 'color: #4154f1; transform: rotate(180deg);' : ''}}"></i>
                </a>
                <ul id="reparation-nav"
                    class="nav-content collapse {{Request::is('reparation') || Request::is('reparation/create') || Request::is('reparation/trash') ? 'show' : ''}}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('reparation.index')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('reparation') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('reparation') ? 'active-nav' : ''}}">Tout les Réparations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('reparation.create')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('reparation/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('reparation/create') ? 'active-nav' : ''}}">Ajouter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('reparation.trash')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('reparation/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('reparation/trash') ? 'active-nav' : ''}}">supprimé</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed"
                    style=" {{Request::is('vidange') || Request::is('vidange/create') || Request::is('vidange/trash') ? 'background: #f6f9ff;' : ''}}"
                    data-bs-target="#vidange-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-funnel"
                        style="{{Request::is('vidange') || Request::is('vidange/create') || Request::is('vidange/trash') ? 'color: #4154f1;' : ''}}"></i>
                    <span
                        class="{{Request::is('vidange') || Request::is('vidange/create') || Request::is('vidange/trash') ? 'active-nav' : ''}}">Vidanges</span>
                    <i class="bi bi-chevron-down ms-auto"
                        style="{{Request::is('vidange') || Request::is('vidange/create') || Request::is('vidange/trash') ? 'color: #4154f1; transform: rotate(180deg);' : ''}}"></i>
                </a>
                <ul id="vidange-nav"
                    class="nav-content collapse {{Request::is('vidange') || Request::is('vidange/create') || Request::is('vidange/trash') ? 'show' : ''}}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('vidange.index')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('vidange') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('vidange') ? 'active-nav' : ''}}">Tout les Vidanges</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('vidange.create')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('vidange/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('vidange/create') ? 'active-nav' : ''}}">Ajouter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('vidange.trash')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('vidange/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('vidange/trash') ? 'active-nav' : ''}}">supprimé</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed"
                    style=" {{Request::is('mession') || Request::is('mession/create') || Request::is('mession/trash') ? 'background: #f6f9ff;' : ''}}"
                    data-bs-target="#mission-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-hourglass"
                        style="{{Request::is('mession') || Request::is('mession/create') || Request::is('mession/trash') ? 'color: #4154f1;' : ''}}"></i>
                    <span
                        class="{{Request::is('mession') || Request::is('mession/create') || Request::is('mession/trash') ? 'active-nav' : ''}}">
                        Missions</span>
                    <i class="bi bi-chevron-down ms-auto"
                        style="{{Request::is('mession') || Request::is('mession/create') || Request::is('mession/trash') ? 'color: #4154f1; transform: rotate(180deg);' : ''}}"></i>
                </a>
                <ul id="mission-nav"
                    class="nav-content collapse {{Request::is('mession') || Request::is('mession/create') || Request::is('mession/trash') ? 'show' : ''}}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('mession.index')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('mession') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('mession') ? 'active-nav' : ''}}">Tout les Missions</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('mession.create')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('mession/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('mession/create') ? 'active-nav' : ''}}">Ajouter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('mession.trash')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('mession/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('mession/trash') ? 'active-nav' : ''}}">supprimé</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed"
                    style=" {{Request::is('permanent') || Request::is('permanent/create') || Request::is('permanent/trash') ? 'background: #f6f9ff;' : ''}}"
                    data-bs-target="#permanent-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-infinity"
                        style="{{Request::is('permanent') || Request::is('permanent/create') || Request::is('permanent/trash') ? 'color: #4154f1;' : ''}}"></i>
                    <span
                        class="{{Request::is('permanent') || Request::is('permanent/create') || Request::is('permanent/trash') ? 'active-nav' : ''}}">Affectations
                        </span>
                    <i class="bi bi-chevron-down ms-auto"
                        style="{{Request::is('permanent') || Request::is('permanent/create') || Request::is('permanent/trash') ? 'color: #4154f1; transform: rotate(180deg);' : ''}}"></i>
                </a>
                <ul id="permanent-nav"
                    class="nav-content collapse {{Request::is('permanent') || Request::is('permanent/create') || Request::is('permanent/trash') ? 'show' : ''}}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{route('permanent.index')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('permanent') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('permanent') ? 'active-nav' : ''}}">Tout les Affectations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('permanent.create')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('permanent/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('permanent/create') ? 'active-nav' : ''}}">Ajouter</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('permanent.trash')}}">
                            <i class="bi bi-circle"
                                style="{{Request::is('permanent/trash') ? 'color: #4154f1;' : ''}}"></i><span
                                class="{{Request::is('permanent/trash') ? 'active-nav' : ''}}">supprimé</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('profile')}}">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li><!-- End Profile Page Nav -->



            <li class="nav-item">

                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="nav-link collapsed"><i class="bi bi-box-arrow-in-left">
                        </i><span>Logout</span></button>
                </form>

            </li><!-- End Login Page Nav -->


        </ul>

    </aside><!-- End Sidebar-->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Region Dakhla</span></strong>. All Rights Reserved
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/auth/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/auth/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/auth/vendor/chart.js/chart.min.js"></script>
    <script src="/assets/auth/vendor/echarts/echarts.min.js"></script>
    <script src="/assets/auth/vendor/quill/quill.min.js"></script>
    <script src="/assets/auth/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="/assets/auth/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/auth/vendor/php-email-form/validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
    <!-- Template Main JS File -->
    <script src="/assets/auth/js/main.js"></script>

</body>

</html>