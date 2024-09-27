@extends('user/user_customize_order')

@section('customize_form')
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-12"></div>
            <div class="col-lg-8 col-12">
                <h4 class="mb-4">Customize Chair</h4>
            </div>
            <div class="col-lg-2 col-12"></div>
        </div>
        <div class="row">
            <form class="custom-form contact-form" action="customize_chair" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-10 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="style">Chair Style:</label>
                                    <select id="style" name="chair_style" class="form-control">
                                        <option value="accent">Accent Chair</option>
                                        <option value="dining">Dining Chair</option>
                                        <option value="office">Office Chair</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('chair_style')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="input-group align-items-center">
                                    <label for="material">Chair Material:</label>
                                    <select id="material" name="chair_material" class="form-control">
                                        <option value="wood">Wood</option>
                                        <option value="metal">Metal</option>
                                        <option value="upholstered">Upholstered</option>
                                    </select>
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('chair_material')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="input-group align-items-center">
                            <label for="color">Color:</label>
                            <select id="material" name="chair_color" class="form-control">
                                <option value="gray">Gray</option>
                                <option value="velvet">Velvet</option>
                                <option value="black">Black</option>
                                <option value="brown">Brown</option>
                            </select>
                        </div>
                        <span style="font-size: 12px; color:red">
                            @error('chair_color')
                                <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                            @enderror
                        </span>



                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="input-group align-items-center">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" name="chair_quantity" min="1" value="1"
                                        class="form-control">
                                </div>
                                <span style="font-size: 12px; color:red">
                                    @error('chair_quantity')
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
                                <input type="File" name="chair_demo_picture" id="fileToUpload">
                                <span style="font-size: 12px; color:red;">
                                    @error('chair_demo_picture')
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
