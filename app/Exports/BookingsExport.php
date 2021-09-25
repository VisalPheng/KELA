<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BookingsExport implements FromCollection,WithHeadings,WithMapping
{
    public function headings(): array
    {
        return [
            '#',
            'Venue',
            'Start Time',
            'End Time',
            'Booking ID',
            'First Name',
            'Last Name',
            'Address',
            'Phone Number',
            'Email',
            'Booking Date',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::select(['id','venue_id','timeslot_id','user_id','bookingid','firstname','lastname','address','phonenumber','email','bookingdate'])->get();
    }

    public function map($booking): array
    {
        return [
            $booking->id,
            $booking->venue->name,
            $booking->timeslot->starttime,
            $booking->timeslot->endtime,
            $booking->bookingid,
            $booking->firstname,
            $booking->lastname,
            $booking->address,
            $booking->phonenumber,
            $booking->email,
            $booking->bookingdate,
        ];
    }
}
