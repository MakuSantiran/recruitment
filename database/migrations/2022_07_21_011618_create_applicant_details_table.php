<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('registration_no', 100);
            $table->string('surname', 100);
            $table->string('firstname', 100);
            $table->string('middlename', 100);
            $table->date('birthdate');
            $table->tinyInteger('sex');
            $table->tinyInteger('civil_status');
            $table->string('citizenship', 50);
            $table->string('contact_no', 50);
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
        Schema::dropIfExists('applicant_details');
    }
}
