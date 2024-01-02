<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        if (!Schema::hasTable('rent_points_infos')) {
            Schema::create('rent_points_infos', function (Blueprint $table) {
                $table->id();
                $table->string('main_img_url');
                $table->text('info');
                $table->timestamps();
            });
        }
    }

    public function down() {
        Schema::dropIfExists('rent_points_infos');
    }
};
