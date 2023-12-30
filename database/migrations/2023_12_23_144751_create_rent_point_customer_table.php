<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('rent_point_customer')) {
            Schema::create('rent_point_customer', function (Blueprint $table) {
                $table->id();
                $table->foreignId('rent_point_id')->constrained('rent_points')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('customer_id')->constrained('customers')->cascadeOnUpdate()->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('rent_point_customer');
    }
};
