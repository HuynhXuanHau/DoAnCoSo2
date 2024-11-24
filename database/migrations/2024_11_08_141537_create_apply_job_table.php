<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_job', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('position', 200);
            $table->integer('userId');
            $table->string('userName', 100);
            $table->enum('state', ['Waiting', 'No','Yes'])->default('Waiting');
            $table->string('img', 100);
            $table->string('language', 100);
            $table->string('experience', 100);
            $table->string('area', 100);
            $table->string('interviewDate', 100);
            $table->string('businessNote', 2000);
            $table->timestamps();
        });

        // Insert sample data
        DB::table('apply_job')->insert([
            [
                'name' => 'FPT',
                'position' => 'FPT Solfware',
                'userId' => 23,
                'userName' => 'Luong2002',
                'state' => 'Yes',
                'img' => '../images/logo_fpt.png',
                'language' => 'Java',
                'experience' => '1-2 năm',
                'area' => 'Quan 1',
                'interviewDate' => '12/6',
                'businessNote' => 'Bạn hãy đến địa chỉ công ty để phỏng vấn trực tiếp nhé'
            ],
            [
                'name' => 'F88',
                'position' => 'Software Deveploper',
                'userId' => 23,
                'userName' => 'Luong2002', 
                'state' => 'Yes',
                'img' => '../images/logo_F88.PNG',
                'language' => 'Python',
                'experience' => '2 - 3 năm',
                'area' => 'Quan 10',
                'interviewDate' => '',
                'businessNote' => ''
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_job');
    }
};