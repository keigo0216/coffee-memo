<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coffees', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->foreignId('brewing_method_id');
           $table->foreignId('country_id');
           $table->foreignId('way_to_drink_id');
           $table->timestamps();
           $table->string('name');
           $table->integer('evaluation');
           $table->string('shop');
           $table->integer('roast_level');
           $table->integer('scent_level');
           $table->integer('bitterness_level');
           $table->integer('acidity_level');
           $table->integer('sweetness_level');
           $table->integer('clearness_level');
           $table->integer('rich_level');
           $table->integer('aftertaste_level');
           $table->integer('aftercooled_level');
           $table->string('note');
           $table->string('img');
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffees');
    }
};
