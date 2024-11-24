<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    // Allow these fields to be mass-assigned
    protected $table = 'business';
    protected $fillable = [
        'name',    // Company name
        'img',       // Logo path
        'hotline',    // Hotline
        'customer_mail',      // Email
        'official_website',    // Website URL
        'official_facebook',   // Facebook URL
        'head_offices',    // Address
        'progress',   // Development progress
    ];
}
