<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiteLocationsTable extends Migration
{
    public function up()
    {
        Schema::hasTable('bite_location', function (Blueprint $table) {
            $table->id('wherebitten_id');
            $table->string('bodypart_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bite_location');
    }
}