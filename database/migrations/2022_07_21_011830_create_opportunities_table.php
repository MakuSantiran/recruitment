<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained();
            $table->string('title', 100);
            $table->string('position', 100);
            $table->text('description');
            $table->text('qualifications');
            $table->timestamp('submission_deadline');
            $table->tinyInteger('cert_employment');
            $table->tinyInteger('service_record');
            $table->tinyInteger('transcript_of_records');
            $table->tinyInteger('diploma');
            $table->tinyInteger('certification_of_units');
            $table->tinyInteger('cs_eligibility');
            $table->tinyInteger('prc_license');
            $table->tinyInteger('board_rating');
            $table->tinyInteger('trainings_seminars_awards');
            $table->tinyInteger('latest_performance_rating');
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
        Schema::dropIfExists('opportunities');
    }
}
