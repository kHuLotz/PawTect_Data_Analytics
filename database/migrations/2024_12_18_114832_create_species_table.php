<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    public function up()
    {
        Schema::hasTable('species', function (Blueprint $table) {
            $table->id('species_id');
            $table->string('species_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('species');
    }
}