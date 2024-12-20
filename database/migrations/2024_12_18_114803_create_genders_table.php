<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    public function up()
    {
        Schema::hasTable('gender', function (Blueprint $table) {
            $table->id('gender_id');
            $table->string('gender_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gender');
    }
}
