<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;
    protected $table = 'locations';
    public $timestamps = true;

    protected $fillable = ['id' ,'name','created_at', 'updated_at'];
}
