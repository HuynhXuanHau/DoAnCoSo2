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
        Schema::create('user_cv', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name', 100);
            $table->string('birthday', 20);
            $table->string('sex', 10);
            $table->string('phone', 20);
            $table->string('email', 50);
            $table->string('address', 200);
            $table->string('cccd', 100);
            $table->string('study', 1000);
            $table->string('experience', 1000);
            $table->string('certificate', 1000);
            $table->string('award', 1000);
            $table->string('avatarcv', 1000);
            $table->timestamps();
        });

        // Insert sample data
        DB::table('user_cv')->insert([
            [
                'user_id' => 2,
                'name' => 'Huỳnh Xuân Hậu',
                'birthday' => '01/01/2002',
                'sex' => 'Nữ',
                'phone' => '03244530788',
                'email' => 'duong@gmail.com',
                'address' => '12 cầu Sài Gòn, tp HCM',
                'cccd' => '1467128994',
                'study' => '12/12',
                'experience' => '2 năm developer',
                'certificate' => 'chưa',
                'award' => 'không',
                'avatarcv' => '../images/fpt.png'
            ],
            [
                'user_id' => 4,
                'name' => 'Trần Thị Anh Tuyền',
                'birthday' => '01/02/2002',
                'sex' => 'Nữ',
                'phone' => '0345234466',
                'email' => 'tuyen@gmail.com',
                'address' => '344 quận 8, tp hcm',
                'cccd' => '7554666339',
                'study' => '12/12',
                'experience' => 'chưa',
                'certificate' => 'chưa',
                'award' => 'không',
                'avatarcv' => '../images/fpt.png'
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
        Schema::dropIfExists('user_cv');
    }
};