<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsandOffers extends Model
{
    use HasFactory;
    protected $table = 'eventsandoffers';
    public $timestamps = true;

    protected $fillable = ['id' ,'name', 'img_url', 'description', 'created_at', 'updated_at'];
}
