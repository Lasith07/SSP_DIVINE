<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('order_items', function (Blueprint $table) {
        $table->id(); // Auto-incrementing primary key
        $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to orders table
        $table->foreignId('food_item_id')->constrained()->onDelete('cascade'); // Foreign key to food_items table
        $table->string('name'); // Name of the food item
        $table->decimal('price', 8, 2); // Price of the food item
        $table->integer('quantity'); // Quantity of the item
        $table->timestamps(); // Created at and updated at columns
    });
}

};
