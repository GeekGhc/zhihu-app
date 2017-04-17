<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('question_id')->index()->unsigned();
            $table->text('body');
            $table->integer('votes_count')->default(0);//答案的点赞数
            $table->integer('comments_count')->default(0);//答案的回复评论数
            $table->string('is_hidden',8)->default('F');
            $table->string('close_comment',8)->default('F');
            $table->string('is_first',8)->default('F');
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
        Schema::dropIfExists('answers');
    }
}
