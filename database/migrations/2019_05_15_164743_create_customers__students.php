<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers__students', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('customer_id');
			$table->integer('student_id');
			$table->index(['customer_id', 'student_id'], 'customer__students_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers__students');
    }
}
