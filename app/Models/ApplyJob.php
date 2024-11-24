<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplyJob extends Model
{
    use HasFactory;
    protected $table = 'apply_job';
    protected $fillable = ['name','position','userId','userName','state','img','language','experience','area','interviewDate','businessNote' ];
}
