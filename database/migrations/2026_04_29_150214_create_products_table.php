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
            $table->string('status')->comment('active,inactive')->default('active');
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('subcat_id')->nullable();
            $table->double('regular_price');
            $table->double('discount_price')->nullable();
            $table->double('buying_price');
            $table->integer('qty');
            $table->string('sku_code')->unique()->nullable();
            $table->string('product_type');
            $table->longText('description');
            $table->longText('product_policy')->nullable();
            $table->string('image');
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
