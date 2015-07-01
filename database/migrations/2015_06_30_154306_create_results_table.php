<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->dateTime('date');
			$table->bigInteger('lottery_id')->unsigned()->default(0);
			$table->foreign('lottery_id')->references('id')->on('lotteries')->onDelete('cascade');
			$table->bigInteger('series_id')->unsigned()->default(0);
			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade');
			$table->string('winning_number', 2);
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
		Schema::drop('results');
	}

}
