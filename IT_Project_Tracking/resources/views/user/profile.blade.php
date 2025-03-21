<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{URL::to('img/next-logo.png')}}">
  <title>
    Next Technologies
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{URL::to('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{URL::to('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/ed48d1600b.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{URL::to('css/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{URL::to('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo" width="170px" >
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('admin') || request()->is('systemsengineer') || request()->is('technicalengineer') ? 'active' : '' }}" 
              href="
                  @php
                      // Fetch the role name based on the logged-in user's role_id
                      $role = App\Models\Role::find(Auth::user()->role_id);
                      $roleName = $role ? $role->Role_Name : ''; 
                  @endphp

                  @if ($roleName == 'Systems Engineer')
                      {{ URL::to('systemsengineer') }}
                  @elseif ($roleName == 'Technical Engineer')
                      {{ URL::to('technicalengineer') }}
                  @else ($roleName == 'Admin')
                      {{ URL::to('admin') }}
                  @endif
              ">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="nav-icon fa-solid fa-window-maximize"></i>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item mt-3">
              <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Manage</h6>
          </li>

          <!-- Admin Role -->
          @if(Auth::user()->role->Role_name == 'Admin')
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('role*')) ? 'active' : '' }}" href="{{ URL::to('roles') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-user-gear"></i>
                      </div>
                      <span class="nav-link-text ms-1">Roles</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('user*')) ? 'active' : '' }}" href="{{ URL::to('users') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fas fa-users"></i>
                      </div>
                      <span class="nav-link-text ms-1">Users</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('organization*')) ? 'active' : '' }}" href="{{ URL::to('organizations') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-sitemap"></i>
                      </div>
                      <span class="nav-link-text ms-1">Organizations</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('payment*')) ? 'active' : '' }}" href="{{ URL::to('payments') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="material-icons opacity-10">receipt_long</i>
                      </div>
                      <span class="nav-link-text ms-1">Billing</span>
                  </a>
              </li>
          @endif

          <!-- System Engineer and Technical Engineer Roles -->
          @if(in_array(Auth::user()->role->Role_name, ['Systems Engineer', 'Technical Engineer']))
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('project*')) ? 'active' : '' }}" href="{{ URL::to('projects') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-diagram-project"></i>
                      </div>
                      <span class="nav-link-text ms-1">Projects</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('milestone*')) ? 'active' : '' }}" href="{{ URL::to('milestones') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-diagram-project"></i>
                      </div>
                      <span class="nav-link-text ms-1">Milestones</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('requirementtype*')) ? 'active' : '' }}" href="{{ URL::to('requirementtypes') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-diagram-project"></i>
                      </div>
                      <span class="nav-link-text ms-1">Requirement Types</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link text-white {{ (request()->is('requirements*')) ? 'active' : '' }}" href="{{ URL::to('requirements') }}">
                      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                          <i class="fa-solid fa-diagram-project"></i>
                      </div>
                      <span class="nav-link-text ms-1">Requirements</span>
                  </a>
              </li>
          @endif
      </ul>
    </div>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center me-5 mt-3">
              @if (Auth::check())
                <p>Welcome, {{ Auth::user()->UserName }}</p> 
              @else
                <p>Please <a href="{{ route('login') }}">login</a>.</p>
              @endif
            </div>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="{{URL::to('chatify')}}">
                <i class="fa-solid fa-message"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <i class="fa-solid fa-address-card"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1 px-2">
                          <a href="{{URL::to('Profile')}}">
                          <span class="font-weight-bold">Profile</span> 
                        </h6>
                      </div>
                    </div>
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1 px-2">
                          <a href="{{URL::to('/login')}}">
                          <span class="font-weight-bold">Sign Out</span> 
                        </h6>
                      </div>
                    </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  <div class="container-fluid">
    <div class="row">
      <!-- First Card: Edit Profile -->
      <div class="col-lg-6 col-md-6 mb-4">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Profile Information</h4>
          </div>
          <div class="card-body">
            <form>
            @if (Auth::check())
                  <div class="row">
                    <div class="col-md-6">
                      <label>Username</label>
                      <div class="input-group input-group-dynamic">
                        <input type="text" value="{{ Auth::user()->UserName ?? '' }}" required name="users_names" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Email</label>
                      <div class="input-group input-group-outline mb-4">
                        <input type="email" value="{{ Auth::user()->Email ?? '' }}" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" required name="email" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <label>Password</label>
                      <div class="input-group input-group-outline mb-4">
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required name="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Phone Number</label>
                      <div class="input-group input-group-static">
                        <input type="text" value="{{ Auth::user()->PhoneNumber ?? '' }}" pattern="^(\+\d\s?)?(\d{3}[-.\s]?)?[\d]{3}[-.\s]?[\d]{4}$" required name="phone_number" class="form-control">
                      </div>
                    </div>
                  </div>
                @else
                  <p>Please <a href="{{ route('login') }}">login</a>.</p>
                @endif
              <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>

      <!-- Second Card: User Information -->
      <div class="col-lg-5 col-md-6">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
          <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
          <div class="row gx-4 mb-2">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="{{URL::to('img/bruce-mars.jpg')}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                  {{ Auth::user()->UserName ?? '' }}
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                Next Technologies Ltd ©
                <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.next.co.ke/" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <div class="fixed-plugin">
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{URL::to('js/core/popper.min.js')}}"></script>
  <script src="{{URL::to('js/core/bootstrap.min.js')}}"></script>
  <script src="{{URL::to('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{URL::to('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{URL::to('js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>