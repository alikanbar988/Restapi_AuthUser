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
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id();
            $table->Integer('CARD NUMBER');
            $table->string('NAME ON CARD');
            $table->date('EXPIRY DATE')->format('d/m/YYYY');
            $table->string('CVV', 4);
            $table->timestamps();
            //$table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentmethods');
    }
};
