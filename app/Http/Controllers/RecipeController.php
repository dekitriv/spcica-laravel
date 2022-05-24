<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Nutrition;
use App\Models\Recipe;
use App\Models\Step;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class RecipeController extends MyController
{

    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $recipes = Recipe::with('ingredients', 'steps', 'nutritions', 'categories', 'user')
            ->whereHas('categories', function($query) use ($request){
                if($request->category){
                    $query->where('category_id', '=', $request->category);
                }
            })->where(function($query) use ($keyword){
                $query->whereRaw('lower(name) like lower(?)', ["%{$keyword}%"])
                    ->orWhereRaw('lower(description) like lower(?)', ["%{$keyword}%"]);
            });

        if($request->ajax()){
            return json_encode($recipes->get());
        }
        $recipes = $recipes->paginate('8')->withQueryString();
        $this->data['recipes'] = $recipes;
        return view('pages.recipe.recipes', $this->data);

    }

    public function create()
    {
        $this->data['categories'] = Category::all();
        return view ('pages.recipe.create', $this->data);
    }

    public function store(AddRecipeRequest $request)
    {

        DB::beginTransaction();
        try
        {

            $image = $request->file("image");
            $image_name = uniqid() . "_" . time() . "." . $image->extension();
            $resizedImage = Image::make($image->getRealPath());
            $resizedImage->resize(1200, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path("/storage/recipes/") . $image_name);

            $recipe = Recipe::create($request->except("image") + ["image" => $image_name, "user_id" => session()->get('user')->id]);
            $recipe->categories()->attach($request->category_id);

            foreach ($request->ingredient_name as $index=>$item){
                $ingredient = Ingredient::create([
                    "name" => $item,
                    "amount" => $request->ingredient_amount[$index],
                    "order" => $index+1,
                    "recipe_id" => $recipe->id
                ]);
            }
            foreach ($request->nutrition_name as $index=>$item){
                $nutrition = Nutrition::create([
                    "name" => $item,
                    "amount" => $request->nutrition_amount[$index],
                    "order" => $index+1,
                    "recipe_id" => $recipe->id
                ]);
            }
            foreach ($request->step as $index=>$item){
                $step = Step::create([
                    "text" => $item,
                    "order" => $index+1,
                    "recipe_id" => $recipe->id
                ]);
            }

            DB::commit();

            $email = $request->session()->get("user")->email;
            $content = $request->ip()."\t".$request->url()."\t".$request->method()."\t".$email."\t"."New recipe was added"."\t".date("Y-m-d H:i:s");
            $write = new User();
            $write->log($content);


            return redirect()->route('recipes.create')->with('success', 'You have successfully added a recipe!');
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('recipes.create')->with('errorMessage', $e->getMessage());
        }
    }

    public function show(Recipe $recipe)
    {
        $this->data["recipe"] =  $recipe->with('ingredients', 'steps', 'nutritions', 'categories', 'user')->find($recipe->id);
        return view('pages.recipe.show', $this->data);
    }

    public function edit(Recipe $recipe)
    {
        $this->data['recipe'] = Recipe::with('ingredients', 'steps', 'nutritions', 'categories')->find($recipe->id);
        return view('pages.recipe.edit', $this->data);
    }

    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        try
        {
            if($request->image){
                $image = $request->file("image");
                $image_name = uniqid() . "_" . time() . "." . $image->extension();
                $resizedImage = Image::make($image->getRealPath());
                $resizedImage->resize(1200, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path("/storage/recipes/") . $image_name);
                $recipe->image = $image_name;
                $recipe->save();
            }


            $recipe->categories()->sync($request->category_id);

            foreach ($request->ingredient_name as $index=>$item){
                $ingredient = Ingredient::where("recipe_id", $recipe->id)
                    ->where("order", $index+1)
                    ->first();
                if($ingredient){
                    $ingredient->name = $item;
                    $ingredient->amount = $request->ingredient_amount[$index];
                    $ingredient->save();
                    continue;
                }
                Ingredient::create([
                    "name" => $item,
                    "amount" => $request->ingredient_amount[$index],
                    "order" => $index+1,
                    "recipe_id" => $recipe->id
                ]);
            }
            foreach ($request->nutrition_name as $index=>$item){
                $nutrition = Nutrition::where("recipe_id", $recipe->id)
                    ->where("order", $index+1)
                    ->first();
                if($nutrition){
                    $nutrition->name = $item;
                    $nutrition->amount = $request->nutrition_amount[$index];
                    $nutrition->save();
                    continue;
                }

                Nutrition::create([
                    "name" => $item,
                    "amount" => $request->nutrition_amount[$index],
                    "order" => $index+1,
                    "recipe_id" => $recipe->id
                ]);
            }
            foreach ($request->step as $index=>$item){
                $step = Step::where("recipe_id", $recipe->id)
                            ->where("order", $index+1)
                            ->first();
                if($step){
                    $step->text = $item;
                    $step->save();
                    continue;
                }

                Step::create([
                    "text" => $item,
                    "order" => $index+1,
                    "recipe_id" => $recipe->id
                ]);
            }

            Recipe::find($recipe->id)->update($request->except("image", "_token"));

            DB::commit();

            return redirect()->route('recipes.edit', $recipe->id)->with('success', 'You have successfully updated a recipe!');
        }
        catch(\Exception $e)
        {
            return redirect()->route('recipes.edit', $recipe->id)->with('errorMessage', $e->getMessage());
        }
    }

    public function destroy(Recipe $recipe)
    {
        if(Recipe::destroy($recipe->id)){
            return "Successfully deleted";
        }
        return "Error";
    }
}
