<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('email')->nullable();
			$table->datetime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}
}
