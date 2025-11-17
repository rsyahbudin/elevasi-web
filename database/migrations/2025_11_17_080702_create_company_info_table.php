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
        Schema::create('company_info', function (Blueprint $table) {
             $table->id();
            $table->string('company_name', 150);
            $table->string('short_description', 255)->nullable();
            $table->text('full_description'); // text cukup
            $table->text('vision');
            $table->text('mission');
            $table->string('address', 255);
            $table->string('phone', 30);
            $table->string('email', 100);
            $table->string('instagram', 150)->nullable();
            $table->string('legalitas', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
