<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Furniture E-commerce</title>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/contact_style.css">
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
                    @if (session('change_success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('change_success') }}
                        </div>
                    @endif
                    @if (session('change_error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('change_error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-3 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <h4 class="mb-4">Change Password</h4>
                        </div>
                        <div class="col-lg-3 col-12"></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form class="custom-form contact-form" action="change_password" method="post" role="form">
                                @csrf
                                <div class="input-group align-items-center">
                                    <label for="password">Current Password</label>
                                    <input type="text" name="current_password" class="form-control"
                                        value="{{ old('current_password') }}">
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('current_password')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                    @enderror
                                    @if ($errors->has('error'))
                                    <div style="margin-top: -20px; margin-bottom:20px;">{{ $errors->first('error') }}</div>
                                    @endif
                                </span>

                                <div class="input-group align-items-center">
                                    <label for="password">New Password</label>
                                    <input type="text" name="new_password" class="form-control"
                                        value="{{ old('new_password') }}">
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('new_password')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                    @enderror
                                </span>

                                <div class="input-group align-items-center">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" name="new_password_confirmation" class="form-control"
                                        value="{{ old('new_password_confirmation') }}">
                                </div>
                                <span style="font-size: 12px; color:red;">
                                    @error('new_password_confirmation')
                                        <div style="margin-top: -20px; margin-bottom:20px;">{{ $message }}</div>
                                    @enderror
                                </span>

                                <div class="col-lg-3 col-md-4 col-6">
                                    <button type="submit" class="form-control">Change</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-12"></div>
                    </div>
                </div>
            </section>
        </main>
    @endsection
</body>

</html>
