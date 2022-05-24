<!-- Product Form Section -->
<section class="product-form-section">
    <div class="auto-container">
        <div class="inner-container margin-top">

            <!-- Default Form -->
            <div class="default-form">
                <form method="GET" action="{{route('recipes.index')}}">
                    <div class="clearfix">

                        <!-- Form Group -->
                        <div class="form-group col-lg-3 col-md-6 col-sm-12">
                            <select name="category" class="custom-select-box">
                                <option value="0">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-7 col-md-6 col-sm-12">
                            <input type="text" name="keyword" placeholder="Recipe Kayword">
                        </div>

                        <div class="form-group col-lg-2 col-md-12 col-sm-12">
                            <button type="submit" class="theme-btn search-btn"><span class="fa fa-search"> Search</span></button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- End Keyword Section -->
