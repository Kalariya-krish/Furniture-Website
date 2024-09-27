<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">    
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
                <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Furniture E-commerce</title>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/review_style.css">
    </head>
    
    <body>
        @extends('before/master_before')
        @section('content')
        <main>
    <section class="reviews">
        <h5>Customer Reviews</h5><br>
        <div class="review row">

            @foreach ($review as $r)
            <div class="review-content col-5">
                <img src="{{ URL::to('/') }}/images/registration/{{ $r->Profile_picture }}" alt="User 1">
                <div class="review-text">
                    <h6>{{ $r->First_name }}&nbsp;&nbsp;{{ $r->Last_name }}</h6>
                    <p>{{ $r->Text_review }}</p>
                    <div class="rating">
                        @if($r->Rating==5)
                        <span class="stars">★★★★★</span>
                        @elseif($r->Rating==4)
                        <span class="stars">★★★★</span>
                        @elseif($r->Rating==3)
                        <span class="stars">★★★</span>
                        @elseif($r->Rating==2)
                        <span class="stars">★★</span>
                        @else
                        <span class="stars">★</span>
                        @endif
                        {{-- <span class="date">May 15, 20XX</span> --}}
                    </div>
                </div>
            </div>
            @endforeach
            
       
    </section>
    <section class="share-review">
        <h2>Share Your Review</h2>
        <p>We'd love to hear about your experience with Furniture Kingdom! Share your thoughts and photos to inspire others.</p>
        <a href="share-review.html" class="btn btn-primary">Share Your Review</a>
    </section>
    </main>
        @endsection
    </body>
</html>