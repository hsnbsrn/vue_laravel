<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'customer';  

    protected $guarded = ["id"];

    public $timestamps = true;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function city(){
        return $this->hasOne(City::class,'id','city_id');
    }

}
