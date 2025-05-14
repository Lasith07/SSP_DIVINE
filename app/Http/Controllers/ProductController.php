<?php
namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $foodItems = FoodItem::all();

        // Loop through the food items and update the image URL
        foreach ($foodItems as $foodItem) {
            // Make sure to generate the full URL for the image
            $foodItem->image_url = asset('storage/' . $foodItem->image_url);
        }

        return response()->json($foodItems);  // Return the food items with updated image_url
    }

    public function show($id)
    {
        $foodItem = FoodItem::findOrFail($id);

        // Update the image URL for the specific food item
        $foodItem->image_url = asset('storage/' . $foodItem->image_url);

        return response()->json($foodItem);  // Return the specific food item with updated image_url
    }
}
