<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\Brand;
use app\Models\Engine;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('moto_models')) {
            Schema::create('moto_models', function (Blueprint $table) {
                $table->id();
                $table->foreignId('brand_id')->constrained('brands')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('engine_id')->constrained('engines')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('name');
                $table->year('release_start_year');
                $table->year('release_end_year');
                $table->integer('weight');
                $table->string('description');
                $table->string('image_url');
                $table->decimal('price', $precision = 8, $scale = 2);
                $table->string('price_currency');
                $table->integer('fuel_tank_capacity');
                $table->enum('fuel_tank_capacity_type', ['l', 'kW']);
                $table->integer('max_speed');
                $table->enum('type', ['Street', 'Cruiser', 'Sport', 'Touring', 'Enduro', 'Chopper', 'Adventure', 'Scooter', 'Electric']);
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('moto_models');
    }
};
