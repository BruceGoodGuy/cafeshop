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
        Schema::create('table_product_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('rating');
            $table->string('comment');
            $table->string('name');
            $table->string('email');
            $table->enum('status', ['waiting', 'approve', 'disapprove']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_product_feedbacks');
    }
};
