<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'company';

    public $primaryKey = "id";

    public $timestamps = true;

    protected $fillable = ['name'];

    protected $guarded = ["id"];
}
