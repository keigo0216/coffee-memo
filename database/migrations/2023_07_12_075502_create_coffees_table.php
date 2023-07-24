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
           $table->foreignId('brewing_method_id')->nullable();
           $table->foreignId('country_id')->nullable()->nullable();
           $table->foreignId('way_to_drink_id')->nullable();
           $table->timestamps();
           $table->string('name')->nullable();
           $table->integer('evaluation')->nullable();
           $table->string('shop')->nullable();
           $table->integer('roast_level')->nullable();
           $table->integer('scent_level')->nullable();
           $table->integer('bitterness_level')->nullable();
           $table->integer('acidity_level')->nullable();
           $table->integer('sweetness_level')->nullable();
           $table->integer('clearness_level')->nullable();
           $table->integer('rich_level')->nullable();
           $table->integer('aftertaste_level')->nullable();
           $table->integer('aftercooled_level')->nullable();
           $table->string('note')->nullable();
           $table->string('img')->nullable();
           $table->string('date')->nullable();
           $table->string('farm')->nullable();
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
