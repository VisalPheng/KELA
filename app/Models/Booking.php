<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    public $timestamps = true;

    protected $fillable = ['user_id' ,'timeslot_id','venue_id', 'bookingid', 'id', 'firstname','lastname','address','phonenumber','email', 'bookingdate','created_at', 'updated_at'];
    
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(TimeSlots::class);
    }
}
