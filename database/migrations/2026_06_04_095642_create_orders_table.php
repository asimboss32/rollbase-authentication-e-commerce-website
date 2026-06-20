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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('invoice_number');
            $table->string('name')->nullable();
            $table->string('phone');
            $table->double('price');
            $table->Text('address')->nullable();
            $table->integer('charge');
            $table->string('courier_name')->nullable();
            $table->string('status')->default('pending')->comment('pending,confirmed,delivered,cancelled,returned');
            $table->string('tracking_code')->nullable();
            $table->string('consignment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
