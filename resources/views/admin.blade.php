<!DOCTYPE html>
<html lang="es">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('melody/vendors/iconfonts/font-awesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('melody/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('melody/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  @yield('style')
  <link rel="stylesheet" href="{{asset('melody/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="http://www.urbanui.com/" />

</head>
  <body class="sidebar-dark sidebar-icon-only">

    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar navbar-dark">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" ><img src="{{asset('melody/images/cine.svg')}}" width="300" height="100"/></a>
          <a class="navbar-brand brand-logo-mini" ><img src="{{asset('melody/images/cine.svg')}}" width="300" height="100"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
          </button>

          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-flex">
              <a class="nav-link" href="#">
              </a>
            </li>

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a class="dropdown-item">
                  <p class="mb-0 font-weight-normal float-left">You have 16 new notifications
                  </p>
                  <span class="badge badge-pill badge-warning float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-danger">
                      <i class="fas fa-exclamation-circle mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium">Application Error</h6>
                    <p class="font-weight-light small-text">
                      Just now
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="fas fa-wrench mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium">Settings</h6>
                    <p class="font-weight-light small-text">
                      Private message
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="far fa-envelope mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium">New user registration</h6>
                    <p class="font-weight-light small-text">
                      1 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li>

            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">

              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();" class="dropdown-item">
                                  <i class="fas fa-power-off text-primary"></i>
                                  Cerrar Session
                  </a>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->

        @yield('preference')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('_nav')
        <!-- partial -->
              <div class="main-panel">
                @yield('cont')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                  
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Sistema de informacion Cine.</span>
                  </div>
                </footer>
                    <!-- partial -->
                    <!-- main-panel ends -->

                    <!-- page-body-wrapper ends -->
                </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('melody/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('melody/vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('melody/js/off-canvas.js')}}"></script>
    <script src="{{asset('melody/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('melody/js/misc.js')}}"></script>
    <script src="{{asset('melody/js/settings.js')}}"></script>
    <script src="{{asset('melody/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('melody/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
    @yield('scripts')
  </body>


</html>
