<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">    
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
                <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Furniture E-commerce</title>
        <style>
            .carousel-item img {
  filter: blur(0.2px); /* Adjust the blur amount as needed */
}

.carousel-caption {
  background: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background to the caption */
  padding: 20px;
  color: #fff; /* Set the text color to white for better visibility */
}
        </style>
    </head>
    
    <body>
        @extends('before/master_before')
        @section('content')
        <main>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  @foreach ($slider as $index =>$s)
                  <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ URL::to('/') }}/images/slideshow/{{ $s['Image'] }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <h6>{{ $s['Tital'] }}</h6>
                      <p>{{ $s['Description'] }}</p>
                    </div>
                  </div>
                  @endforeach   
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
           
            <section class="about-section section-padding" >
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <small class="section-small-title">Our Story</small>

                            {{-- <h4 class="mt-2 mb-4"><span class="text-muted">Introducing</span></h4> --}}
<br>
@foreach ($our_story as $os)

                            <h5 class="text-muted mb-3">{{ $os['Tital'] }}</h5>

                            <p>{{ $os['Description'] }}</p>
                        </div>

                        <div class="col-lg-3 col-md-5 col-5 mx-lg-auto">
                            <img src="{{ URL::to('/') }}/images/{{ $os['Image1'] }}" class="about-image about-image-small img-fluid" alt="">
                        </div>

                        <div class="col-lg-4 col-md-7 col-7">
                            <img src="{{ URL::to('/') }}/images/{{ $os['Image2'] }}" class="about-image img-fluid" alt="">
                        </div>
                        @endforeach
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
                                    <i class="featured-icon bi-clock"></i>
                                    
                                    <div>
                                        @foreach ($opening_hours as $oh)
                                            
                                        <p class="mb-2">
                                            {{ $oh['Day'] }} ~
                                            <strong class="d-inline">
                                                {{ $oh['Time'] }}
                                            </strong>
                                        </p>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="shop-section section-padding" >
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
                                        <img src="images/shop/minimal-bathroom-interior-design-with-wooden-furniture.jpg" class="shop-image img-fluid" alt="">
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
                                        <img src="images/shop/mock-up-poster-modern-dining-room-interior-design-with-white-empty-wall.jpg" class="shop-image img-fluid" alt="">
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
                                        <img src="images/shop/green-sofa-white-living-room-with-blank-table-mockup.jpg" class="shop-image img-fluid" alt="">
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
                                        <img src="images/shop/concept-home-cooking-with-female-chef.jpg" class="shop-image img-fluid" alt="">
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
                                        <img src="images/shop/childrens-bed-nursery-cot-velvet-childrens-room.jpg" class="shop-image img-fluid" alt="">
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

                       

                    </div>
                </div>
            </section>
        </main>

        @endsection
        
    </body>
</html>