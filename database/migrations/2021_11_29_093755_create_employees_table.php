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
            $table->unsignedBigInteger('title_id')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('habeas_data')->nullable();
            $table->string('identification_card')->nullable();
            $table->string('expedition_date')->nullable();
            $table->string('date_birth')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('telephone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->string('neighborhood')->nullable();
            $table->unsignedBigInteger('type_housing_id')->nullable();
            $table->unsignedBigInteger('stratum_id')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('rh_id')->nullable();
            $table->unsignedBigInteger('marital_status_id')->nullable();
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
            $table->string('civil_liability_policy')->nullable();
            $table->string('occupational_exam')->nullable();
            $table->unsignedBigInteger('health_id')->nullable();
            $table->unsignedBigInteger('pension_id')->nullable();
            $table->unsignedBigInteger('arl_id')->nullable();
            $table->unsignedBigInteger('cesantias_id')->nullable();
            $table->string('account_number')->nullable();
            $table->unsignedBigInteger('account_type_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('date_admission')->nullable();
            $table->unsignedBigInteger('concept_type_id')->nullable();
            $table->string('date_end')->nullable();
            $table->string('name_institute')->nullable();
            $table->string('folio_number')->nullable();
            $table->text('observation')->nullable();
            $table->string('picture')->nullable();
            $table->boolean('status')->default(1)->nullable();
            $table->timestamps();

            /* Índices de campos foráneos de otras tablas */
            $table->foreign('title_id')->references('id')->on('lists');
            $table->foreign('gender_id')->references('id')->on('lists');
            $table->foreign('municipality_id')->references('id')->on('lists');
            $table->foreign('type_housing_id')->references('id')->on('lists');
            $table->foreign('stratum_id')->references('id')->on('lists');
            $table->foreign('marital_status_id')->references('id')->on('lists');
            $table->foreign('health_id')->references('id')->on('lists');
            $table->foreign('pension_id')->references('id')->on('lists');
            $table->foreign('cesantias_id')->references('id')->on('lists');
            $table->foreign('arl_id')->references('id')->on('lists');
            $table->foreign('account_type_id')->references('id')->on('lists');
            $table->foreign('bank_id')->references('id')->on('lists');
            $table->foreign('concept_type_id')->references('id')->on('lists');
            $table->foreign('rh_id')->references('id')->on('lists');


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