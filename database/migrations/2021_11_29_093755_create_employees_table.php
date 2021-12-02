<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();              
            $table->string('title_id')->nullable();
            $table->string('name')->nullable();
            $table->string('habeas_data')->nullable();
            $table->string('identification_card')->nullable();
            $table->string('expedition_date')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('gender_id')->nullable();
            $table->string('telephone')->nullable();
            $table->string('address')->nullable();
            $table->string('municipality')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('type_housing')->nullable();
            $table->string('stratum')->nullable();
            $table->string('email')->nullable();
            $table->string('rh')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('number_children')->nullable();
            $table->string('function_manual')->nullable();
            $table->string('certificate_degrees')->nullable();
            $table->string('title_verification')->nullable();
            $table->string('resolution_rethus')->nullable();
            $table->string('professional_card')->nullable();
            $table->string('advan_life_support')->nullable();
            $table->string('certific_victims_sexual_violence')->nullable();
            $table->string('court_ethics_certific')->nullable();
            $table->string('card_protect_validity')->nullable();
            $table->string('civil_liability policy')->nullable();
            $table->string('occupational_exam')->nullable();
            $table->string('health')->nullable();
            $table->string('pension')->nullable();
            $table->string('arl')->nullable();
            $table->string('account_number')->nullable();
            $table->string('date_admission')->nullable();
            $table->string('concept_contract')->nullable();
            $table->string('date_end')->nullable();
            $table->string('observations')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->timestamps();

            $table->foreign('title_id')->references('id')->on('lists');
            $table->foreign('gender_id')->references('id')->on('lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}