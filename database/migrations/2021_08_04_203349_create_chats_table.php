<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned()->nullable();
            $table->bigInteger('from_user_id')->unsigned()->nullable();
            $table->bigInteger('to_user_id')->unsigned()->nullable();
            $table->longText('body');
            $table->string('read_at')->nullable();
            $table->timestamps();
            
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
