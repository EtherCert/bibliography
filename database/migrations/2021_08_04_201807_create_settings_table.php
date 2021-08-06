<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('siteName');
            $table->string('siteNameEng');// اسم الشركة بالانجليزي
            $table->string('manager');// رئيس مجلس الادارة
            $table->string('subName1')->nullable();
            $table->string('subName2')->nullable();
            $table->string('subName3')->nullable();
            $table->longText('accountNum')->nullable();
            $table->string('color')->default('style.css');
            $table->string('email');
            $table->string('mobile');
            $table->string('address'); 
            $table->string('facebook');
            $table->string('whatsapp');
            $table->string('twitter'); 
            $table->string('instegram'); 
            $table->string('snapchat');
            $table->string('logo');
            $table->string('seal'); // ختم الشركة
            $table->integer('num_of_elements');//عدد الدراسات بالصفحة
            $table->longText('privacy')->nullable();//الشروط والأحكام
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
        Schema::dropIfExists('settings');
    }
}
