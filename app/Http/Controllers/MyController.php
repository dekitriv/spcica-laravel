<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public $data;

    public function __construct(){
        $this->data["menu"] = Menu::all();
        $this->data["categories"] = Category::with('recipes')->get();
    }
}
