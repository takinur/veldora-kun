<?php

namespace App\Observers;

use App\Mail\EmailNewOrder;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class BookingObserver
{
    /**
     * Handle the Booking "created" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function created(Booking $booking)
    {
                // //Return admin EMAIL
                // $user = User::find(1);
                // // $email = [$user->email, 'demo@gmail.com'];

                //  $email = [$user->email];

                //  $mailData = [
                //      'title' => 'New booking!',
                //      'text' => '',

                //  ];

                //  foreach($email as $em){
                //      Mail::to($em)->send(new EmailNewOrder($mailData));
                //  }

    }

    /**
     * Handle the Booking "updated" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function updated(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function deleted(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "restored" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function restored(Booking $booking)
    {
        //
    }

    /**
     * Handle the Booking "force deleted" event.
     *
     * @param  \App\Models\Booking  $booking
     * @return void
     */
    public function forceDeleted(Booking $booking)
    {
        //
    }
}
