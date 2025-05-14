<?php
namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
     
        $cart = session()->get('cart', []);


        return view('cart', compact('cart'));
    }


    public function add($id)
{

    $item = FoodItem::find($id);

    if (!$item) {
        return redirect()->route('menu')->with('error', 'Item not found!');
    }


    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $item->name,
            'price' => $item->price,
            'image_url' => $item->image_url,
            'quantity' => 1,
        ];
    }

    session()->put('cart', $cart);


    return redirect()->route('menu')->with('success', 'Item added to cart!');
}


    public function remove($id)
    {

        $cart = session()->get('cart', []);


        if (isset($cart[$id])) {
            unset($cart[$id]);
        }


        session()->put('cart', $cart);


        return redirect()->route('cart')->with('success', 'Item removed from cart!');
    }


    public function clear()
    {

        session()->forget('cart');


        return redirect()->route('menu')->with('success', 'Cart has been cleared!');
    }
}
