<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 150);
            $table->string('position', 100)->nullable();
            $table->string('company', 150)->nullable();
            $table->text('caption');
            $table->string('photo', 255)->nullable();
            $table->integer('rating')->nullable(); // 1–5
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
