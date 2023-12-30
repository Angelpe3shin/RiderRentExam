<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\RentPoint;
use app\Models\Rent;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('rent_point_rent')) {
            Schema::create('rent_point_rent', function (Blueprint $table) {
                $table->id();
                $table->foreignId('rent_point_id')->constrained('rent_points')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('rent_id')->constrained('rents')->cascadeOnUpdate()->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }
    
    public function down(): void {
        Schema::dropIfExists('rent_point_rent');
    }
};
