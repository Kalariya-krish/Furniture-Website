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
        @extends('user/master_after')
        @section('content2')
        <main>
    <section class="reviews">
        <h1>Customer Reviews</h1>
        <div class="review row">
            @foreach ($review as $r)
            <div class="review-content col-5">
                {{-- <img src="images/about1.jpg" alt="User 1"> --}}
                <div class="review-text">
                    <h3>{{ $r['Email'] }}</h3>
                    <p>{{ $r['Text_review'] }}</p>
                    <div class="rating">
                        @if ($r['Rating']==5 )
                        <span class="stars">★★★★★</span>
                        @elseif($r['Rating']==4 )
                        <span class="stars">★★★★</span>
                        @elseif($r['Rating']==3 )
                        <span class="stars">★★★</span>
                        @elseif($r['Rating']==2 )
                        <span class="stars">★★</span>
                        @else
                        <span class="stars">★</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <section class="share-review">
        <h2>Share Your Review</h2>
        <p>We'd love to hear about your experience with Furniture Kingdom! Share your thoughts and photos to inspire others.</p>
        <a href="{{ URL::to('/user') }}/user_share_review" class="btn btn-primary">Share Your Review</a>
    </section>
    </main>
        @endsection
    </body>
</html>