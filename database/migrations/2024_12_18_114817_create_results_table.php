<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    public function up()
    {
        Schema::hasTable('results', function (Blueprint $table) {
            $table->id('results_id');
            $table->string('results_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('results');
    }
}