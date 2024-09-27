@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Order</title>
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
                <div class="card-header bg-dark text-light" style="font-size:20px;">Edit The Details</div>
                <div class="card-body">
                    <form method="post"action="addord"name="myform"enctype="multipart/form-data">@csrf
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Product Id</label>
                                <input class="form-control" type="text"name="proid" placeholder="Enter your Product-id "style="font-size:20px;"value="{{old('proid')}}">
                                <span style="color: red; fontsize:16px;">@error('proid') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Payment</label>
                                <input class="form-control"type="text"name="pay" placeholder="Enter your Payment Method "style="font-size:20px;"value="{{old('pay')}}">
                                <span style="color: red; fontsize:16px;">@error('pay') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                      
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px">Order Date</label>
                                <input class="form-control"type="date" name="orddt"placeholder="Enter your Password "style="font-size:20px;"value="{{old('orddt')}}">
                                <span style="color: red; fontsize:16px;">@error('orddt') {{ $message}} @enderror</span>
                            </div>
                            <div class="col">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Delivery Date</label>
                                <input class="form-control"type="date"name="deldt" placeholder="Enter your Mobile number"style="font-size:20px;"value="{{old('deldt')}}">
                                <span style="color: red; fontsize:16px;">@error('deldt') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Email</label>
                                <input class="form-control" name="email"type="email" placeholder="Enter your Email"style="font-size:20px;"value="{{old('email')}}">
                                <span style="color: red; fontsize:16px;">@error('email') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">Quantity</label>
                                <input class="form-control" type="number" name="qty" placeholder="Enter your Quantity"style="font-size:20px;"value="{{old('qty')}}">
                                <span style="color: red; fontsize:16px;">@error('qty') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName"style="font-size:13px">Size</label>
                            <input class="form-control"type="number"name="size" placeholder="Enter your Size "style="font-size:20px;"value="{{old('size')}}">
                            <span style="color: red; fontsize:16px;">@error('size') {{ $message}} @enderror</span>
                        </div>
                    
                        <br><button class="btn btn-dark" type="submit"style="font-size:20px;"><a style="text-decoration:none;color:#ffffff"name="btn"style="text-decoration:none;"name="btn">Add Order</a></button>
                    </form>               
                </div>
            </div>
</body>
@endsection
</html>