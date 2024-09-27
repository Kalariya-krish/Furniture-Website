<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Furniture E-commerce</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/contact_style.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/change_pp.css">
    <script>
        var loadFile = function(event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <style>
        .customize h5{
            font-size: 17px;
            padding: 10px;
            margin: 30px 0px;
            background-color: rgb(255, 122, 13);
            /* font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif */
        }
        .customize a{
            color: black;
        }
        .customize h5:hover{
            color: black;
            border-left: 1px solid rgb(255, 122, 13);
        }

        #a1{
            border: 1px solid rgb(255, 122, 13);
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>
    @extends('user/master_after')
    @section('content2')
        <main style="margin-top: 100px;">
            <div class="container">

            <div class="row">
                <div class="col-3 customize" id="a1">
                    <a href="customize_sofa"><h5>Sofa</h5></a>
                    <a href="customize_chair"><h5>Chair</h5></a>
                    <a href="customize_table"><h5>Table</h5></a>
                    <a href="customize_bed_frame"><h5>Bed Frame</h5></a>
                    {{-- <h5><a href="customize_sorage_unit">Storage Unit</a></h5> --}}
                </div>

                <div class="col-9">
                    @yield('customize_form')
                </div>
            </div>

            </div>
        </main>
    @endsection
</body>

</html>
