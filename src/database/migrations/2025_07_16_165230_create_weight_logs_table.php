<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_logs', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('user_id');
            $table->date('date');
            $table->decimal('weight',$precision =4,$scale =1);
=======
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->decimal('weight',$precision = 4,$scale = 1);
>>>>>>> origin/main
            $table->integer('calories');
            $table->time('exercise_time',$precision = 0);
            $table->text('exercise_content');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weight_logs');
    }
}
