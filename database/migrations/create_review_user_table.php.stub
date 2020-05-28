<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewUserTable extends Migration
{
    public function up()
    {
        Schema::create('review_user', function (Blueprint $table) {
			$table->id();
			$table->foreignId('review_id')->constrained();
			$table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_user');
    }
}
