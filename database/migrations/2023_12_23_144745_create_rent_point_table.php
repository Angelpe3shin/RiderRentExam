<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\Address;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('rent_points')) {
            Schema::create('rent_points', function (Blueprint $table) {
                $table->id();
                $table->foreignId('address_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('rent_points_conditions_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('rent_points_infos_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('point_name')->unique();
                $table->text('payment_conditions');
                $table->timestamps();
            });
        }
    }
    
    public function down(): void {
        Schema::dropIfExists('rent_points');
    }
};
