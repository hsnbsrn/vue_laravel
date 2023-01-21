<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'customer';  

    public $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = ['is_male','first_name','city','country','birth_date','company_id'];

    protected $guarded = ["id"];
}
