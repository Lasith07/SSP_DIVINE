<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
  
    public function index()
    {
        return view('checkout');
    }


    public function store(Request $request)
    {

        $cart = session()->get('cart', []);

        if (count($cart) > 0) {
     
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, $cart)),
                'status' => 'pending',
            ]);

        
            foreach ($cart as $id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'food_item_id' => $id,
                    'name' => $details['name'],
                    'price' => $details['price'],
                    'quantity' => $details['quantity'],
                ]);
            }

         
            session()->forget('cart');

  
            return redirect()->route('checkout')->with('success', 'Checkout complete! Your order has been placed successfully.')->with('order_id', $order->id);
        }


        return redirect()->route('cart')->with('error', 'Your cart is empty!');
    }
}
