<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UpdateEmptySlugsInFoodItems extends Migration
{
    public function up()
    {
        
        $foodItems = DB::table('food_items')
            ->whereNull('slug') 
            ->orderBy('id')  
            ->get();

     
        foreach ($foodItems as $item) {
            DB::table('food_items')
                ->where('id', $item->id)
                ->update([
                    'slug' => Str::slug($item->name),
                ]);
        }
    }

    public function down()
    {
      
        DB::table('food_items')->update(['slug' => null]);
    }
}
