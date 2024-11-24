<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'users' table with necessary fields
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Primary Key
            $table->string('user_name', 100);
            $table->string('user_password', 100);
            $table->string('mail', 100);
            $table->boolean('is_admin')->default(false);
            $table->timestamps();
        });

        // Insert sample data into 'users' table
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'user_name' => 'admin',
                'user_password' => Hash::make('123456'),
                'mail'=>'admin@2024.vn',
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'user_name' => 'Hau2005',
                'user_password' => Hash::make('2005'),
                'mail'=>'xuanhau1705@gmail.com',
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'user_name' => 'Huy2005',
                'user_password' => Hash::make('2005'),
                'mail'=>'bachhuy1706@gmail.com',
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'users' table if exists
        Schema::dropIfExists('users');
    }
};
