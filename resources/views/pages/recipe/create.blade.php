@extends('layouts.main', ['search' => false])
@section('title', 'Add recipe')

@section('page_title', 'Add recipe')

@section('content')
    @if(!session()->has('user'))
        <h1 class="text-center mt-5">Only users can add recipes, please <a href="{{route('login')}}">sing in</a> or <a href="{{route('register')}}">register</a></h1>
    @else

        <section class="add-recipe-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="add-recipe-col">
                            @if(session()->has('errorMessage'))
                                {{session('errorMessage')}}
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

                            @if(session()->has('success'))
                                <h2>{{session('success')}}</h2>
                                        <br>
                                        <br>
                            @endif
                            <h4>Please fill up all fields for submit a recipe</h4>
                            <form method="POST" action="{{route('recipes.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-4">
                                    <label>Recipe Title</label>
                                    <input name="name" type="text" class="form-control" placeholder="Example: Hamburger Steak with Onions" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label>recipe description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Write Here..." required></textarea>
                                </div>
                                <div class="form-group mb-4">
                                    <label>Add a image</label>
                                    <input name="image" type="file" class="form-control-file">
                                </div>
                                <div class="form-group mb-4 .cbssss">
                                    <label>Category</label>
                                    <ul class="ks-cboxtags">
                                        @foreach($categories as $category)
                                            <li><input name="category_id[]" type="checkbox" id="category{{$category->id}}" value="{{$category->id}}">
                                                <label for="category{{$category->id}}">{{$category->name}}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label>Add Steps</label>
                                            <div class="loadmore">
                                                <textarea name="step[]" class="form-control load-item" id="exampleFormControlTextarea1" rows="3" placeholder="Write Here..." required></textarea>
                                                <a href="#" class="load-more__btn addDirection">Add Field</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label>Add Ingredients</label>
                                            <table class="loadmore">
                                                <tr class="load-item">
                                                    <td>
                                                        <span>Ingredient Name</span>
                                                        <input name="ingredient_name[]" type="text" class="form-control" placeholder=" " required>
                                                    </td>
                                                    <td>
                                                        <span>Ingredient Amount</span>
                                                        <input name="ingredient_amount[]" type="text" class="form-control" placeholder=" " required>
                                                    </td>
                                                </tr>
                                            </table>
                                            <a href="#" class="load-more__btn addIngredient">Add Field</a>
                                            <!-- <a class="btn btn-primary theme-btn load-more__btn" href="#." role="button">Add More</a> -->
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label>Add Nutrition</label>
                                            <table class="loadmore">
                                                <tr class="load-item">
                                                    <td>
                                                        <span>Nutrition Name</span>
                                                        <input name="nutrition_name[]" type="text" class="form-control" placeholder=" " required>
                                                    </td>
                                                    <td>
                                                        <span>Nutrition amount</span>
                                                        <input name="nutrition_amount[]" type="text" class="form-control" placeholder=" " required>
                                                    </td>
                                                </tr>
                                            </table>
                                            <a href="#" class="load-more__btn addNutrition">Add Field</a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-4">
                                            <label>Servings</label>
                                            <input name="servings" type="number" class="form-control ingredients-number" id="myNumber" value="0" min="0" max="100">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-4">
                                            <label>Cook Time</label>
                                            <input name="cook_time" type="number" class="form-control ingredients-number m-0" id="myNumber" value="0" min="0" max="300">
                                            <span>Minutes</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary theme-btn btn-style-one" type="submit"><span>Submit Recipe</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Add recipe Start -->
@endsection
