<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('discounts')) {
            Schema::create('discounts', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('value');
                $table->string('promo_code');
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('discounts');
    }
};
