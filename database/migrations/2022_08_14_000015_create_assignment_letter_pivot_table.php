<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentLetterPivotTable extends Migration
{
    public function up()
    {
        Schema::create('assignment_letter', function (Blueprint $table) {
            $table->unsignedBigInteger('assignment_id');
            $table->foreign('assignment_id', 'assignment_id_fk_7149451')->references('id')->on('assignments')->onDelete('cascade');
            $table->unsignedBigInteger('letter_id');
            $table->foreign('letter_id', 'letter_id_fk_7149451')->references('id')->on('letters')->onDelete('cascade');
        });
    }
}
