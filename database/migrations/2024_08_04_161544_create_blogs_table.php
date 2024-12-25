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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('blog_title');
            $table->text('blog_short_desc')->nullable();
            $table->text('blog_long_desc');
            $table->text('blog_image')->nullable();
            $table->text('blog_author')->nullable();
            $table->text('blog_author_img')->nullable();
            $table->date('blog_date')->nullable();
            $table->tinyInteger('status')->default(1);
            
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
