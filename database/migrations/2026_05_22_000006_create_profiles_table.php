<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name')->default('Bilqis');
            $table->string('brand_accent')->default('portofolio');
            $table->string('owner_name')->default('Bilqis Najiha Zahra');
            $table->string('hero_eyebrow')->default('Multimedia Broadcasting');
            $table->text('hero_description');
            $table->string('about_heading');
            $table->string('avatar_initials', 6)->nullable();
            $table->string('avatar_image')->nullable();
            $table->text('profile_summary');
            $table->string('story_title')->default('Cerita Singkat');
            $table->longText('story_text');
            $table->json('interests')->nullable();
            $table->string('footer_name')->default('BilqisStudio');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
