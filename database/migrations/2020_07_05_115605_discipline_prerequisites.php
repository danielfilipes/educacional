<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DisciplinePrerequisites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discipline_prerequisites', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('main_discipline');
            $table->foreign('main_discipline')->references('id')->on('disciplines')->onDelete('cascade');

            $table->unsignedBigInteger('prerequisite_discipline');
            $table->foreign('prerequisite_discipline')->references('id')->on('disciplines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discipline_prerequisites');
    }
}
