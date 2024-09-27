@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Review</title>
    <link href="css/nav.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>

</head>
<body>
    @section('content')
    <div class="container-fluid">
        <div class="container-xl px-4 mt-4">
    <div class="col">
            <div class="card mb-4">
                <div class="card-header bg-dark text-light" style="font-size:20px;">Enter The Details</div>
                <div class="card-body">
                    <form method="post"action="review"name="myform"enctype="multipart/form-data">@csrf
                        <!-- Form Group (username)-->
                        <div class="col-md-6">
                            <img src="images/lab.jpg" alt="error" height="100px" width="150px">
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Email</label>
                                <input class="form-control" type="email"name="email" placeholder="Enter your Email "style="font-size:20px;"value="{{old('email')}}">
                                <span style="color: red; fontsize:16px;">@error('email') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Product</label>
                                <input class="form-control"type="text"name="pro" placeholder="Enter your product "style="font-size:20px;"value="{{old('pro')}}">
                                <span style="color: red; fontsize:16px;">@error('pro') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Rating</label>
                                <input class="form-control" name="rate"type="number" placeholder="Enter your Rating"style="font-size:20px;"value="{{old('rate')}}">
                                <span style="color: red; fontsize:16px;">@error('rate') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">Comment</label>
                                <input class="form-control" type="text" name="comment" placeholder="Enter your Comment"style="font-size:20px;"value="{{old('comment')}}">
                                <span style="color: red; fontsize:16px;">@error('comment') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <br><button class="btn btn-dark" type="submit"style="font-size:20px;"><a style="text-decoration:none;color:#ffffff"name="btn"style="text-decoration:none;"name="btn">Add Rating</a></button>
                    </form>               
                </div>
            </div>
</body>
@endsection
</html>