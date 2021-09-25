<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;
    protected $table = 'partners';
    public $timestamps = true;

    protected $fillable = ['id' ,'name', 'img_url', 'created_at', 'updated_at'];
}
