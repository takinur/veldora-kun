<?php

namespace App\Http\Livewire;

use App\Mail\EmailNewOrder;
use App\Models\Booking;
use App\Models\DriverBooking;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class ManageBookings extends Component
{
    use WithPagination;

    public $search;

    public $bookingId;



    public function render()
    {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $this->search);
        $words = explode(' ', $term);

        foreach ($words as $idx => $word) {
            // fulltext indices.
            $words[$idx] = $word;
        }
        $search = implode(' ', $words);

        $keyword = '%' . $this->search . '%';


        $bookings = Booking::with('service')
            ->with('driver')
            ->with('package')
            ->with('delivery')
            ->with('notification')
            ->with('bookingStatus')
            ->with('trackStatus')
            ->where('re_name', 'LIKE', $keyword)
            ->orWhereHas('customer',function($query) use ($keyword){
                return $query
                ->where('name', 'LIKE', $keyword)
                ->orWhere('email', 'LIKE', $keyword)
                ->orWhere('phone', 'LIKE', $keyword)
                ->orWhere('address', 'LIKE', $keyword);
            })
            ->OrWhere('re_name', 'LIKE', $keyword)
            ->OrWhere('re_email', 'LIKE', $keyword)
            ->OrWhere('re_phone', 'LIKE', $keyword)
            ->OrWhere('re_address', 'LIKE', $keyword)
            ->orderByDesc('created_at')
            ->paginate(12);

            //Get approved Drivers
            $drivers = User::role('driver')
                    ->whereNotNull('approved_at')
                    ->get();

        // dd($bookings);


        return view('livewire.manage-bookings')
            ->with(compact('bookings', 'drivers'));
    }


     //bind id
     public function deleteBooking($id)
     {
         $this->bookingId = $id;
     }


    public function removeUser()
    {


        if ($this->bookingId) {
            Booking::where('id', $this->bookingId)->delete();

            session()->flash('message', 'Booking Deleted successfully!');
        }
    }

    public function assignDriver($booking, $driver){


            DriverBooking::updateOrCreate(
                ['booking_id' => $booking],
                ['user_id' => $driver, 'booking_id' => $booking]
            );


        //Email to driver
        $demail = User::findOrFail($driver);
       // $book = Booking::findOrFail($booking);

        $mailData = [
            'title' => 'Hi, You received new task!',
            'text' => ' Login to dashboard for more details!',
            'url' => route('tasks'),
        ];
        // $_ENV['APP_URL']

        Mail::to($demail->email)->send(new EmailNewOrder($mailData));


        session()->flash('message', 'Driver assigned successfully!');
    }
}
