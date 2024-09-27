<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">    
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
                <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Furniture E-commerce</title>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/slider.css">
    </head>
    
    <body>
        @extends('user/master_after')
        @section('content2')
        <main>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ URL::to('/') }}/images/slideshow/slider4.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h5>Slider One Item</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ URL::to('/') }}/images/slideshow/slider3.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h5>Slider One Item</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p> --}}
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ URL::to('/') }}/images/slideshow/slider1.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                      {{-- <h5>Slider One Item</h5>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p> --}}
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

              <section class="about-section section-padding" id="section_2">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <small class="section-small-title">Our Story</small>

                            <h2 class="mt-2 mb-4"><span class="text-muted">Introducing</span></h2>

                            <h4 class="text-muted mb-3">Since 1986, We crafted products for better spaces</h4>

                            <p>Welcome to Furniture , your ultimate source for exceptional furniture and home decor. Our mission is to inspire and enhance your living spaces through carefully curated designs and exceptional craftsmanship.</p>
                        </div>

                        <div class="col-lg-3 col-md-5 col-5 mx-lg-auto">
                            <img src="{{ URL::to('/') }}/images/about1.jpg" class="about-image about-image-small img-fluid" alt="">
                        </div>

                        <div class="col-lg-4 col-md-7 col-7">
                            <img src="{{ URL::to('/') }}/images/about2.jpg" class="about-image img-fluid" alt="">
                        </div>

                    </div>
                </div>
            </section>


            <section class="featured-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12">
                            <div class="custom-block featured-custom-block">
                                <h2 class="mt-2 mb-4">Opening Hours</h2>

                                <div class="d-flex">
                                    <i class="featured-icon bi-clock me-3"></i>
                                    
                                    <div>
                                        <p class="mb-2">
                                            Mon - Friday ~
                                            <strong class="d-inline">
                                                8:00 AM - 6:00 PM
                                            </strong>
                                        </p>

                                        <p class="mb-2">
                                            Saturday ~
                                            <strong class="d-inline">
                                                10:00 AM - 10:00 PM
                                            </strong>
                                        </p>

                                        <p>Sunday ~ Closed</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="shop-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <small class="section-small-title">Moso Design Shop</small>

                            <h2 class="mt-2 mb-4"><span class="tooplate-red">Interior</span> Products</h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="shop-thumb">
                                <div class="shop-image-wrap">
                                    <a href="shop-detail.html">
                                        <img src="{{ URL::to('/') }}/images/shop/minimal-bathroom-interior-design-with-wooden-furniture.jpg" class="shop-image img-fluid" alt="">
                                    </a>

                                    <div class="shop-icons-wrap">
                                        <div class="shop-icons d-flex flex-column align-items-center">
                                            <a href="#" class="shop-icon bi-heart"></a>

                                            <a href="#" class="shop-icon bi-bookmark"></a>
                                        </div>

                                        <p class="shop-pricing mb-0 mt-3">
                                            <span class="badge custom-badge">$3,600</span>
                                        </p>
                                    </div>

                                    <div class="shop-btn-wrap">
                                        <a href="shop-detail.html" class="shop-btn custom-btn btn d-flex align-items-center align-items-center">Learn more</a>
                                    </div>
                                </div>

                                <div class="shop-body">
                                    <h4>Bathroom</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="shop-thumb">
                                <div class="shop-image-wrap">
                                    <a href="shop-detail.html">
                                        <img src="{{ URL::to('/') }}/images/shop/mock-up-poster-modern-dining-room-interior-design-with-white-empty-wall.jpg" class="shop-image img-fluid" alt="">
                                    </a>

                                    <div class="shop-icons-wrap">
                                        <div class="shop-icons d-flex flex-column align-items-center">
                                            <a href="#" class="shop-icon bi-heart"></a>

                                            <a href="#" class="shop-icon bi-bookmark"></a>
                                        </div>

                                        <p class="shop-pricing mb-0 mt-3">
                                            <span class="badge custom-badge">$6,400</span>
                                        </p>
                                    </div>

                                    <div class="shop-btn-wrap">
                                        <a href="shop-detail.html" class="shop-btn custom-btn btn d-flex align-items-center align-items-center">Learn more</a>
                                    </div>
                                </div>

                                <div class="shop-body">
                                    <h4>Dining</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="shop-thumb">
                                <div class="shop-image-wrap">
                                    <a href="shop-detail.html">
                                        <img src="{{ URL::to('/') }}/images/shop/green-sofa-white-living-room-with-blank-table-mockup.jpg" class="shop-image img-fluid" alt="">
                                    </a>

                                    <div class="shop-icons-wrap">
                                        <div class="shop-icons d-flex flex-column align-items-center">
                                            <a href="#" class="shop-icon bi-heart"></a>

                                            <a href="#" class="shop-icon bi-bookmark"></a>
                                        </div>

                                        <p class="shop-pricing mb-0 mt-3">
                                            <span class="badge custom-badge">$2,400</span>
                                        </p>
                                    </div>

                                    <div class="shop-btn-wrap">
                                        <a href="shop-detail.html" class="shop-btn custom-btn btn d-flex align-items-center align-items-center">Learn more</a>
                                    </div>
                                </div>

                                <div class="shop-body">
                                    <h4>Living Room</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="shop-thumb">
                                <div class="shop-image-wrap">
                                    <a href="shop-detail.html">
                                        <img src="{{ URL::to('/') }}/images/shop/concept-home-cooking-with-female-chef.jpg" class="shop-image img-fluid" alt="">
                                    </a>

                                    <div class="shop-icons-wrap">
                                        <div class="shop-icons d-flex flex-column align-items-center">
                                            <a href="#" class="shop-icon bi-heart"></a>

                                            <a href="#" class="shop-icon bi-bookmark"></a>
                                        </div>

                                        <p class="shop-pricing mb-0 mt-3">
                                            <span class="badge custom-badge">$3,800</span>
                                        </p>
                                    </div>

                                    <div class="shop-btn-wrap">
                                        <a href="shop-detail.html" class="shop-btn custom-btn btn d-flex align-items-center align-items-center">Learn more</a>
                                    </div>
                                </div>

                                <div class="shop-body">
                                    <h4>Chef Kitchen</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12">
                            <div class="shop-thumb">
                                <div class="shop-image-wrap">
                                    <a href="shop-detail.html">
                                        <img src="{{ URL::to('/') }}/images/shop/childrens-bed-nursery-cot-velvet-childrens-room.jpg" class="shop-image img-fluid" alt="">
                                    </a>

                                    <div class="shop-icons-wrap">
                                        <div class="shop-icons d-flex flex-column align-items-center">
                                            <a href="#" class="shop-icon bi-heart"></a>

                                            <a href="#" class="shop-icon bi-bookmark"></a>
                                        </div>

                                        <p class="shop-pricing mb-0 mt-3">
                                            <span class="badge custom-badge">$850</span>
                                        </p>
                                    </div>

                                    <div class="shop-btn-wrap">
                                        <a href="shop-detail.html" class="shop-btn custom-btn btn d-flex align-items-center align-items-center">Learn more</a>
                                    </div>
                                </div>

                                <div class="shop-body">
                                    <h4>Childrens Bedroom</h4>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 col-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">4</a>
                                    </li>

                                    <li class="page-item">
                                        <a class="page-link" href="#">5</a>
                                    </li>
                                    
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}

                    </div>
                </div>
            </section>

</main>
        @endsection
    </body>
</html>