<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">    
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
                <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Furniture E-commerce</title>
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/contact_style.css">
    </head>
    
    <body>
        @extends('before/master_before')
        @section('content')
        <main>
            <section class="contact-section">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f9f9f9" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path></svg>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <small class="section-small-title">Ask anything.</small>

                            <h2 class="mb-4">Say Hello</h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <form class="custom-form contact-form" action="contactform" method="post" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group align-items-center">
                                            <label for="first-name">First Name</label>

                                            <input type="text" name="first_name" id="first-name" class="form-control" placeholder="Jack" >
                                        </div>
                                        <span style="font-size: 12px; color:red;">@error('first_name') {{ $message }}@enderror</span> 
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group align-items-center">
                                            <label for="last-name">Last Name</label>

                                            <input type="text" name="last_name" id="last-name" class="form-control" placeholder="Doe">
                                        </div>
                                        <span style="font-size: 12px; color:red;">@error('last_name') {{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <div class="input-group align-items-center">
                                    <label for="email">Email Address</label>

                                     <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com" >
                                </div>
                                <span style="font-size: 12px; color:red;">@error('email') {{ $message }}@enderror</span>

                                <div class="input-group textarea-group">
                                    <label for="message">Message</label>

                                    <textarea name="me" rows="6" class="form-control" id="message" placeholder="What can we help you?" ></textarea>
                               
                                <span style="font-size: 12px; color:red;">@error('me') {{ $message }}@enderror</span>
                            </div>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <button type="submit" class="form-control">Send</button>
                                </div>
                            </form>
                        </div>

                    
                        </div>

                    </div>
                </div>
            </section>
        </main>
        @endsection
    </body>
</html>