@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Added to cart</title>
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
                                <th>Email</th>  
                                <th>Product Id</th>      
                                <th>Quantity</th>   
                                <th>Size</th>  
                                <th>Status</th>  
                                <th colspan="3">Operation</th>
                            </tr>
                            <tr>
                                @foreach ($cart as $d)
                                <tr>
                                <td>{{ $d->Email }}</td> 
                                <td>{{ $d->Pro_id}}</td>
                                <td>{{ $d->Quantity}}</td>
                                <td>{{ $d->Size}}</td>
                                <td>{{ $d->Status}}</td>
                                <td>
                                    @if ($d->Status=='Active')
                                    <a href="{{ URL::to('/') }}/del_cart/{{ $d->Email }}"><button class="btn btn-danger">Deactive</button></a>
                                    @else
                                    <a href="{{ URL::to('/') }}/active_cart/{{ $d->Email }}"><button class="btn btn-success">Active Cart</button></a>
                                    @endif
                                    </td>
                                </tr>
                                @endforeach
    </table>
</div>
</div>
</body>
@endsection
</html>