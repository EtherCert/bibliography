<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('researcher_name');
            $table->string('supervisor_name')->nullable(); //high level studies
            $table->string('major');
            $table->enum('phase', ['','دكتوراة','ماجستير'])->nullable(); //high level studies
            $table->longText('summary_ar');
            $table->longText('summary_en');
            $table->string('study_file');
            $table->string('department_name');//high level studies
            $table->string('publisher');
            $table->string('publish_place');
            $table->string('publish_date')->nullable();
            $table->string('keywords')->nullable();
            $table->integer('number_of_pages');
            $table->string('search_leave_file');// خاص بدراسات المراحل العليا (إجازة البحث من القسم العلمي)
            $table->boolean('accept_conditions')->default(0);
            $table->bigInteger('member_id')->unsigned()->nullable();
            $table->enum('study_state', ['مرفوضة', 'منشورة','قيد المراجعة'])->default('قيد المراجعة');
            $table->longText('refuse_reason');
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->enum('study_type', ['دراسة في مرحلة دراسات عليا','دراسة علمية']);
            $table->timestamps();
            
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('studies');
    }
}
