<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FontendController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        View::share('categories',$categories);
    }
}
