@extends('layouts.main', ['search' => false])
@section('title', 'Register')
@section('page_title', 'Register')

@section('content')
    <!-- Register Container -->
    <div class="register-container margin">
        <div class="top-layer" style="background-image:url(images/background/20.png)"></div>
        <div class="bottom-layer" style="background-image:url(images/background/21.png)"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="images/resource/contact.jpg" alt="" />
                            </div>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="fill">Please fill the form</div>

                            <!-- Register Form -->
                            <div class="register-form">

                                <!-- Register Form -->
                                <form method="post" action="{{route('register')}}">
                                @csrf
                                    @if(session()->has('errMessage'))
                                        <p class="errMsg">{{ session('errMessage') }}</p>
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
                                        <input type="text" name="first_name" placeholder="First Name" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="last_name" placeholder="Last Name" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="password" placeholder="Password" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" name="passwordRe" placeholder="Repeat password" required>
                                    </div>

                                    <div class="form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="txt">Register</span></button>
                                        Already have an account? <a href="{{route('login')}}">Log In</a>
                                    </div>

                                </form>

                            </div>
                            <!-- End Register Form -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Register Container -->
@endsection
