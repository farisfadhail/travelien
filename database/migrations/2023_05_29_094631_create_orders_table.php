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

            $table->date('date');
            $table->integer('ticket_amount');
            $table->string('payment_status');
            $table->string('snap_token')->nullable();
            $table->bigInteger('total_price');
            $table->foreignId('user_order_id')->constrained();
            $table->foreignId('spot_id')->constrained();

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
