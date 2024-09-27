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
                            <th>Type</th>  
                            <th>Product Price</th>   
                            <th>Color</th>
                            <th>Material</th>
                            <th>Product Images</th>
                            <th>More Images</th>
                            <th>More Images</th>
                            <th>More Images</th>
                            <th>More Images</th>
                            <th>Status</th>  
                            <th colspan="2">Operation</th>
                        </tr>
                        <tr>
                            @foreach ($product as $d)
                            <tr>
                            <td>{{ $d->Pro_id }}</td> 
                            <td>{{ $d->Pro_name}}</td>
                            <td>{{ $d->Pro_type}}</td>
                            <td>{{ $d->Pro_price}}</td>
                            <td>{{ $d->Pro_color}}</td>
                            <td>{{ $d->Pro_material}}</td>
                            <td><img src="{{URL::to('/')  }}/images/product/{{ $d->Pro_img }}" alt="error" height="50px" width="50px"></td> 
                            <td><img src="{{URL::to('/')  }}/images/product/{{ $d->Other_img1 }}" alt="error" height="50px" width="50px"></td> 
                            <td><img src="{{URL::to('/')  }}/images/product/{{ $d->Other_img2 }}" alt="error" height="50px" width="50px"></td> 
                            <td><img src="{{URL::to('/')  }}/images/product/{{ $d->Other_img3 }}" alt="error" height="50px" width="50px"></td> 
                            <td><img src="{{URL::to('/')  }}/images/product/{{ $d->Other_img4 }}" alt="error" height="50px" width="50px"></td> 
                            <td>{{ $d->Product_status}}</td>
                            <td><a href="{{ URL::to('/') }}/Edit_pro/{{ $d->Pro_id }}"><button class="btn btn-primary">Edit</button></a></td>
                            <td>
                            @if ($d->Product_status=='Available')
                            <a href="{{ URL::to('/') }}/unavailable_pro/{{ $d->Pro_id }}"><button class="btn btn-danger">Unavailable</button></a>
                            @else
                            <a href="{{ URL::to('/') }}/available_pro/{{ $d->Pro_id }}"><button class="btn btn-success">Available Product</button></a>
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