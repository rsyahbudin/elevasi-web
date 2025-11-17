<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained('project_categories')
                ->cascadeOnDelete();

            $table->foreignId('client_id')
                ->nullable()
                ->constrained('clients')
                ->nullOnDelete();

            $table->string('title', 150);
            $table->string('slug', 180)->unique();

            $table->text('description');  
            $table->string('location', 200)->nullable();
            $table->date('project_date')->nullable();

            $table->string('featured_image', 255);
            $table->json('gallery')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
