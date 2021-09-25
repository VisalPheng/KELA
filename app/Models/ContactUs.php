<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    public $timestamps = true;

    protected $fillable = ['id' ,'name', 'email', 'phonenumber', 'message','created_at', 'updated_at'];
}
