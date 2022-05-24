<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ["name", "description", "image", "servings", "cook_time", "user_id"];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }

    public function steps(){
        return $this->hasMany(Step::class);
    }

    public function nutritions(){
        return $this->hasMany(Nutrition::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
