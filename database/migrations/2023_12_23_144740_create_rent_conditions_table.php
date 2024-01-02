<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        if (!Schema::hasTable('rent_points_conditions')) {
            Schema::create('rent_points_conditions', function (Blueprint $table) {
                $table->id();
                $table->text('rules');
                $table->text('prohibitions');
                $table->text('responsibilities');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rent_points_conditions');
    }
};
