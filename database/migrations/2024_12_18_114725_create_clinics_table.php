<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    public function up()
    {
        Schema::hasTable('clinic', function (Blueprint $table) {
            $table->id('clinic_id');
            $table->string('clinic_name');
            $table->string('contact_number')->nullable();
            $table->foreignId('brgy_id');

            // Foreign Key Constraint
            $table->foreign('brgy_id')->references('brgy_id')->on('barangay')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('clinic');
    }
}