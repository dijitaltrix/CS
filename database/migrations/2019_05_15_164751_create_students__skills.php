<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students__skills', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('student_id');
			$table->integer('skill_id');
			$table->index(['student_id', 'skill_id'], 'students__skills_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students__skills');
    }
}
