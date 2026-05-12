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
        Schema::create('website_policies', function (Blueprint $table) {
            $table->id();
            $table->longText('privacy_policy');
            $table->longText('terms_conditions');
            $table->longText('refund_policy');
            $table->longText('payment_policy');
            $table->longText('about_us');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_policies');
    }
};
