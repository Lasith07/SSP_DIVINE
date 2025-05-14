<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToFoodItemsTable extends Migration
{
    public function up()
    {
        
        if (!Schema::hasColumn('food_items', 'slug')) {
            Schema::table('food_items', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('name'); 
            });
        }
    }

    public function down()
    {
        Schema::table('food_items', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
