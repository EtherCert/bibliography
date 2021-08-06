<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediables', function (Blueprint $table) {
           $table->id();
            $table->integer('media_id'); //اي دي الميديا مفتاح اجنبي
            $table->integer('mediable_id'); // مفتاح اجنبي يمثل  الاشارة الى المنشور، الخبر او الكورس حسب الموودل اللي بشاور عليه
            $table->string('mediable_type');//اسم الموودل ممكن يكون منشور، خبر او كورس
            $table->softDeletes();
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
        Schema::dropIfExists('mediables');
    }
}
