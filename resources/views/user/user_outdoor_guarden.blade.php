<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Furniture E-commerce</title>
        <style>
            .original-price {
                text-decoration: line-through;
            }
        </style>
    </head>
    
    <body class="shop-listing-page">
        @extends('user/master_after')
        @section('content2')
        <main>

            <header class="site-header d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h1 class="text-white">Outdoor And Guarden</h1>
                        </div>

                    </div>
                </div>
            </header>

            <section class="shop-section section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-5 col-12 me-auto mb-5">
                            <form class="custom-form filter-form" action="apply_filter_outdoor" method="post" role="form">
                                @csrf
                                <div class="">
                                    <h6 class="filter-form-small-title">Filter</h6>

                                </div>

                                <div class="mt-4">
                                    <h6 class="filter-form-small-title">Price range</h6>

                                    <div class="form-check">
                                        <input name="price" type="radio" class="form-check-input" id="PriceCheckOne" value="10000">
                                        
                                        <label class="form-check-label" for="PriceCheckOne">below Rs.10,000</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="price" type="radio" class="form-check-input" id="PriceCheckTwo" value="20000">
                                        
                                        <label class="form-check-label" for="PriceCheckTwo">Rs.10,000 - Rs.20,200</label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input name="price" type="radio" class="form-check-input" id="PriceCheckTwo" value="30000">
                                        
                                        <label class="form-check-label" for="PriceCheckTwo">Rs.30,000 - Rs.40,000</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="price" type="radio" class="form-check-input" id="PriceCheckThree" value="40000">
                                        
                                        <label class="form-check-label" for="PriceCheckThree">Rs.40,000 - Rs.50,000</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="filter-form-small-title">Color</h6>

                                    <div class="form-check">
                                        <input name="color" type="radio" class="form-check-input" id="ConditionCheckOne" value="Gray">
                                        <label class="form-check-label" for="ConditionCheckOne">Gray</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color" type="radio" class="form-check-input" id="ConditionCheckOne" value="Blue">
                                        <label class="form-check-label" for="ConditionCheckOne">Blue</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color" type="radio" class="form-check-input" id="ConditionCheckOne" value="White">
                                        <label class="form-check-label" for="ConditionCheckOne">White</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color" type="radio" class="form-check-input" id="ConditionCheckOne" value="Dark blue" >
                                        <label class="form-check-label" for="ConditionCheckOne">Dark blue</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="color" type="radio" class="form-check-input" id="ConditionCheckOne" value="Black" >
                                        <label class="form-check-label" for="ConditionCheckOne">Black</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <h6 class="filter-form-small-title">Material</h6>

                                    <div class="form-check">
                                        <input name="material" type="radio" class="form-check-input" id="ConditionCheckOne" value="Fabric" >
                                        <label class="form-check-label" for="ConditionCheckOne">Fabric</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="material" type="radio" class="form-check-input" id="ConditionCheckOne" value="Metal" >
                                        <label class="form-check-label" for="ConditionCheckOne">Glass</label>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="form-control btn btn-outline-info">Apple Filters</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-8 col-md-6 col-12">
                            <h3>Products</h3>

                            {{-- <p class="mb-5"><strong>3,648 items</strong> are currently available</p> --}}

                            <div class="row">
                                @foreach ($outdoor as $o)
                                    <div class="col-lg-6 col-12">
                                        <div class="shop-thumb">
                                            <div class="shop-image-wrap">
                                                <a href="shop-detail.html">
                                                    <img src="{{ URL::to('/') }}/images/product/{{ $o['Pro_img'] }}"
                                                        class="shop-image img-fluid" alt="">
                                                </a>

                                                <p class="shop-pricing mb-0 mt-3">
                                                    <span class="badge custom-badge " style="position: absolute; top: 10px; left: 10px;  color: #af3918; padding: 5px; border-radius: 5px; font-size: 14px;">
                                                        @if ($offer->where('Pro_id', $o['Pro_id'])->count() > 0)
                                                        {{ $offer->where('Pro_id', $o['Pro_id'])->first()['Offer_percentage'] }}% OFF
                                                    @endif</span><br>
                                                </p>

                                                <div class="shop-icons-wrap">
                                                    <div class="shop-icons d-flex flex-column align-items-center">
                                                        <a href="{{ URL::to('/user') }}/user_view_product/{{ $o['Pro_id'] }}"
                                                            class="shop-icon bi-eye"></a>
                                                        <a href="{{ URL::to('/user') }}/user_buy_now/{{ $o['Pro_id'] }}" class="shop-icon bi-shop"></a>
                                                        <a href="{{ URL::to('/user') }}/user_add_to_cart/{{ $o['Pro_id'] }}"
                                                            class="shop-icon bi-cart"></a>
                                                    </div>

                                                    @if ($offer->where('Pro_id', $o['Pro_id'])->count() > 0)
                            <p class="shop-pricing mb-0 mt-3">
                                <span class="badge custom-badge original-price">Rs. {{ $o['Pro_price'] }}</span><br>
                                <span class="badge custom-badge">Rs. {{ $offer->where('Pro_id', $o['Pro_id'])->first()['Offer_price'] }}</span>
                            </p>
                        @else
                            <p class="shop-pricing mb-0 mt-3">
                                <span class="badge custom-badge">Rs. {{ $o['Pro_price'] }}</span>
                            </p>
                        @endif
                                                </div>

                                            </div>

                                            <div class="shop-body">
                                                <h6>{{ $o['Pro_name'] }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </section> {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36363e" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg> --}}
        </main>
        @endsection
    </body>
</html>
