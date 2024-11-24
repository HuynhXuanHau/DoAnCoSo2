<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCv extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's plural naming convention
    protected $table = 'user_cv';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'user_id', 'name', 'birthday', 'sex', 'phone', 'email',
        'address', 'cccd', 'study', 'experience', 'certificate', 
        'award', 'avatarcv'
    ];

    // If you don't want to use timestamps, you can disable them
    public $timestamps = true;
}
