<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'user_name',
        'user_password',
        'mail'
    ];

    protected $hidden = [
        'user_password',  // Ẩn mật khẩu khi trả về dữ liệu
    ];

    public function isAdmin()
    {
    return $this->is_admin;
    }

}
