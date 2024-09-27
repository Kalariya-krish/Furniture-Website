@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to Cart</title>
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
        <br>
        <div class="col">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header bg-dark text-light" style="font-size:20px;">Fill The Details</div>
                <div class="card-body">
                    <form method="post"action="addcart"name="myform"enctype="multipart/form-data">@csrf
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px">Email</label>
                                <input class="form-control" id="fn" type="email"name="email" placeholder="Enter your Id "style="font-size:20px;"value="{{old('email')}}">
                                <span style="color: red; fontsize:16px;">@error('email') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Product Id</label>
                                <input class="form-control" id="ln" type="text"name="proid" placeholder="Enter your Name "style="font-size:20px;"value="{{old('proid')}}">
                                <span style="color: red; fontsize:16px;">@error('proid') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Quantity</label>
                                <input class="form-control" type="number"name="qty" placeholder="Enter your Type "style="font-size:20px;"value="{{old('qty')}}">
                                <span style="color: red; fontsize:16px;">@error('qty') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Size</label>
                                <input class="form-control" type="text"name="size" placeholder="Enter your Type "style="font-size:20px;"value="{{old('qty')}}">
                                <span style="color: red; fontsize:16px;">@error('size') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <br><button class="btn btn-dark" type="submit"style="font-size:20px;"><a style="text-decoration:none;color:#fdfdfd"name="btn"style="text-decoration:none;"name="btn">Add to Cart</a></button>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>