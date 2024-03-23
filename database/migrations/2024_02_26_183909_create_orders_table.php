<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("phone");
            $table->string("date");
            $table->string("time");
            $table->foreignId("meal_id")->constrained();
            $table->integer('qty')->default(0);
            $table->text('adress');
            $table->enum("status", ['Refuse', 'Confirmed', 'Pending'])->default("Pending");
            $table->foreignId('user_id')->constrained();
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
