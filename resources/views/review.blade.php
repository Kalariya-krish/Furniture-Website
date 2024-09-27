@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reviews</title>
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
    <div class="row"> 
    <table border="1" class="table table-dark table-hover" style="margin-top:30px">
                    <tr>
                        <th>Email</th>  
                        <th>Product</th>  
                        <th>Rating</th>  
                        <th>Comment</th>   
                        <th>Status</th> 
                        <th>Operation</th> 
                    </tr>
                   <tr>
                        @foreach ($review as $d)
                        <tr>
                        <td>{{ $d->Email }}</td> 
                        <td>{{ $d->Pro_id}}</td>
                        <td>{{ $d->Rating}}</td>
                        <td>{{ $d->Text_review}}</td>
                        <td>{{ $d->Status}}</td>
                        <td>
                            @if ($d->Status=='Active')
                            <a href="{{ URL::to('/') }}/del_review/{{ $d->Email }}"><button class="btn btn-danger">Deactive</button></a>
                            @else
                            <a href="{{ URL::to('/') }}/active_review/{{ $d->Email }}"><button class="btn btn-success">Active</button></a>
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