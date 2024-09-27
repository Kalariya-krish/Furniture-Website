@extends('user/user_customize_order')

@section('customize_form')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-12"></div>
            <div class="col-lg-8 col-12">
                <h4 class="mb-4">Customize Sofa</h4>
            </div>
            <div class="col-lg-2 col-12"></div>
        </div>
        <div class="row">
            <form class="custom-form contact-form" action="customize_sofa" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="size">Sofa Size:</label>
                                    <select id="size" name="sofa_size" class="form-control">
                                        <option value="2-seater">2-Seater</option>
                                        <option value="3-seater">3-Seater</option>
                                        <option value="l-shaped">L-Shaped</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('sofa_size')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="material">Material:</label>
                                    <select id="material" name="sofa_material" class="form-control">
                                        <option value="leather">Leather</option>
                                        <option value="fabric">Fabric</option>
                                        <option value="microfiber">Microfiber</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('sofa_material')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="input-group align-items-center">
                            <label for="color">Color:</label>
                            <input type="color" id="color" name="sofa_color" class="form-control">
                        </div>
                        <span style="font-size: 12px; color:red">
                            @error('sofa_color')
                                <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                            @enderror
                        </span>

                        
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="sofa_quantity" name="quantity" min="1" value="1"
                                        class="form-control">
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('sofa_quantity')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-4 col-12">
                                <label for="fileToUpload">
                                    <span>Upload Demo Image</span>
                                    <div class="profile-pic"
                                        style="background-image: url({{ URL::to('/') }}/images/register/slider2.jpg); width:100px; height:100px;">
                                        <span class="glyphicon glyphicon-camera"></span>
                                    </div>
                                </label>
                                <input type="File" name="sofa_demo_picture" id="fileToUpload">
                                <span style="font-size: 12px; color:red;">
                                    @error('sofa_demo_picture')
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
