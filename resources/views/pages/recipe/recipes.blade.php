@extends('layouts.main', ['search' => true])
@section('title', 'Recipes')

@section('page_title', 'Recipes')
@section('content')
    <!-- Popular Recipes Section -->
    <section class="popular-recipes-section style-three">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2>Popular Recipes Posts</h2>
                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed tincidunt ut</div>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('recipes.index')}}" class="theme-btn btn-style-one"><span class="txt">See all Post</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="outer-container">
            <div class="row clearfix">

                <!-- Recipes Block -->
                @foreach($recipes as $recipe)
                <div class="recipes-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('recipes.show', $recipe->id)}}"><img src="{{asset("storage/recipes/$recipe->image")}}" alt="{{$recipe->name}}" /></a>
                        </div>
                        <div class="lower-content">
                            <div class="category">
                                @foreach($recipe->categories as $category)
                                    {{$category->name }}
                                @endforeach
                            </div>
                            <h4><a href="{{route('recipes.show', $recipe->id)}}">{{$recipe->name}}</a></h4>
                            <div class="text">{{$recipe->description}}</div>
                            <ul class="post-meta">
                                <li><span class="icon flaticon-dish"></span>{{$recipe->ingredients->count()}} {{$recipe->ingredients->count() == 1 ? 'Ingredient' : 'Ingredients'}}</li>
                                <li><span class="icon flaticon-clock-3"></span>{{$recipe->cook_time}} Mins</li>
                                <li><span class="icon flaticon-business-and-finance"></span>{{$recipe->servings}} People</li>
                            </ul>
                            <div class="text">Author: {{$recipe->user->first_name}} {{$recipe->user->last_name}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$recipes->links()}}
        </div>
    </section>
    <!-- End Popular Recipes Section -->
@endsection
