<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangaysTable extends Migration
{
     public function up()
    {
        Schema::hasTable('barangay', function (Blueprint $table) {
            $table->id('brgy_id');
            $table->string('brgy_name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('barangay');
    }
}
