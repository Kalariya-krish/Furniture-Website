@extends('user/user_customize_order')

@section('customize_form')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-12"></div>
            <div class="col-lg-8 col-12">
                <h4 class="mb-4">Customize Table</h4>
            </div>
            <div class="col-lg-2 col-12"></div>
        </div>
        <div class="row">
            <form class="custom-form contact-form" action="customize_table" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="type">Table Type:</label>
                                    <select id="type" name="table_type" class="form-control">
                                        <option value="coffee">Coffee Table</option>
                                        <option value="dining">Dining Table</option>
                                        <option value="console">Console Table</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('table_type')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="material">Table Material:</label>
                                    <select id="material" name="table_material" class="form-control">
                                        <option value="wood">Wood</option>
                                        <option value="metal">Metal</option>
                                        <option value="glass">Glass</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('table_material')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="shape">Table Shape:</label>
                                    <select id="shape" name="table_shape" class="form-control">
                                        <option value="round">Round</option>
                                        <option value="rectangle">Rectangle</option>
                                        <option value="square">Square</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('table_shape')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="color">Color:</label>
                                    <select id="material" name="table_color" class="form-control">
                                        <option value="gray">Gray</option>
                                        <option value="velvet">Velvet</option>
                                        <option value="black">Black</option>
                                        <option value="brown">Brown</option>
                                        <option value="white">White</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('table_color')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="input-group align-items-center">
                                    <label for="size">Table Seating:</label>
                                    <select id="shape" name="table_seating" class="form-control">
                                        <option value="2">2</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('table_size')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="input-group align-items-center">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="table_quantity" min="1" value="1"
                                        class="form-control">
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('table_quantity')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <label for="fileToUpload">
                                    <span>Upload Demo Image</span>
                                    <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/register/slider2.jpg); width:100px; height:100px;">
                                        <span class="glyphicon glyphicon-camera"></span>
                                    </div>
                                </label>
                                <input type="File" name="table_demo_picture" id="fileToUpload">
                                <span style="font-size: 12px; color:red;">
                                    @error('table_demo_picture')
                                        <div style="">{{ $message }}</div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
                        <button type="submit" class="form-control">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
@endsection
