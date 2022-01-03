<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\DriverBooking;
use App\Models\TrackingHistory;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageTask extends Component
{
    public function render()
    {
        //All Assigned Booking to current User/Driver
        $tasks = DriverBooking::where('user_id', Auth::user()->id)
            ->with('booking')
            ->get();


        //All Status
        $tstatus = TrackingStatus::all();

        return view('livewire.manage-task')
            ->with(compact('tasks', 'tstatus'))
            ->extends('admin.app')
            ->section('content');
    }

    public function changeStatus($booking, $status)
    {

        //Update Status
        $updated =  Booking::find($booking)
            ->update([

                'trackStatus_id' => $status,

            ]);

        //Add to History On Success
        if ($updated == true) {

            TrackingHistory::create([
                'trackingStatus_id' => $status,
                'booking_id' => $booking,
                'user_id' => Auth::user()->id,
            ]);

            session()->flash('message', 'Status updated successfully!');
        } else {
            session()->flash('message', 'Something went wrong!');
        }

        return redirect(request()->header('Referer'));
    }
}
