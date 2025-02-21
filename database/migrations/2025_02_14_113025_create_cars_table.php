<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // Car Name
            $table->string('brand');                        // Brand
            $table->string('model');                        // Model
            $table->integer('year');                        // Year of Manufacture
            $table->string('car_type');                     // Car Type (SUV, Sedan, etc.)
            $table->decimal('daily_rent_price', 8, 2);      // Daily Rent Price
            $table->boolean('availability')->default(true); // Availability (boolean)
            $table->string('image')->nullable();            // Car Image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
