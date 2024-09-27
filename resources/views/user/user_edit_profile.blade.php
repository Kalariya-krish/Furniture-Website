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
</head>

<body>
    @extends('user/master_after')
    @section('content2')
        <main>
            <section class="contact-section">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#f9f9f9" fill-opacity="1"
                        d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
                    </path>
                </svg>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-12"></div>
                        <div class="col-lg-8 col-12">
                            <h4 class="mb-4">Edit Profile</h4>
                        </div>
                        <div class="col-lg-2 col-12"></div>
                    </div>
                    <div class="row">
                        <form class="custom-form contact-form" action="update_data" method="post" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <label for="fileToUpload">
                                        <div class="profile-pic"
                                            style="background-image: url({{ URL::to('/') }}/images/registration/{{ $loged_user['Profile_picture'] }});">
                                            <span class="glyphicon glyphicon-camera"></span>
                                            <span>Change Image</span>
                                        </div>
                                    </label>
                                    <input type="File" name="profile_picture" id="fileToUpload">
                                    <span style="font-size: 12px; color:red;">
                                        @error('profile_picture')
                                            <div style="">{{ $message }}</div>
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-lg-8 col-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="input-group align-items-center">
                                                <label for="first-name">First Name</label>
                                                <input type="text" name="first_name" class="form-control"
                                                    value="{{ old('first_name') ?: $loged_user['First_name'] }}">
                                            </div>
                                            <span style="font-size: 12px; color:red;">
                                                @error('first_name')
                                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="input-group align-items-center">
                                                <label for="last-name">Last Name</label>
                                                <input type="text" name="last_name" class="form-control"
                                                value="{{ old('last_name') ?: $loged_user['Last_name'] }}">
                                            </div>
                                            <span style="font-size: 12px; color:red">
                                                @error('last_name')
                                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="input-group align-items-center">
                                        <label for="email">Mobile number</label>
                                        <input type="text" name="mobile_no" class="form-control"
                                        value="{{ old('mobile_no') ?: $loged_user['Mobile_no'] }}">

                                    </div>
                                    <span style="font-size: 12px; color:red">
                                        @error('mobile_no')
                                            <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                        @enderror
                                    </span>

                                    <div class="input-group textarea-group">
                                        <label for="message">Address</label>
                                        <input name="address" class="form-control" value="{{ old('address') ?: $loged_user['Address'] }}">
                                    </div>
                                    <span style="font-size: 12px; color:red">
                                        @error('address')
                                            <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                        @enderror
                                    </span>


                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="input-group align-items-center">
                                                <label for="first-name">City</label>
                                                <input type="text" name="city" class="form-control"
                                                value="{{ old('city') ?: $loged_user['City'] }}">
                                            </div>
                                            <span style="font-size: 12px; color:red">
                                                @error('city')
                                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="input-group align-items-center">
                                                <label for="last-name">Pin Code</label>
                                                <input type="text" name="pin_code" class="form-control"
                                                value="{{ old('pin_code') ?: $loged_user['Pin_code'] }}">
                                            </div>
                                            <span style="font-size: 12px; color:red">
                                                @error('pin_code')
                                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>

                                    </div>

                                    <div class="input-group align-items-center">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" class="form-control"
                                        value="{{ old('email') ?: $loged_user['Email'] }}" readonly>

                                    </div>
                                    <span style="font-size: 12px; color:red">
                                        @error('email')
                                            <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                        @enderror
                                    </span>

                                    <div class="input-group align-items-center">
                                        <label for="email">Bank Name</label>

                                        <input type="text" name="bank_name" class="form-control"
                                        value="{{ old('bank_name') ?: $loged_user['Bank_name'] }}">

                                    </div>
                                    <span style="font-size: 12px; color:red">
                                        @error('bank_name')
                                            <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                        @enderror
                                    </span>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="input-group align-items-center">
                                                <label for="email">Account Number</label>
                                                <input type="text" name="account_no" class="form-control"
                                                value="{{ old('account_no') ?: $loged_user['Account_no'] }}">

                                            </div>
                                            <span style="font-size: 12px; color:red">
                                                @error('account_no')
                                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="input-group align-items-center">
                                                <label for="email">IFSC code</label>
                                                <input type="text" name="ifsc_code" class="form-control"
                                                value="{{ old('ifsc_code') ?: $loged_user['Ifsc_code'] }}">

                                            </div>
                                            <span style="font-size: 12px; color:red">
                                                @error('ifsc_code')
                                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}
                                                    </div>
                                                @enderror
                                            </span>
                                        </div>

                                    </div>

                                    <div class="col-lg-3 col-md-4 col-6">
                                        <button type="submit" class="form-control">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</body>

</html>
