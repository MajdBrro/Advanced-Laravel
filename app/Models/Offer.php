<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
protected $fillable =['name_ar','photo','name_en','price','details_ar','details_en','created_at', 'updated_at'];
protected $hidden =['created_at', 'updated_at'];
// public $timestamps = false;
}
