<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->morphs('orderable');
            $table->string('name');
            $table->string('phone');
            $table->text('comment')->nullable();
            $table->text('comment_admin')->nullable();
            $table->enum('status', [
               'process',
               'working',
               'retention',
               'closed',
            ])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
