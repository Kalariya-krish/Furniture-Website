<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">    
            <meta http-equiv="X-UA-Compatible" content="IE=edge">    
                <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title>Furniture E-commerce</title>
        <style>
          #r input{
            font-size: 15px;
          }
        </style>
    </head>
    
    <body>
      @extends('before/master_before')
        @section('content')
        <section class="ftco-section" style="width: 100%;">
          <div class="container" >
              <div class="row">
                  <div class="col-2"></div>
                  <div class="col-lg-8 col-sm-12 col-md-12">
                      <div class="login-wrap p-4 p-md-5">
                          @if(session('login_error'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                              {{ session('login_error') }}
                          </div>
                          @endif
                          @if(session('activation_error'))
                          <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                              {{ session('activation_error') }}
                          </div>
                          @endif
                          <div class="d-flex">
                              <div class="w-100">
                                  <h5 class="mb-4">Sign Up</h5>
                              </div>
                          </div>
                          <form action="registration" method="post" enctype="multipart/form-data" style="font-size: 15px;">
                              @csrf
                              <div class="row">
                                <div class="col">
                                  <label class="label" for="name">First name</label>
                                  <input type="text" class="form-control" placeholder="First name" name="first_name"
                                      value="{{ old('first_name') }}" >
                                  <span style="color: red; font-size: 12px;">
                                      @error('first_name')
                                          {{ $message }}
                                      @enderror
                                  </span>
                              </div>
                              <div class="col">
                                <label class="label" for="name">Last name</label>
                                <input type="text" class="form-control" placeholder="Last name" name="last_name"
                                    value="{{ old('last_name') }}" >
                                <span style="color: red; font-size: 12px;">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                              </div><br>
                             
                              <div class="form-group mb-3">
                                  <label class="label" for="name">Email</label>
                                  <input type="email" class="form-control" placeholder="Email" name="email"
                                      value="{{ old('email') }}" >
                                  <span style="color: red; font-size: 12px;">
                                      @error('email')
                                          {{ $message }}
                                      @enderror
                                  </span>
                              </div>
                              <div class="form-group mb-3">
                                  <label class="label" for="password">Password</label>
                                  <input type="password" class="form-control" placeholder="Password" name="password"
                                      value="{{ old('password') }}" >
                                  <span style="color: red; font-size: 12px;">
                                      @error('password')
                                          {{ $message }}
                                      @enderror
                                  </span>
                              </div>
                              <div class="form-group mb-3">
                                <label class="label" for="name">Profile Picture</label>
                                <input type="file" class="form-control" placeholder="Email" name="profile_picture"
                                    value="{{ old('profile_picture') }}" >
                                <span style="color: red; font-size: 12px;">
                                    @error('profile_picture')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                              <div class="form-group" style="width: 100px; justify-content:center;">
                                  <input type="submit" value="Sign Up"
                                      class="form-control btn btn-info rounded submit px-3">
                              </div>

                          </form>
                          <p class="text-center" style="font-size: 15px;">Already have an account ? <a href="login">Login</a>
                          </p>
                      </div>
                  </div>
                  <div class="col-3"></div>
              </div>
          </div>
      </section>
        @endsection
    </body>
</html>