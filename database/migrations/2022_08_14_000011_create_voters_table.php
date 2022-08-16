<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('circuit_no');
            $table->integer('parlmaint_no')->nullable();
            $table->string('parlmaint_name')->nullable();
            $table->integer('parlmaint_type');
            $table->integer('register_number');
            $table->date('register_date');
            $table->integer('moi_reference');
            $table->string('full_name');
            $table->string('name_1')->nullable();
            $table->string('name_2')->nullable();
            $table->string('name_3')->nullable();
            $table->string('name_4')->nullable();
            $table->date('birth_day')->nullable();
            $table->string('job')->nullable();
            $table->longText('address')->nullable();
            $table->string('register_status')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('attended')->default(0)->nullable();
            $table->boolean('targeted')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
