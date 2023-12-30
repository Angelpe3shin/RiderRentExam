<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        if (!Schema::hasTable('engines')) {
            Schema::create('engines', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->year('production_start_year');
                $table->year('production_end_year');
                $table->float('capacity');
                $table->enum('fuel_type', ['petrol', 'diesel', 'electro', 'hybrid']);
                $table->timestamps();
            });
        }
    }

    public function down(): void {
        Schema::dropIfExists('engines');
    }
};
