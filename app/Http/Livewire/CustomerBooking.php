<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerBooking extends Component
{


    public function render()
    {


        $data = Customer::where('email', Auth::user()->email)
            ->with('booking')
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.customer-booking', compact('data'))
            ->extends('admin.app')
            ->section('content');
    }

    public function makePayment($booked_id)
    {
        session()->flash('payments', ['book_id' => $booked_id, 'msg' => 'PROCESS_Payment']);

        return redirect(route('pay-stripe'));
    }
}
