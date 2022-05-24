@extends('layouts.main', ['search' => false])
@section('title', 'Login')
@section('page_title', 'Login')
@section('content')

<!-- Login Container -->
<div class="login-container margin">
    <div class="top-layer" style="background-image:url(images/background/20.png)"></div>
    <div class="bottom-layer" style="background-image:url(images/background/21.png)"></div>
    <div class="auto-container">
        <div class="inner-container">

            <div class="image">
                <img src="images/resource/login.jpg" alt="login" />

                <!-- Login Form -->
                <div class="login-form">
                    <div class="fill">Please fill the form</div>

                    <!-- Register Form -->
                    <form method="post" action="{{route('login')}}">
                        @csrf
                        @if(session()->has('errMessage'))
                            <p class="errMsg">{{ session('errMessage') }}</p>
                        @endif

                        @if(session()->has('regMessage'))
                            <p class="errMsg">{{ session('regMessage') }}</p>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <div class="check-box"><input type="checkbox" name="shipping-option" id="account-option"> &ensp; <label for="account-option">Remember me</label> <a href="#">Forgot password?</a></div>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Login</span></button>
                            Don't have an account? <a href="{{route('register')}}">Sign Up</a>
                        </div>


                    </form>

                </div>
                <!-- End Register Form -->

            </div>

        </div>
    </div>
</div>
<!-- End Register Container -->
@endsection
