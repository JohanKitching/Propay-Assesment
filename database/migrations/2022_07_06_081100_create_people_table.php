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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('idNumber',13);
            $table->string('mobileNumber');
            $table->date('birthDate');
            $table->string('language');
            $table->longText('interests');
            $table->string('email');
            $table->timestamps();
            $table->enum('status',array(0=>'Active',1=>'Inactive'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
