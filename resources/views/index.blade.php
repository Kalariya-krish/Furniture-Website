@extends('dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registered Users</title>
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
                        <th >Profile</th>
                        <th>First</th>
                        <th>Last</th>
                        <th>Email</th>  
                        <th>Password</th>  
                        <th>Mobile</th>  
                        <th>Address</th>  
                        <th>City</th>  
                        <th>Pincode</th>  
                        <th>Bank</th>  
                        <th>Account</th>  
                        <th>IFSC</th>  
                        <th>Status</th>  
                        <th colspan="3">Operation</th>
                    </tr>
                    <tr>
                        @foreach ($data as $d)
                        <tr>
                        <td><img src="{{URL::to('/')  }}/images/registration/{{ $d->Profile_picture }}" alt="" height="50px" width="50px"></td> 
                        <td>{{ $d->First_name }}</td> 
                        <td>{{ $d->Last_name}}</td>
                        <td>{{ $d->Email}}</td>
                        <td>{{ $d->Password}}</td>
                        <td>{{ $d->Mobile_no}}</td>
                        <td>{{ $d->Address}}</td>
                        <td>{{ $d->City}}</td>
                        <td>{{ $d->Pin_code}}</td>
                        <td>{{ $d->Bank_name}}</td>
                        <td>{{ $d->Account_no}}</td>
                        <td>{{ $d->Ifsc_code}}</td>
                        <td>{{ $d->Status}}</td>
                        <td> <a href="{{ URL::to('/') }}/Edit_data/{{ $d->Email }}"><button class="btn btn-primary">Edit</button></a></td>
                            <td> <a href="{{ URL::to('/') }}/Delete_data/{{ $d->Email }}"><button class="btn btn-warning">Delete</button></a></td>
                            <td>
                            @if ($d->Status=='Active')
                                <a href="{{ URL::to('/') }}/Deactive_user/{{ $d->Email }}"><button class="btn btn-danger">Deactive</button></a>
                            @elseif($d->Status=='Inactive')
                                <a href="{{ URL::to('/') }}/Active_user/{{ $d->Email }}"><button class="btn btn-success">Active</button></a>
                            @else
                            <a href="{{ URL::to('/') }}/Active_user/{{ $d->Email }}"><button class="btn btn-success">Active</button></a>
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