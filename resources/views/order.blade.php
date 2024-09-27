@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders Details</title>
    <link href="css/nav.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    @section('content')
    <div class="container-fluid">
        <div class="row">
            <table border="1" class="table table-dark table-hover" style="margin-top:30px">
                <tr>
                    <th>Product Id</th>  
                    <th>Payment</th>  
                    <th>Order Date</th>  
                    <th>Delivery Date</th>   
                    <th>Order status</th>  
                    <th>Email</th>
                    <th>Quantity</th>    
                    <th>Size</th>  
                    <th colspan="2">Operation</th>
                </tr>
               <tr>
                    @foreach ($orders as $d)
                    <tr>
                    <td>{{ $d->Pro_id }}</td> 
                    <td>{{ $d->Payment}}</td>
                    <td>{{ $d->Ord_data}}</td>
                    <td>{{ $d->Del_data}}</td>
                    <td>{{ $d->Ord_status}}</td>
                    <td>{{ $d->Email}}</td>
                    <td>{{ $d->Quantity}}</td>
                    <td>{{ $d->Size}}</td>
                    <td><a href="{{ URL::to('/') }}/Edit_order/{{ $d->Email }}"><button class="btn btn-primary">Edit</button></a></td>
                    <td>
                    @if ($d->Ord_status=='Ordered')
                    <a href="{{ URL::to('/') }}/Delete_ord/{{ $d->Email }}"><button class="btn btn-danger">Delete</button></a>
                    @else
                    <a href="{{ URL::to('/') }}/order_activate/{{ $d->Email }}"><button class="btn btn-success">Active Order</button></a>
                    @endif
                    </td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
    @endsection
</body>
</html>