@extends('layouts.main', ['search' => false])

@section('title', 'Contact')

@section('page_title', 'Contact us')

@section('content')
    <!-- Contact Page Container -->
    <div class="contact-page-container">
        <div class="pattern-layer" style="background-image:url(images/background/16.png)"></div>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <h2>Get in touch <br> and let us know how <br> we can help.</h2>
                            <div class="text">Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</div>
                        </div>
                        <ul class="contact-info-list">
                            <li>Address : 58 Howard Street #2 San Francisco, CA 941</li>
                            <li>Phone : (+68)1221 09876</li>
                        </ul>
                        <div class="map">
                            <img src="images/icons/map.png" alt="" />
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">

                        <!-- Contact Form -->
                        <div class="contact-form">

                            <!-- Contact Form -->
                            <form method="post" action="{{route("contact.store")}}" id="contact-form">
                        @csrf
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session()->has('success'))
                                    <h2>{{session('success')}}</h2>
                                    <br>
                                    <br>
                                @endif

                                @if(session()->has('errorMessage'))
                                    <h2>{{session('errorMessage')}}</h2>
                                    <br>
                                    <br>
                                @endif

                                <div class="form-group">
                                    <input type="text" name="subject" id="subjectContact" placeholder="Subject" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="name" id="nameContact" placeholder="Name" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" id="emailContact" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <textarea class="darma" name="message" id="messageContact" placeholder="Type Your Message"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <input id="contactSubmit" class="theme-btn btn-style-one" type="submit" name="submit-form" value="Submit"/>
                                </div>

                                <div id="validationErrors" class="form-group text-center">
                                </div>

                            </form>

                        </div>
                        <!-- End Contact Form -->

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
