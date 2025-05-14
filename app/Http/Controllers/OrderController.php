<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Fetch all orders
    public function index()
    {
        return Order::all();  // Return all orders as JSON
    }

    // Fetch a specific order by its ID
    public function show($id)
    {
        return Order::findOrFail($id);  // Return a single order by its ID
    }

    // Create a new order
    public function store(Request $request)
    {
        // Validation (optional but recommended)
        $request->validate([
            'food_item_id' => 'required|exists:food_items,id', // Assuming food_items is the related table
            'quantity' => 'required|integer|min:1',
        ]);

        // Create the new order
        $order = Order::create([
            'food_item_id' => $request->food_item_id,
            'quantity' => $request->quantity,
            'user_id' => $request->user_id,  // Assuming you want to track the user creating the order
            'status' => 'pending',  // Default status
        ]);

        // Return the created order as JSON
        return response()->json($order, 201);  // 201 is the HTTP status code for "created"
    }

    // Update an existing order by ID
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Validation (optional but recommended)
        $request->validate([
            'food_item_id' => 'required|exists:food_items,id', // Assuming food_items is the related table
            'quantity' => 'required|integer|min:1',
        ]);

        // Update the order
        $order->update([
            'food_item_id' => $request->food_item_id,
            'quantity' => $request->quantity,
            'status' => $request->status, // Assuming status is updatable
        ]);

        // Return the updated order as JSON
        return response()->json($order, 200);  // 200 is the HTTP status code for "OK"
    }

    // Delete an order by ID
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Delete the order
        $order->delete();

        // Return a 204 No Content response
        return response()->json(null, 204);  // 204 is the HTTP status code for "No Content"
    }
}
