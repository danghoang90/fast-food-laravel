{{--@extends('frontend.layouts.login')--}}
{{--@section('content')--}}
{{--    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">--}}
{{--        <div class="wrapper wrapper--w960">--}}
{{--            <div class="card card-2">--}}
{{--                <div class="card-heading"></div>--}}
{{--                <div class="card-body">--}}
{{--                    <h2 class="title">Login</h2>--}}
{{--                    <form method="POST" action="#">--}}
{{--                        @csrf--}}
{{--                        <div class="input-group">--}}
{{--                            <input class="input--style-2" type="email" placeholder="Enter email" name="email">--}}
{{--                        </div>--}}
{{--                        @error('email')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
{{--                        <div class="input-group">--}}
{{--                            <input class="input--style-2" type="password" placeholder="Enter password" name="password">--}}
{{--                        </div>--}}
{{--                        @error('password')--}}
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                        @enderror--}}
{{--                        <div class="p-t-30">--}}
{{--                            <button class="btn btn--radius btn--green" type="submit">SIGN IN</button>--}}
{{--                        </div>--}}
{{--                        @if(session()->has('error-login'))--}}
{{--                            <div class="alert alert-warning">{{ session()->get('error-login') }}</div>--}}
{{--                        @endif--}}
{{--                        <div class="p-t-30">--}}
{{--                            <a href="{{ url('/auth/redirect/google') }}" class="alert alert-danger"><i class="fa fa-google"></i> Google</a>--}}
{{--                        </div>--}}
{{--                        <div class="p-t-30">--}}
{{--                            <a href="#">--}}
{{--                                <p class="text-center m-0">Don't have an account? Sign up</p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        @if (session('error'))--}}
{{--                            <div class="alert alert-danger" role="alert">--}}
{{--                                {{ session('error') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        @if (session('success'))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session('success') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        html,body{
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background: -webkit-linear-gradient(left, #003366,#004080,#0059b3
            , #0073e6);
        }
        ::selection{
            background: #1a75ff;
            color: #fff;
        }
        .wrapper{
            overflow: hidden;
            max-width: 390px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
        }
        .wrapper .title-text{
            display: flex;
            width: 200%;
        }
        .wrapper .title{
            width: 50%;
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
        }
        .wrapper .slide-controls{
            position: relative;
            display: flex;
            height: 50px;
            width: 100%;
            overflow: hidden;
            margin: 30px 0 10px 0;
            justify-content: space-between;
            border: 1px solid lightgrey;
            border-radius: 15px;
        }
        .slide-controls .slide{
            height: 100%;
            width: 100%;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            line-height: 48px;
            cursor: pointer;
            z-index: 1;
            transition: all 0.6s ease;
        }
        .slide-controls label.signup{
            color: #000;
        }
        .slide-controls .slider-tab{
            position: absolute;
            height: 100%;
            width: 50%;
            left: 0;
            z-index: 0;
            border-radius: 15px;
            background: -webkit-linear-gradient(left,#003366,#004080,#0059b3
            , #0073e6);
            transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
        }
        input[type="radio"]{
            display: none;
        }
        #signup:checked ~ .slider-tab{
            left: 50%;
        }
        #signup:checked ~ label.signup{
            color: #fff;
            cursor: default;
            user-select: none;
        }
        #signup:checked ~ label.login{
            color: #000;
        }
        #login:checked ~ label.signup{
            color: #000;
        }
        #login:checked ~ label.login{
            cursor: default;
            user-select: none;
        }
        .wrapper .form-container{
            width: 100%;
            overflow: hidden;
        }
        .form-container .form-inner{
            display: flex;
            width: 200%;
        }
        .form-container .form-inner form{
            width: 50%;
            transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
        }
        .form-inner form .field{
            height: 50px;
            width: 100%;
            margin-top: 20px;
        }
        .form-inner form .field input{
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 15px;
            border-radius: 15px;
            border: 1px solid lightgrey;
            border-bottom-width: 2px;
            font-size: 17px;
            transition: all 0.3s ease;
        }
        .form-inner form .field input:focus{
            border-color: #1a75ff;
            /* box-shadow: inset 0 0 3px #fb6aae; */
        }
        .form-inner form .field input::placeholder{
            color: #999;
            transition: all 0.3s ease;
        }
        form .field input:focus::placeholder{
            color: #1a75ff;
        }
        .form-inner form .pass-link{
            margin-top: 5px;
        }
        .form-inner form .signup-link{
            text-align: center;
            margin-top: 30px;
        }
        .form-inner form .pass-link a,
        .form-inner form .signup-link a{
            color: #1a75ff;
            text-decoration: none;
        }
        .form-inner form .pass-link a:hover,
        .form-inner form .signup-link a:hover{
            text-decoration: underline;
        }
        form .btn{
            height: 50px;
            width: 100%;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
        }
        form .btn .btn-layer{
            height: 100%;
            width: 300%;
            position: absolute;
            left: -100%;
            background: -webkit-linear-gradient(right,#003366,#004080,#0059b3
            , #0073e6);
            border-radius: 15px;
            transition: all 0.4s ease;;
        }
        form .btn:hover .btn-layer{
            left: 0;
        }
        form .btn input[type="submit"]{
            height: 100%;
            width: 100%;
            z-index: 1;
            position: relative;
            background: none;
            border: none;
            color: #fff;
            padding-left: 0;
            border-radius: 15px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
        }

    </style>
</head>
<body>
<div>
    @include('frontend.layouts.alert')
</div>
<div class="wrapper">
    <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
            <form action="{{route('customers.login')}}" class="login" method="POST">
                @csrf
                <div class="field">
                    <input type="text" placeholder="Email Address" class="form-control @error('email') is-invalid  @enderror" name="email">
                </div>
                <div class="field">
                    <input type="number" placeholder="Phone number" class="form-control @error('phone') is-invalid  @enderror" name="phone">
                </div>
                <div class="pass-link"><a href="#">Forgot email?</a></div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="">Signup now</a></div>
            </form>


            <form action="{{route('customers.register')}}" class="signup" method="POST">
                @csrf
                <div class="field">
                    <input type="text" placeholder="Email Address" class="form-control @error('email') is-invalid  @enderror" name="email">
                </div>
                <div class="field">
                    <input type="text" placeholder="User name"  class="form-control @error('name') is-invalid  @enderror" name="name">
                </div>
                <div class="field">
                    <input type="number" placeholder="Phone number" class="form-control @error('phone') is-invalid  @enderror" name="phone">
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Signup">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
    });

</script>


</body>
</html>
