<!--
=========================================================
* Corporate UI - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/corporate-ui
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/corporate-ui-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-7">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Next Technologies</h3>
                  <p class="mb-0">Welcome back! Please enter your details.</p>
                </div>
                <div class="card-body">
                  <form id="sign-in-form" action="{{URL::to('authLogin')}}" method="post">
                  @csrf
                    <label>Email Address</label>
                    <div class="mb-3">
                        <input value="{{old('Email') ?? ""}}"  type="Email" class="form-control  @error('Email') is-invalid @enderror" name="Email" placeholder="Enter email" aria-label="Email" aria-describedby="email-addon">
                        <div class="invalid-feedback">
                          @error('Email') {{$message}} @enderror
                        </div>
                      </div>
                    <label>Password</label>
                    <div class="mb-3">
                        <input value="" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" aria-label="Password" aria-describedby="password-addon">
                        <div class="invalid-feedback">
                            @error('password') {{$message}} @enderror
                        </div>
                      </div>
                    <div class="d-flex align-items-center">
                      <div class="form-check form-check-info text-left mb-0">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                          Remember for 14 days
                        </label>
                      </div>
                      <a href="javascript:;" class="text-xs font-weight-bold ms-auto">Forgot password</a>
                    </div>
                    <div class="text-center">
                      <div class="center text-center ">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2 pd-5">Sign In</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('../assets/img/image-sign-in.jpg')">
                  <div class="blur mt-20 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                    <h2 class="mt-3 text-dark font-weight-bold">The Home of Computing in East Africa</h2>
                    <h6 class="text-dark text-sm mt-5">Copyright © 2024 Next Technologies</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
</body>

</html>