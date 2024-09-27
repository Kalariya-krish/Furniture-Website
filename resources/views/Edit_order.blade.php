@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Order</title>
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
    <div class="container-xl px-4 mt-4">
    {{-- <div class="row">
        <div class="col-md-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header bg-dark text-light"style="font-size:20px">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="/images/RKULOGO.png" alt="error"style="height:250px;width:250px;margin-top:-10px">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4"style="font-size:14px">JPG or PNG no larger than 5 MB</div>
                    <input type="file" name="profile" id="pic"style="font-size:20px;color:black"value="{{$r['Profile_Picture']}}">
                    <span style="color: red; fontsize:16px;">@error('profile') {{ $message}} @enderror</span>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header bg-dark text-light" style="font-size:20px;">Fill The Details</div>
                <div class="card-body">
                    <form method="post"name="myform"enctype="multipart/form-data">@csrf
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <span style="color: red; fontsize:16px;">@error('profile') {{ $message}} @enderror</span>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px"></label>
                                <input class="form-control" id="fn" type="text"name="pro_id" placeholder="Enter your Product Id "style="font-size:20px;"value="{{$ord['Pro_id']}}">
                                <span style="color: red; fontsize:16px;">@error('proid') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Payment</label>
                                <input class="form-control" id="ln" type="text"name="pay" placeholder="Enter your Payment "style="font-size:20px;"value="{{$ord['Payment']}}">
                                <span style="color: red; fontsize:16px;">@error('payment') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Email Address</label>
                                <input class="form-control" id="mail" type="email"name="mail" placeholder="Enter your Email "style="font-size:20px;"value="{{$ord['Email']}}"@readonly(true)>
                                <span style="color: red; fontsize:16px;">@error('mail') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px">Order Status</label>
                                <input class="form-control" id="pswd" type="text" name="ordsts"placeholder="Enter your Status "style="font-size:20px;"value="{{$ord['Ord_status']}}"@readonly(true)>
                                <span style="color: red; fontsize:16px;">@error('ordsts') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Order Date</label>
                                <input class="form-control" id="mobile" type="date"name="orddt" placeholder="Enter your Order Date"style="font-size:20px;"value="{{$ord['Ord_data']}}">
                                <span style="color: red; fontsize:16px;">@error('orddt') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" style="font-size:13px">Address</label>
                                <input class="form-control" type="date" name="deldt" placeholder="Enter your Delivery Date"style="font-size:20px;"value="{{$ord['Del_data']}}">
                                <span style="color: red; fontsize:16px;">@error('deldt') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">Quantity</label>
                                <input class="form-control" name="qty"type="text" placeholder="Enter your Quantity"style="font-size:20px;"value="{{$ord['Quantity']}}">
                                <span style="color: red; fontsize:16px;">@error('qty') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">Size</label>
                                <input class="form-control" id="pincode" type="text" name="size" placeholder="Enter your Size"style="font-size:20px;"value="{{$ord['Size']}}">
                                <span style="color: red; fontsize:16px;">@error('size') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <br><button class="btn btn-dark" type="submit"style="font-size:20px;"><a style="text-decoration:none;color:white"name="btn"style="text-decoration:none;"name="btn">Edit Order</a></button>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>