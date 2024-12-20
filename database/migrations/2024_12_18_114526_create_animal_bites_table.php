<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalBitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::hasTable('animal_bites', function (Blueprint $table) {
            $table->id('animalbite_id');
            $table->date('bite_date');
            $table->foreignId('victim_id')->constrained('victims');
            $table->foreignId('wherebitten_id')->constrained('bite_locations');
            $table->foreignId('species_id')->constrained('species');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('color_id')->constrained('colors');
            $table->foreignId('clinic_id')->constrained('clinics');
            $table->foreignId('results_id')->constrained('results');
            $table->foreignId('disposition_id')->constrained('dispositions');
            $table->date('head_Sent_date')->nullable();
            $table->date('quarantine_date')->nullable();
            $table->date('release_date')->nullable();

            // Foreign Key Constraints
            $table->foreign('victim_id')->references('victim_id')->on('victim');
            $table->foreign('wherebitten_id')->references('wherebitten_id')->on('bite_location');
            $table->foreign('species_id')->references('species_id')->on('species');
            $table->foreign('gender_id')->references('gender_id')->on('gender');
            $table->foreign('color_id')->references('color_id')->on('color');
            $table->foreign('clinic_id')->references('clinic_id')->on('clinic');
            $table->foreign('results_id')->references('results_id')->on('results');
            $table->foreign('disposition_id')->references('disposition_id')->on('disposition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_bites');
    }
}
