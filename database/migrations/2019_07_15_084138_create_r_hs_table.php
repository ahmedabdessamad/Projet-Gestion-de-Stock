<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRHsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 30)->nullable();
            $table->string('min_salary', 30)->nullable();
            $table->string('max_salary')->nullable();
            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 30)->nullable();
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->date('eng_date')->nullable();
            $table->string('salary')->nullable();
            $table->string('function', 60)->nullable();
            $table->string('contract_type', 60)->nullable();
            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::create('leave_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->date('request_date')->nullable();
            $table->tinyInteger('status')->nullable(); // 0 en cours / 1 confirmé / 2 dénier
            $table->string('reason')->nullable();
            $table->date('leave_date')->nullable();
            $table->integer('period')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });

        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->string('reason')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->integer('leave_request_id')->unsigned();
            $table->foreign('leave_request_id')->references('id')->on('leave_requests');
            $table->timestamps();
        });

        Schema::create('leave_repeal_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reason', 30)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('leave_request_id')->unsigned();
            $table->foreign('leave_request_id')->references('id')->on('leave_requests');
            $table->timestamps();
        });


        Schema::create('annual_leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });

        Schema::create('holidays', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('label')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('recoverable')->nullable(); // 0 no /1  yes
            $table->timestamps();
        });

        Schema::create('recovery_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('status')->nullable(); //0 en cours / 1 confirmé / 2 dénier
            $table->integer('holiday_id')->unsigned();
            $table->foreign('holiday_id')->references('id')->on('holidays');
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });

        Schema::create('employee_grade_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->integer('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades');
            $table->timestamps();
        });

        Schema::create('employee_contract_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('type')->nullable();
            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees');
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
        Schema::dropIfExists('r_hs');
    }
}
