<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends MyController
{
    public function index()
    {
        $this->data["recipes"] = Recipe::all();
        return view('pages.main.home', $this->data);
    }
}
