<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    use HasFactory;
    protected $table = 'timeslots';
    public $timestamps = true;

    protected $fillable = ['id', 'venue_id' , 'user_id' ,'starttime', 'endtime','created_at', 'updated_at'];

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
