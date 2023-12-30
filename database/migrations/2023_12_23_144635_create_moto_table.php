<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\MotoModel;
use app\Models\Color;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('motos')) {
            Schema::create('motos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('moto_model_id')->constrained('moto_models')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('color_id')->constrained('colors')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('name');
                $table->year('production_year');
                $table->float('mileage', 8, 2);
                $table->decimal('base_rent_price', $precision = 8, $scale = 2);
                $table->string('base_rent_currency');
                $table->enum('status', ['free', 'occupied', 'unavailable']);
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('motos');
    }
};
