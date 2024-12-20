<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    public function up()
    {
        Schema::hasTable('color', function (Blueprint $table) {
            $table->id('color_id');
            $table->string('color_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('color');
    }
}
