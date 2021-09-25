<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    public $timestamps = true;

    protected $fillable = ['id' ,'name', 'description', 'created_at', 'updated_at'];
}
