<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">    
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
                <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Furniture E-commerce</title>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/about_style.css">
    </head>
    
    <body>
        @extends('before/master_before')
        @section('content')
        <main>
    <section class="about">
        <div class="about-content">
            <h1>About Furniture</h1>
            <p>Welcome to Furniture Kingdom, your ultimate source for exceptional furniture and home decor. Our mission is to inspire and enhance your living spaces through carefully curated designs and exceptional craftsmanship.</p>
            <p>With a rich history spanning over 25 years, we have become a trusted name in the industry, known for our commitment to quality and customer satisfaction. We believe that furniture should be more than just functional; it should be an expression of your personal style and a reflection of the life you create within your home.</p>
            <h2>Our Values</h2>
            <ul>
                <li><strong>Quality:</strong> Every piece we offer is meticulously crafted using premium materials to ensure durability and longevity.</li>
                <li><strong>Elegance:</strong> Our designs embody a harmonious blend of modern aesthetics and timeless elegance.</li>
                <li><strong>Comfort:</strong> We prioritize comfort without compromising on style, creating furniture that truly enhances your daily living.</li>
                <li><strong>Customer-Centric:</strong> Your satisfaction is our top priority. We are dedicated to providing an exceptional shopping experience and attentive customer service.</li>
            </ul>
            <p>Whether you're furnishing your living room, bedroom, dining area, or office space, you'll find a diverse range of products that cater to your unique preferences.</p>
        </div>
        <div class="col-lg-3 col-md-5 col-5 mx-lg-auto">
            <img src="{{ URL::to('/') }}/images/about3.jpg" class="about-image about-image-small img-fluid" alt="">
        </div>

        <div class="col-lg-4 col-md-7 col-7">
            <img src="{{ URL::to('/') }}/images/about2.jpg" class="about-image img-fluid" alt="">
        </div>
       
    </section>
    <section class="team">
        <div class="team-content">
            <h2>Meet Our Team</h2>
            <p>Behind every exquisite piece of furniture is a dedicated team of professionals who bring passion and expertise to their craft. Our designers, artisans, and craftsmen work in harmony to create pieces that stand the test of time.</p>
            <p>We take pride in our collaborative and innovative spirit, constantly pushing the boundaries of design to bring you furniture that seamlessly integrates into your lifestyle.</p>
        </div>
        <div class="team-images">
            <img src="{{ URL::to('/') }}/images/about3.jpeg" alt="Furniture Showroom">
            <img src="{{ URL::to('/') }}/images/about4.jpeg" alt="Craftsmen at Work">
            <img src="{{ URL::to('/') }}/images/about5.jpeg" alt="Quality Assurance">
        </div>
    </section>
        </main>
        @endsection
    </body>
</html>