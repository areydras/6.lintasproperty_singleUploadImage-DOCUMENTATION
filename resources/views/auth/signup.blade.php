<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Properties User SIGNUP</title>

    <!-- Icons font CSS-->
    <link href="auth/register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="auth/register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="auth/register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="auth/register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="auth/register/css/main.css" rel="stylesheet" media="all">
    <link rel="icon" href="img/core-img/favicon.ico">

</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4 @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" required autocomplete="name" autofocus name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4 @error('username') is-invalid @enderror" value="{{ old('username') }}" type="text" required autocomplete="username" name="username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4 @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" required autocomplete="email" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4 @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="text" required autocomplete="phone" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4 @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password" required autocomplete="new-password" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Re Password</label>
                                    <input class="input--style-4 @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" type="password" required autocomplete="new-password" name="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert" style="color: red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                    
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2" type="submit" style="background: #333333">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="auth/register/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="auth/register/vendor/select2/select2.min.js"></script>
    <script src="auth/register/vendor/datepicker/moment.min.js"></script>
    <script src="auth/register/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="auth/register/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->