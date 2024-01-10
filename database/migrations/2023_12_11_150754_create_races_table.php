<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->tinyInteger('mod_for')->range(-3,3);
            $table->tinyInteger('mod_des')->range(-3,3);
            $table->tinyInteger('mod_cos')->range(-3,3);
            $table->tinyInteger('mod_int')->range(-3,3);
            $table->tinyInteger('mod_sag')->range(-3,3);
            $table->tinyInteger('mod_car')->range(-3,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
