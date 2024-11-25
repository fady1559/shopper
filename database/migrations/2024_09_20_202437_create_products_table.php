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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('short_description');
            $table->longText('description');
            $table->string('price');
            $table->string('selling_price');
            $table->string('image')->nullable();
            $table->string('qty');
            $table->string('tax');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trend')->default(0);
            $table->string('meta_title');
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->foreignId('subcategory_id')->constrained('subcategories');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
