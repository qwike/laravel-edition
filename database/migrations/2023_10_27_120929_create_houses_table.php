<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('capacity');
            $table->text('description')->nullable();
            $table->unsignedDecimal('price');
            $table->enum('unit', [
                'rub5minutes',
                'rub10minutes',
                'rub30minutes',
                'rub1hour',
                'rub2hours',
                'rub3hours',
                'rub6hours',
                'rub8hours',
                'rub12hours',
                'rub16hours',
                'rub1day',
                'rub3day',
                'rub1week',
            ]);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
