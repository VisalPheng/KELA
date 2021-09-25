<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = 'venues';
    public $timestamps = true;

    protected $fillable = ['location_id', 'id' ,'name','description','img_url','multiple_img', 'phonenumber','user_id','address','created_at', 'updated_at'];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function timeslot()
    {
        return $this->hasMany(TimeSlots::class);
    }
}
