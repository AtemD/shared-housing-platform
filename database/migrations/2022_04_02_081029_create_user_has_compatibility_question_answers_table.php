<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasCompatibilityQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_compatibility_question_answers', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            
            $table->smallInteger('compatibility_question_id')->unsigned();
            $table->foreign('compatibility_question_id', 'c_qes_id')->references('id')->on('compatibility_questions')->onDelete('cascade');

            $table->tinyInteger('compatibility_question_relevance');

            $table->mediumInteger('user_answer_id')->unsigned();
            $table->foreign('user_answer_id', 'u_ans_id')->references('id')->on('answer_choices')->onDelete('cascade');

            $table->mediumInteger('match_answer_id')->unsigned();
            $table->foreign('match_answer_id', 'm_ans_id')->references('id')->on('answer_choices')->onDelete('cascade');

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
        Schema::dropIfExists('user_has_compatibility_question_answers');
    }
}
