
Meet
Nueva reunión
Unirse a una reunión
Hangouts

2 de 37
git humanitas
Recibidos

marlon henao mejia <marlonhannerh@gmail.com>
Adjuntos
29 nov 2021 16:23 (hace 1 día)
para mí



--



Muchas gracias por su atención.

Marlon Hanner Henao Mejía
Soporte Técnico
Tel. 373 03 73  Etx. 149 


INVERSIONES EN SALUD S.A.S se encuentra ubicada en la CL 39 49 37 en el Municipio de Itagüí – Departamento Antioquia. Teléfono: 3730373. e-mail: humanitas@une.net.co Este mensaje y sus archivos adjuntos van dirigidos exclusivamente a su destinatario pudiendo contener información confidencial sometida a secreto empresarial. No está permitida su reproducción o distribución sin la autorización expresa de INVERSIONES EN SALUD S.A.S Si usted no es el destinatario final por favor elimínelo e infórmenos por este mismo medio. De acuerdo con la Ley habeas data 1581 de 2012 de Protección de Datos y con el Decreto 1377 de 2013, el Titular presta su consentimiento y/o autoriza para que sus datos, facilitados voluntariamente, pasen a formar parte de una base de datos, cuyo responsable es INVERSIONES EN SALUD S.A.S, cuyas finalidades son: la gestión administrativa de la empresa, así como la gestión de carácter comercial o envío de comunicaciones comerciales sobre nuestros productos y/o servicios. Puede usted ejercitar los derechos de acceso, corrección, supresión, revocación o reclamo por infracción sobre sus datos, mediante escrito dirigido a INVERSIONES EN SALUD S.A.S a la dirección de correo electrónico humanitas@une.net.co indicando en el asunto el derecho que desea ejercitar, o mediante correo ordinario remitido a la Sede Principal, CL 39 49 37 en el Municipio de Itagüí – Departamento Antioquia.


2 archivos adjuntos



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
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('habeas_data')->nullable();
            $table->string('identification_card')->nullable();
            $table->string('expedition_date')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('gender')->nullable();
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
            $table->string('advan _life_support')->nullable();
            $table->string('certific_victims_sexual_violence')->nullable();
            $table->string('court_ ethics_certific')->nullable();
            $table->string('card_ protect_validity')->nullable();
            $table->string('civil liability policy')->nullable();
            $table->string('occupational exam')->nullable();
            $table->string('health')->nullable();
            $table->string('pension')->nullable();
            $table->string('arl')->nullable();
            $table->string('account_number')->nullable();
            $table->string('date _admission')->nullable();
            $table->string('concept_contract')->nullable();
            $table->string('date_ end')->nullable();
            $table->string('observations')->nullable();
            $table->boolean('status')->default(1)->nullable();  
            $table->timestamps();

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