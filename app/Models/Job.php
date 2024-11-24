<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    protected $fillable = [
        'name',
        'area',
        'language',
        'experience',
        'salary',
        'position',
        'description',
        'address',
        'worktime',
        'availableApply',
        'benefits' ,
        'img'
    ];
}
