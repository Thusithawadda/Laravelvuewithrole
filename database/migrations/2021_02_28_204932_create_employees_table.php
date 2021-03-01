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
            $table->string('last_name',60);
            $table->string('first_name',60);
            $table->string('middle_name',60);
            $table->string('address',120);
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->bigInteger('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->bigInteger('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->char('zip',10);
            $table->date('birth_date');
            $table->date('date_hired');
            $table->timestamps();
            $table->softDeletes();
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
