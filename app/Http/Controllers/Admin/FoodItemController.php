<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodItem;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class FoodItemController extends Controller
{
    
    public function index()
    {
        $foodItems = FoodItem::all();
        return view('admin.panel', compact('foodItems'));
    }

    public function create()
    {
        return view('admin.panel'); 
    }

  
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
        $slug = Str::slug($request->name);

        
        $imagePath = $request->file('image')->store('images', 'public');

        
        FoodItem::create([
            'name' => $request->name,
            'price' => $request->price,
            'image_url' => $imagePath, 
            'slug' => $slug,  
        ]);

        return redirect()->route('admin.panel.index')->with('success', 'Food item created successfully.');
    }

 
   public function edit(FoodItem $foodItem)
{
    $foodItems = FoodItem::all(); // load all to pass to the view
    return view('admin.panel', compact('foodItem', 'foodItems'));
}

   
    public function update(Request $request, FoodItem $foodItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $foodItem->image_url = $imagePath; 
        }

        $foodItem->name = $request->name;
        $foodItem->price = $request->price;
        $foodItem->save();

        return redirect()->route('admin.panel.index')->with('success', 'Food item updated successfully.');
    }

    
    public function destroy(FoodItem $foodItem)
    {
        $foodItem->delete();
        return redirect()->route('admin.panel.index')->with('success', 'Food item deleted successfully.');
    }

   
    public function show($id)
    {
        $foodItem = FoodItem::findOrFail($id);
        return view('menu-item', compact('foodItem'));
    }
}

