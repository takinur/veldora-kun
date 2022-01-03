<?php

namespace App\Http\Livewire;

use App\Models\DriverBooking;
use App\Models\TrackingHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DriverDashboard extends Component
{
    public function render()
    {
        //New Tasks -Today
        $newTasks = DriverBooking::where('user_id', Auth::user()->id)
            ->whereDate('created_at', Carbon::today())->count();

        //All Tasks
        $allTasks = DriverBooking::where('user_id', Auth::user()->id)
            ->count();

        //LastActivity
        $activity = Carbon::createFromTimeStamp(strtotime(now()))->diffForHumans();

            $data = [
                'newTasks' => $newTasks,
                'allTasks' => $allTasks,
                'activity' => $activity,
            ];

            //dd($data);

        return view('livewire.driver-dashboard', compact('data'));
    }
}
