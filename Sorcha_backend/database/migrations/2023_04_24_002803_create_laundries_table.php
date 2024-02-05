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
        Schema::create('laundries', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained(); // foreign key to users table
            $table->foreignId('shop_id')->constrained(); // foreign key to shops table
            $table->double('weight');
            $table->text('pickup_address')->nullable();
            $table->text('delivery_address')->nullable();
            $table->double('total')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundries');
    }
};
