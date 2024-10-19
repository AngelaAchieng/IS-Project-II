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
    NEXT TECHNOLOGIES
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
  <script src="https://smtpjs.com/v3/smtp.js"></script>
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1560157368-946d9c8f7cb6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-7">
                <div class="card">
                    <div class="info mt-n5 mx-auto">
                        <div class="icon icon-shape icon-xl border-radius-xl bg-gradient-warning shadow text-center mx-auto">
                            <i class="material-icons opacity-10">lock_open</i>
                        </div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5 text-center">
                      <div class="otp">
                        <div class="text-center text-muted mb-4">
                            <h2>2-Step Verification</h2>
                        </div>
                        <div class="row gx-2 gx-sm-3 mb-3">
                            <div class="col">
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control form-control-lg text-center" maxlength="1" autocomplete="off" autocapitalize="off">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control form-control-lg text-center" maxlength="1" autocomplete="off" autocapitalize="off">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control form-control-lg text-center" maxlength="1" autocomplete="off" autocapitalize="off">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-outline">
                                    <input type="text" class="form-control form-control-lg text-center" maxlength="1" autocomplete="off" autocapitalize="off">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn bg-gradient-warning w-100">Verify</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                Next Technologies Ltd ©
                <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.next.co.ke/" class="nav-link text-white" target="_blank">About Us</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

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
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{URL::to('js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>