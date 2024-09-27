@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
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
                    <form method="post"action="addoffer"name="myform"enctype="multipart/form-data">@csrf
                        <!-- Form Group (username)-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"style="font-size:13px">Product Id</label>
                                <input class="form-control" id="fn" type="text"name="proid" placeholder="Enter your Id "style="font-size:20px;"value="{{old('proid')}}">
                                <span style="color: red; fontsize:16px;">@error('proid') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Product Name</label>
                                <input class="form-control" id="ln" type="text"name="proname" placeholder="Enter your Name "style="font-size:20px;"value="{{old('proname')}}">
                                <span style="color: red; fontsize:16px;">@error('proname') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName"style="font-size:13px">Product price</label>
                                <input class="form-control" id="mail" type="Text"name="proprice" placeholder="Enter your Type "style="font-size:20px;"value="{{old('proprice')}}">
                                <span style="color: red; fontsize:16px;">@error('proprice') {{ $message}} @enderror</span>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col">
                                <label class="small mb-1" for="inputPhone"style="font-size:13px">offer percent</label>
                                <input class="form-control" id="mobile" type="text"name="offerpercent" placeholder="Enter your color"style="font-size:20px;"value="{{old('offerpercent')}}">
                                <span style="color: red; fontsize:16px;">@error('offerpercent') {{ $message}} @enderror</span>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday"style="font-size:13px">Offer Price</label>
                                <input class="form-control" id="pincode" type="text" name="offerprice" placeholder="Enter your material"style="font-size:20px;"value="{{old('offerprice')}}">
                                <span style="color: red; fontsize:16px;">@error('offerprice') {{ $message}} @enderror</span>
                            </div>
                            <!-- Form Group (birthday)-->
                        </div>
                        <!-- Save changes button-->
                        <br><button class="btn btn-dark" type="submit"style="font-size:20px;"><a style="text-decoration:none;color:#fdfdfd"name="btn"style="text-decoration:none;"name="btn">Add offer</a></button>
                    </form>               
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>