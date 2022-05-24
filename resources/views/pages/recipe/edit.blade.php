@extends('layouts.main', ['search' => false])
@section('title', 'Edit recipe')

@section('page_title', 'Edit recipe')

@section('content')
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
                        <form method="POST" action="{{route('recipes.update', $recipe->id)}}" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-group mb-4">
                                <label>Recipe Title</label>
                                <input name="name" type="text" class="form-control" value="{{$recipe->name}}" required>
                            </div>
                            <div class="form-group mb-4">
                                <label>Recipe description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="4" required>{{$recipe->description}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label>Edit a image</label>
                                <input name="image" type="file" class="form-control-file">
                            </div>
                            <div class="form-group mb-4 .cbssss">
                                <label>Category</label>
                                <ul class="ks-cboxtags">
                                    @foreach($categories as $category)
                                        <li><input name="category_id[]" type="checkbox" id="category{{$category->id}}" value="{{$category->id}}"
                                                   @if($recipe->categories->contains($category))
                                                   checked
                                                @endif
                                            >
                                            <label for="category{{$category->id}}">{{$category->name}}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group mb-4">
                                        <label>Edit Steps</label>
                                        <div class="loadmore">
                                            @foreach($recipe->steps->sortBy('order') as $step)
                                                <textarea name="step[]" class="form-control load-item" id="exampleFormControlTextarea1" rows="3" required">{{$step->text}}</textarea>
                                            @endforeach
                                            <a href="#" class="load-more__btn addDirection">Add Field</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <label>Edit Ingredients</label>
                                        <table class="loadmore">
                                            @foreach($recipe->ingredients->sortBy('order') as $ingredient)
                                                <tr class="load-item">
                                                    <td>
                                                        <span>Ingredient Name</span>
                                                        <input name="ingredient_name[]" type="text" class="form-control" value="{{$ingredient->name}}" required>
                                                    </td>
                                                    <td>
                                                        <span>Ingredient Amount</span>
                                                        <input name="ingredient_amount[]" type="text" class="form-control" value="{{$ingredient->amount}}" required>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <a href="#" class="load-more__btn addIngredient">Add Field</a>
                                        <!-- <a class="btn btn-primary theme-btn load-more__btn" href="#." role="button">Add More</a> -->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <label>Edit Nutrition</label>
                                        <table class="loadmore">
                                            @foreach($recipe->nutritions->sortBy('order') as $nutrition)
                                                <tr class="load-item">
                                                    <td>
                                                        <span>Nutrition Name</span>
                                                        <input name="nutrition_name[]" type="text" class="form-control" value="{{$nutrition->name}}" required>
                                                    </td>
                                                    <td>
                                                        <span>Nutrition amount</span>
                                                        <input name="nutrition_amount[]" type="text" class="form-control" value="{{$nutrition->amount}}" required>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <a href="#" class="load-more__btn addNutrition">Add Field</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label>Servings</label>
                                        <input name="servings" type="number" class="form-control ingredients-number" id="myNumber" value="{{$recipe->servings}}" min="0" max="100">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label>Cook Time</label>
                                        <input name="cook_time" type="number" class="form-control ingredients-number m-0" id="myNumber" value="{{$recipe->cook_time}}" min="0" max="300">
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

    @if(session('user') && (session()->get('user')->id == $recipe->user_id || session()->get('user')->role_id == 1))

    <!-- Add recipe Start -->
    @else
        @php
            header("Location: " . route('home'), true, 302);
            exit();
        @endphp
    @endif
@endsection
