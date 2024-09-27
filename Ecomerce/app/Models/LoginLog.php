<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class LoginLog extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['user_id', 'login_time', 'ip_address'];
}
