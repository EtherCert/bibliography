<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('identity');
            $table->string('mobile');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('birthday')->nullable();
            $table->string('degree')->nullable();
            $table->string('major')->nullable();
            $table->string('workplace')->nullable();
            $table->string('job_title')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->integer('type')->default(0); //انواع المستخدمين عضو0، أدمن 1، معتمد 2، مراجع 3;
            $table->enum('status', ['مفعل','غير مفعل'])->default('غير مفعل');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
