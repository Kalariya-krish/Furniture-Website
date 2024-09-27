@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Details</title>
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
                            <th>Product Name</th>  
                            <th>Pro_price</th>  
                            <th>Offer_percentage</th>   
                            <th>Offer_price</th>
                            <th>Status</th>
                            <th colspan="2">Operation</th>
                        </tr>
                        <tr>
                            @foreach ($offer as $d)
                            <tr>
                            <td>{{ $d->Pro_id }}</td> 
                            <td>{{ $d->Pro_name}}</td>
                            <td>{{ $d->Pro_price}}</td>
                            <td>{{ $d->Offer_percentage}}</td>
                            <td>{{ $d->Offer_price}}</td>
                            <td>{{ $d->Status}}</td>
                            <td>
                            @if ($d->Status=='Available')
                            <a href="{{ URL::to('/') }}/unavailable_offer/{{ $d->Pro_id }}"><button class="btn btn-danger">Inactive</button></a>
                            @else
                            <a href="{{ URL::to('/') }}/available_offer/{{ $d->Pro_id }}"><button class="btn btn-success">Active</button></a>
                            @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('/') }}/delete_offer/{{ $d->Pro_id }}"><button class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
         </table>
    </div>
</div>
</body>
@endsection
</html>