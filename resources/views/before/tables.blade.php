<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Furniture E-commerce</title>
    </head>
    
    <body class="shop-listing-page">
        @extends('before/master_before')
        @section('content')
        <main>
            <header class="site-header d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h1 class="text-white">Table</h1>
                        </div>

                    </div>
                </div>
            </header>

            <section class="shop-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-5 col-12 me-auto mb-5">
                            <form class="custom-form filter-form" action="#" method="get" role="form">
                                <div class="">
                                    <h6 class="filter-form-small-title">Filter</h6>

                                </div>

                                <div class="mt-4">
                                    <h6 class="filter-form-small-title">Price range</h6>

                                    <div class="form-check">
                                        <input name="price-range[]" type="checkbox" class="form-check-input" id="PriceCheckOne" value="500" checked>
                                        
                                        <label class="form-check-label" for="PriceCheckOne">below Rs.1,000</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="price-range[]" type="checkbox" class="form-check-input" id="PriceCheckTwo" value="1000">
                                        
                                        <label class="form-check-label" for="PriceCheckTwo">Rs.1,000 - Rs.4,900</label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input name="price-range[]" type="checkbox" class="form-check-input" id="PriceCheckTwo" value="5000">
                                        
                                        <label class="form-check-label" for="PriceCheckTwo">Rs.5,000 - Rs.9,900</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="price-range[]" type="checkbox" class="form-check-input" id="PriceCheckThree" value="10000">
                                        
                                        <label class="form-check-label" for="PriceCheckThree">Rs.10,000 - Rs.30,000</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="filter-form-small-title">Color</h6>

                                    <div class="form-check">
                                        <input name="color[]" type="checkbox" class="form-check-input" id="ConditionCheckOne" value="gray" checked>
                                        <label class="form-check-label" for="ConditionCheckOne">Gray</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color[]" type="checkbox" class="form-check-input" id="ConditionCheckOne" value="gray" checked>
                                        <label class="form-check-label" for="ConditionCheckOne">White</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color[]" type="checkbox" class="form-check-input" id="ConditionCheckOne" value="gray" checked>
                                        <label class="form-check-label" for="ConditionCheckOne">Brown</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color[]" type="checkbox" class="form-check-input" id="ConditionCheckOne" value="gray" checked>
                                        <label class="form-check-label" for="ConditionCheckOne">Blue</label>
                                    </div>
                                </div>

                               

                                <div class="mt-4">
                                    <button type="submit" class="form-control btn btn-outline-info">Apple Filters</button>
                                </div>
                            </form>
                        </div>
            

                        <div class="col-lg-7 col-md-6 col-12">
                            <h4>Products</h4>

                            {{-- <p class="mb-3"><strong>3,648 items</strong> are currently available</p> --}}

                            <div class="row">

                                <div class="col-lg-6 col-12">
                                    <div class="shop-thumb">
                                        <div class="shop-image-wrap">
                                            <a href="shop-detail.html">
                                                <img src="{{ URL::to('/') }}/images/slideshow/slider1.jpg" class="shop-image img-fluid" alt="">
                                            </a>

                                            <div class="shop-icons-wrap">
                                                <div class="shop-icons d-flex flex-column align-items-center">
                                                    <a href="#" class="shop-icon bi-heart"></a>
                                                    <a href="#" class="shop-icon bi-eye"></a>
                                                    <a href="#" class="shop-icon bi-cart"></a>
                                                </div>

                                                <p class="shop-pricing mb-0 mt-3">
                                                    <span class="badge custom-badge">$8,200</span>
                                                </p>
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
                                                <img src="{{ URL::to('/') }}/images/slideshow/slider1.jpg" class="shop-image img-fluid" alt="">
                                            </a>

                                            <div class="shop-icons-wrap">
                                                <div class="shop-icons d-flex flex-column align-items-center">
                                                    <a href="#" class="shop-icon bi-heart"></a>
                                                    <a href="#" class="shop-icon bi-eye"></a>
                                                    <a href="#" class="shop-icon bi-cart"></a>
                                                </div>

                                                <p class="shop-pricing mb-0 mt-3">
                                                    <span class="badge custom-badge">$8,200</span>
                                                </p>
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
                                                <img src="{{ URL::to('/') }}/images/slideshow/slider1.jpg" class="shop-image img-fluid" alt="">
                                            </a>

                                            <div class="shop-icons-wrap">
                                                <div class="shop-icons d-flex flex-column align-items-center">
                                                    <a href="#" class="shop-icon bi-heart"></a>
                                                    <a href="#" class="shop-icon bi-eye"></a>
                                                    <a href="#" class="shop-icon bi-cart"></a>
                                                </div>

                                                <p class="shop-pricing mb-0 mt-3">
                                                    <span class="badge custom-badge">$8,200</span>
                                                </p>
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
                                                <img src="{{ URL::to('/') }}/images/slideshow/slider1.jpg" class="shop-image img-fluid" alt="">
                                            </a>

                                            <div class="shop-icons-wrap">
                                                <div class="shop-icons d-flex flex-column align-items-center">
                                                    <a href="#" class="shop-icon bi-heart"></a>
                                                    <a href="#" class="shop-icon bi-eye"></a>
                                                    <a href="#" class="shop-icon bi-cart"></a>
                                                </div>

                                                <p class="shop-pricing mb-0 mt-3">
                                                    <span class="badge custom-badge">$8,200</span>
                                                </p>
                                            </div>

                                        </div>

                                        <div class="shop-body">
                                            <h4>Bathroom</h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36363e" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg> --}}
        </main>
        @endsection
    </body>
</html>
