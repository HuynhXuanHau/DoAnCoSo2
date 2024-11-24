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
        Schema::create('love_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('position', 100);
            $table->string('language', 100);
            $table->string('salary', 100);
            $table->string('experience', 100);
            $table->string('available', 20);
            $table->string('area', 100);
            $table->string('img', 100);
            $table->integer('user_id');
            $table->integer('job_id');
            $table->timestamps();
        });

        // Insert sample data
        // (No sample data provided in the original SQL file)
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('love_jobs');
    }
};