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
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->text('mobile_logo')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('phone');
            $table->string('phone_optional')->nullable();
            $table->string('email');
            $table->string('email_optional')->nullable();
            $table->text('address');
            $table->text('address_optional')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('youtube')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('instagram')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->text('google_analytics')->nullable();

            // Google map
            $table->text('google_map')->nullable();

            //footer
            $table->text('footer_logo')->nullable();
            $table->text('footer_text')->nullable();
            
            // meta
            $table->text('favicon')->nullable();
            $table->text('meta_image')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();

            // counter
            $table->string('room_number')->nullable();
            $table->string('room_title')->nullable();
            $table->string('room_icons')->nullable();
            $table->string('doctor_icons')->nullable();
            $table->string('doctor_title')->nullable();
            $table->string('doctor_number')->nullable();
            $table->string('patient_icons')->nullable();
            $table->string('patient_title')->nullable();
            $table->string('patient_number')->nullable();
            $table->string('experience_icons')->nullable();
            $table->string('experience_title')->nullable();
            $table->string('experience_number')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_infos');
    }
};