<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {

        $currentOnline = count(DB::table('sessions')->get());

        $totalUsers = count(User::all());

         //New users -Today
        $newUsers = User::whereDate('created_at', Carbon::today())->count();

         //New Bookings-Today
        $newBookings = Booking::whereDate('created_at', Carbon::today())->count();

         //New Message-Today
        $newMessages = Contact::whereDate('created_at', Carbon::today())->count();

        $totalBookings = count(Booking::all());

        $data = [
            'currentOnline' => $currentOnline,
            'totalUsers' => $totalUsers,
            'newUsers' => $newUsers,
            'totalBookings' => $totalBookings,
            'newBookings' => $newBookings,
            'newMessages' => $newMessages,

        ];

        return view('livewire.admin-dashboard')->with(compact('data'));
    }
}
