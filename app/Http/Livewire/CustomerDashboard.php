<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerDashboard extends Component
{
    public function render()
    {
        $user = Auth::user();

         //Total
        $totalBooking = Customer::where('email', $user->email)
                        ->count();

        //New -Today
        $newBooking = Customer::where('email', $user->email)
                            ->whereDate('created_at', Carbon::today())->count();


       $activity = Carbon::createFromTimeStamp(strtotime(now()))->diffForHumans();

        $data = [
            'totalBooking' => $totalBooking,
            'newBooking' => $newBooking,
            'activity' => $activity,
        ];



        return view('livewire.customer-dashboard', compact('data'));
    }
}
