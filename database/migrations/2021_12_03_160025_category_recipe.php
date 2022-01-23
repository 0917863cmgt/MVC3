<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryRecipe extends Migration
{
    /**
     * Run the migrations.
     * Many to Many pivot table
     * @return void
     */
    public function up()
    {
        Schema::create('category_recipe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained('recipes', 'id');
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_recipe');
    }
}
