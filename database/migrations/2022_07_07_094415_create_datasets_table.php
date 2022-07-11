<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->text('introduction')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('anamnesis')->nullable();
            $table->text('physical_examination')->nullable();
            $table->text('summary')->nullable();
            $table->text('medication')->nullable();
            $table->text('diagnostics')->nullable();
            $table->foreignId('patient_id')->nullable()
                ->references('id')->on('patients')
                ->onDelete('cascade');
            $table->string('date')->nullable();
            $table->string('doctor_details', 2000)->nullable();
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
        Schema::dropIfExists('datasets');
    }
}
