<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applis', function (Blueprint $table) {
            $table->id();
            $table->integer('approved')->default(0);
            $table->string('student_id')->nullable();
            // $table->float('personalCode', 9, 0) ;
            $table->string('class')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('student_bd')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('applis');
    }
};
