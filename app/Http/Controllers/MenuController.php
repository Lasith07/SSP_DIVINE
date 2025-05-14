<?php
namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        
        $foodItems = FoodItem::paginate(10); 

        
        return view('menu', compact('foodItems'));
    }

    public function show($slug)
    {
        
        $foodItem = FoodItem::where('slug', $slug)->firstOrFail();

        
        return view('menu-item', compact('foodItem'));
    }
}
