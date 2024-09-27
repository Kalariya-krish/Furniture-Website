@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <link  href="{{ URL::to('/')}}/css/nav.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ URL::to('/')}}/css/bootstrap.min.css"href="css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::to('/')}}/css/bootstrap.css">
    <link rel="stylesheet"href="{{ URL::to('/')}}/fontawesome/css/all.css">
    <script src="{{ URL::to('/')}}/js/bootstrap.js" type="text/javascript"></script>
    <script src="{{ URL::to('/')}}/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="{{ URL::to('/')}}/js/jquery.min.js"></script>

</head>
<body>
    @section('content')
    <div class="container-xl px-4 mt-4">
    <div class="row">
        {{-- <div class="col-md-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header bg-dark text-light"style="font-size:20px">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="images/demo.jpg" alt="error"style="height:250px;width:250px;margin-top:-10px">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"style="font-size:14px">JPG or PNG no larger than 5 MB</div>
                    <input type="file" name="profile" id="pic"style="font-size:20px;color:black"value="{{old('profile')}}">
                    <span style="color: red; fontsize:16px;">@error('profile') {{ $message}} @enderror</span>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header bg-dark text-light" style="font-size:20px;">Fill The Details</div>
                <div class="card-body">
                    <form method="post"action="adduser"name="myform"enctype="multipart/form-data">@csrf
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px">First Name</label>
                                <input class="form-control" id="fn" type="text"name="first" placeholder="Enter your Name "style="font-size:20px;"value="{{old('first')}}">
                                <span style="color: red; fontsize:16px;">@error('first') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Last Name</label>
                                <input class="form-control" id="ln" type="text"name="last" placeholder="Enter your Name "style="font-size:20px;"value="{{old('last')}}">
                                <span style="color: red; fontsize:16px;">@error('last') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Email Address</label>
                                <input class="form-control" id="mail" type="email"name="mail" placeholder="Enter your Email "style="font-size:20px;"value="{{old('mail')}}">
                                <span style="color: red; fontsize:16px;">@error('mail') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px">Password</label>
                                <input class="form-control" id="pswd" type="Password" name="password"placeholder="Enter your Password "style="font-size:20px;"value="{{old('password')}}">
                                <span style="color: red; fontsize:16px;">@error('password') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Mobile</label>
                                <input class="form-control" id="mobile" type="number"name="mobile" placeholder="Enter your Mobile number"style="font-size:20px;"value="{{old('mobile')}}">
                                <span style="color: red; fontsize:16px;">@error('mobile') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" style="font-size:13px">Address</label>
                                <input class="form-control" type="text" name="add" placeholder="Enter your Address"style="font-size:20px;" value="{{old('add')}}">
                                <span style="color: red; fontsize:16px;">@error('add') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">City</label>
                                <input class="form-control" name="city"type="text" placeholder="Enter your City"style="font-size:20px;"value="{{old('city')}}">
                                <span style="color: red; fontsize:16px;">@error('city') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">Pin-Code</label>
                                <input class="form-control" id="pincode" type="text" name="pincode" placeholder="Enter your Pin-Code"style="font-size:20px;"value="{{old('pincode')}}">
                                <span style="color: red; fontsize:16px;">@error('pincode') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Bank Name</label>
                                <input class="form-control" name="bank"type="text" placeholder="Enter your Bank"style="font-size:20px;"value="{{old('bank')}}">
                                <span style="color: red; fontsize:16px;">@error('bank') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">Account no</label>
                                <input class="form-control" id="account" type="text" name="account" placeholder="Enter your Account"style="font-size:20px;"value="{{old('account')}}">
                                <span style="color: red; fontsize:16px;">@error('account') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">IFSC Details</label>
                                <input class="form-control" name="ifsc"type="text" placeholder="Enter your IFSC"style="font-size:20px;"value="{{old('ifsc')}}">
                                <span style="color: red; fontsize:16px;">@error('ifsc') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">More Image</label>
                                <input class="form-control" id="pincode" type="file" name="profile" placeholder="Enter your Pin-Code"style="font-size:20px;"value="{{old('profile')}}">
                                <span style="color: red; fontsize:16px;">@error('profile') {{ $message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                        <!-- Save changes button-->
                        <br><button class="btn btn-dark" type="submit"style="font-size:20px;"><a style="text-decoration:none;color:white"name="btn"style="text-decoration:none;"name="btn">Add User</a></button>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>