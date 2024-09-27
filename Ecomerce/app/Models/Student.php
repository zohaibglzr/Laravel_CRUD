<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;


class Student extends Model
{
    use HasApiTokens, HasFactory;
    // protected $table = 'students';
    protected $guarded = [''];
    public $timestamps = [];
    public function contact(){
        return $this->hasOne(Contact::class);
    }
}
