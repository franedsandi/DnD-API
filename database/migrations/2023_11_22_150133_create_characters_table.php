<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->decimal('height',5,2)->unsigned();
            $table->decimal('weight',8,2)->unsigned();
            $table->text('background');
            $table->string('picture');
            $table->tinyInteger('armor_class')->unsigned();
            $table->tinyInteger('for')->unsigned();
            $table->tinyInteger('des')->unsigned();
            $table->tinyInteger('cos')->unsigned();
            $table->tinyInteger('int')->unsigned();
            $table->tinyInteger('sag')->unsigned();
            $table->tinyInteger('car')->unsigned();
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
        Schema::dropIfExists('characters');
    }
};
