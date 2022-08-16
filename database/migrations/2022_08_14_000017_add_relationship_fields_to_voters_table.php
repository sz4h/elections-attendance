<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVotersTable extends Migration
{
    public function up()
    {
        Schema::table('voters', function (Blueprint $table) {
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->foreign('gender_id', 'gender_fk_7149564')->references('id')->on('genders');
            $table->unsignedBigInteger('letter_id')->nullable();
            $table->foreign('letter_id', 'letter_fk_7149565')->references('id')->on('letters');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_7149581')->references('id')->on('areas');
            $table->unsignedBigInteger('committee_id')->nullable();
            $table->foreign('committee_id', 'committee_fk_7149582')->references('id')->on('committees');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->foreign('admin_id', 'admin_fk_7149583')->references('id')->on('users');
        });
    }
}
