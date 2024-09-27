<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Furniture E-commerce</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="{{ URL::to('/') }}/css/bootstrap.min.css" rel="stylesheet">

        <link href="{{ URL::to('/') }}/css/bootstrap-icons.css" rel="stylesheet">

        <link href="{{ URL::to('/') }}/css/owl.carousel.min.css" rel="stylesheet">

        <link href="{{ URL::to('/') }}/css/tooplate-moso-interior.css" rel="stylesheet">
        <!-- JAVASCRIPT FILES -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="{{ URL::to('/') }}/js/jquery.min.js"></script>
        <script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
        <script src="{{ URL::to('/') }}/js/click-scroll.js"></script>
        <script src="{{ URL::to('/') }}/js/jquery.backstretch.min.js"></script>
        <script src="{{ URL::to('/') }}/js/owl.carousel.min.js"></script>
        <script src="{{ URL::to('/') }}/js/custom.js"></script>
    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">F<span class="tooplate-red">urniture</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="about">About</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle click-scroll" href="sofa" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ URL::to('/user') }}/sofas">Sofas</a></li>
                                <li><a class="dropdown-item" href="{{ URL::to('/user') }}/chairs">Chairs</a></li>
                                <li><a class="dropdown-item" href="{{ URL::to('/user') }}/tables">Tables</a></li>
                                <li><a class="dropdown-item" href="{{ URL::to('/user') }}/outdoor_and_guarden">Outdoor and Garden furniture</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="fetch_review">Reviews</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="contact">Contact</a>
                        </li>

                        <li class="nav-item">
                          <div class="collapse navbar-collapse" id="navbar-list-4">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="{{ URL::to('/') }}/images/registration/{{ $loged_user['Profile_picture'] }}" width="30" height="30" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="{{ URL::to('/user') }}/user_my_cart">My cart</a>
                                  <a class="dropdown-item" href="{{ URL::to('/user') }}/user_my_order">My Order</a>
                                  <a class="dropdown-item" href="{{ URL::to('/user') }}/edit_profile">Edit Profile</a>
                                  <a class="dropdown-item" href="{{ URL::to('/user') }}/change_password">Change Password</a>
                                  <a class="dropdown-item" href="{{ URL::to('/user') }}/customize_order">Customize Order</a>
                                  <a class="dropdown-item" href="logout">Log Out</a>
                                </div>
                              </li>   
                            </ul>
                          </div>
                      </li>

                    </ul>
                </div>
                
            </div>
        </nav>

        @yield('content2')

        <footer class="bg-dark text-center text-white" style="width:100%;">
            <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3" style="padding-top: 70px;">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-warning"></i>
          </h6>
          <p>
            <a class="navbar-brand" href="index.html">F<span class="tooplate-red">urniture</span></a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="sofas" class="text-reset">Sofas</a>
          </p>
          <p>
            <a href="chairs" class="text-reset">Chairs</a>
          </p>
          <p>
            <a href="tables" class="text-reset">Tables</a>
          </p>
          <p>
            <a href="outdoor_and_guarden" class="text-reset">Outdoor/Guarden</a>
          </p>
          <p>
            <a href="lamps" class="text-reset">Lamps</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="index" class="text-reset">Home</a>
          </p>
          <p>
            <a href="about" class="text-reset">About</a>
          </p>
          <p>
            <a href="contact" class="text-reset">Contact</a>
          </p>
          <p>
            <a href="review" class="text-reset">Review</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i></p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            furniture@gmail.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i>+91 9727428844</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> +91 9799783540</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
            {{-- <!-- Grid container -->
            <div class="container p-4 pb-0">
              <!-- Section: Social media -->
              <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="bi-facebook"></i
                ></a>
          
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="bi-twitter"></i
                ></a>
          
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="bi-google"></i
                ></a>
          
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="bi-instagram"></i
                ></a>
          
                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="bi-linkedin"></i
                ></a>
          
                <!-- Github -->
                {{-- <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                  ><i class="bi-github"></i
                ></a> --}}
              </section>
              <!-- Section: Social media -->
            </div>
            <!-- Grid container --> 
          
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2020 Copyright:
              <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
          </footer>
    </body>
    
</html>