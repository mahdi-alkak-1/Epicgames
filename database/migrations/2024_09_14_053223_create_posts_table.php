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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('available_at')->nullable();//for coming soon cat
            $table->text('description')->nullable();//for free to play and pay to play cat
            $table->decimal('price', 8, 2)->nullable();//for pay to play cat
            $table->string('image');
            $table->unsignedBigInteger('category_id');  //to link category 
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
