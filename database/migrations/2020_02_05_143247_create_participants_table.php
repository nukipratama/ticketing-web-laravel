<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('uid')->unique();
            $table->string('bid');
            $table->string('email');
            $table->string('address');
            $table->string('tel');
            $table->string('emergency');
            $table->string('gender');
            $table->timestamp('birthdate');
            $table->string('identity');
            $table->string('community')->nullable();
            $table->char('size', 2);
            $table->string('img');
            $table->string('medical')->nullable();
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
        Schema::dropIfExists('participants');
    }
}
