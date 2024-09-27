<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer;

class product extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $guarded = [''];
    // protected $fillable = [
    //     'name', 'description', 'price', 'quantity',
    // ];
    public function customers(){
        return $this->belongsToMany(Customer::class, 'customer_product');
    }
}
// discription