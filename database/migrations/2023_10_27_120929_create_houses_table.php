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
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->enum('unit', [
                'rub30minutes',
                'rub1hour',
                'rub2hours',
                'rub3hours',
                'rub6hours',
                'rub8hours',
                'rub12hours',
                'rub16hours',
                'rub1day',
            ]);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
