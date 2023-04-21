<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTasksTable extends Migration
{
    public function up()
    {
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('task_id');
            $table->timestamp('due_date')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('start_date')->nullable()->default(NULL);
            $table->timestamp('end_date')->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('remarks', 255)->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('task_users')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_tasks');
    }
}
