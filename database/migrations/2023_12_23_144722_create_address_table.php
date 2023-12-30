<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Models\Country;

return new class extends Migration {
    public function up(): void {
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('country_id')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('street');
                $table->string('house_number');
                $table->string('zip_code');
                $table->string('city');
                $table->timestamps();
            });
        }
    }
    
    public function down(): void {
        Schema::dropIfExists('addresses');
    }    
};
