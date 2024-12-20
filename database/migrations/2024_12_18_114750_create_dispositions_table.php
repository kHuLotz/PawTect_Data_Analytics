<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispositionsTable extends Migration
{
    public function up()
    {
        Schema::hasTable('disposition', function (Blueprint $table) {
            $table->id('disposition_id');
            $table->string('disposition_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disposition');
    }
}
