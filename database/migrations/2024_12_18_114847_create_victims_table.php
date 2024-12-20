<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVictimsTable extends Migration
{
   public function up()
    {
        Schema::hasTable('victim', function (Blueprint $table) {
            $table->id('victim_id');
            $table->string('victim_fullname');
            $table->date('victim_birthdate');
            $table->enum('victim_gender', ['Male', 'Female']);
            $table->foreignId('brgy_id');

            // Foreign Key Constraint
            $table->foreign('brgy_id')->references('brgy_id')->on('barangay')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('victim');
    }
}