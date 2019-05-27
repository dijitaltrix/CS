<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name', 100)->comment("The students full name");
			//Note: not using date as we're encrypting this sensitive field 
			$table->string('date_of_birth', 255)->comment("The students encrypted date of birth");
			$table->index('name', 'students_name_index');
            // not using timestamps as they are a performance drain on larger tables
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
