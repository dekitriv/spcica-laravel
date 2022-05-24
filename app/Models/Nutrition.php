<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;

    protected $table = 'nutritions';
    protected $guarded = ['id'];

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }
}