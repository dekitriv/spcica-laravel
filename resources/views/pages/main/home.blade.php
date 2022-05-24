@extends('layouts.main', ['search' => true])

@section('title', 'Home')

@section('page_title', 'Find your favourite recipe')

@section('content')


<!-- Categories Section-->
<section class="categories-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2> Recipe Categories</h2>
            <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed tincidunt ut laoreet <br> dolore magna aliquam erat volutpat lorem</div>
        </div>

        <!-- Categories Tabs -->
        <div class="categories-tab">

            <div class="tab-btns-box">
                <!--Tabs Header-->
                <div class="tabs-header">
                    <ul class="product-tab-btns clearfix">
                        @foreach($categories as $category)
                            <li class="p-tab-btn @if($loop->index == 0) active-btn @endif" data-id="{{$category->id}}" data-tab="#p-tab">{{$category->name}} <span class="number">{{$category->recipes->count()}}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Tabs Content -->
            <div class="p-tabs-content">
                <div class="p-tab active-tab" id="p-tab">
                    <div id="carousel" class="project-carousel owl-theme owl-carousel">

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Categories Section-->


    </div>

    <!--End pagewrapper-->
@endsection
