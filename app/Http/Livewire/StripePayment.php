<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Mail\EmailNewOrder;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Stripe;


class StripePayment extends Component
{

    public $payment_method;

    public $card_num;
    public $exp_month;
    public $exp_year;
    public $cvc;
    public $card_name;

    public $payment_mode = true; //Set False at default
    public $booking;

    public function render()
    {
        //Check for Payment Session!
        if (session()->has('payments')) {
            $ss_data = session()->get('payments');
            //SEARCH BOOKING
            $this->booking = Booking::with('customer')->where('id', $ss_data['book_id'])->first();

            $this->payment_mode = true;
        }
        //Payment Method
        if ($this->payment_method == null) {
            $this->payment_method = 'paypal';
        }
        $years = collect(range(0, 12))->map(function ($item) {
            return (string) date('Y') + $item;
        });

        $months = [
            ['name' => '01 - January', 'value' => '01'],
            ['name' => '02 - February', 'value' => '02'],
            ['name' => '03 - March', 'value' => '03'],
            ['name' => '04 - April', 'value' => '04'],
            ['name' => '05 - May', 'value' => '05'],
            ['name' => '06 - June', 'value' => '06'],
            ['name' => '07 - July', 'value' => '07'],
            ['name' => '08 - August', 'value' => '08'],
            ['name' => '09 - September', 'value' => '09'],
            ['name' => '10 - October', 'value' => '10'],
            ['name' => '11 - November', 'value' => '11'],
            ['name' => '12 - December', 'value' => '12'],

        ];

        return view('livewire.stripe-payment', compact('years', 'months'))
            ->extends('layouts.app')
            ->section('content');
    }

    /**
     * handling payment
     */
    public function makePayment()
    {

        $booking = $this->booking;

        $this->validate(
            [
                'card_num' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric',
            ],
            [
                'card_num.required' => 'Please Enter card Number!',
                'card_num.numeric' => 'Please Enter a valid card Number!',
                'exp_month.required' => 'Please Enter Expiry month!',
                'exp_month.numeric' => 'Please Enter a valid Expiry month!',
                'exp_year.required' => 'Please Enter Expiry Year! ',
                'exp_year.numeric' => 'Please Enter a valid Expiry Year!',
            ]
        );

        //Stripe API KEY
        $stripe = Stripe::make(config('services.stripe.secret'));

        try {
            //Generate Token
            $token = $stripe->tokens()->create([
                "card" => [
                    "number"    => $this->card_num,
                    "exp_month" => $this->exp_month,
                    "exp_year"  => $this->exp_year,
                    "cvc"       => $this->cvc
                ]
            ]);
            if (!isset($token['id'])) {

                session()->flash('stripe_error', 'Failed to generate stripe token!');

                session()->keep(['payments']);

                return back();
            }

            //Create customer instance
            $stripeCustomer = $stripe->customers()->create([
                'name' => $booking->customer->name,
                'phone' => $booking->customer->phone,
                'email'  => $booking->customer->email,
                'source' => $token['id'],
            ]);
            //Charge
            $charge = $stripe->charges()->create([
                'customer' => $stripeCustomer['id'],
                'amount' => (int)$booking->price,
                'currency' => "USD",
                'description' => "Payment for booking ID: " . $booking->id,
            ]);
            //Status
            if ($charge['status'] == 'succeeded') {

                //Success
                session()->flash('status', ['successMessage' => 'Booked Successfully! ', 'code' => $booking->track_code]);


                //Update Payment Status
                Booking::find($booking->id)->update([
                    'paid_at' => now(),
                ]);

                //Insert to payments table
                Payment::create([
                    'amount' => (int)$booking->price,
                    'customer_id' => $booking->customer->id,
                    'booking_id' => $booking->id,
                    'method' => 'STRIPE',
                    'trx_id' => $charge['balance_transaction'],
                ]);

                //Send Mail and Success Message
                $admin = User::find(1);
                //Send Mail to Admin
                $mailData = [
                    'title' => 'Hi, You received new booking!',
                    'text' => 'Login to admin panel and manage!',
                    'url'  => route('bookings.edit', $booking->id),
                ];
                Mail::to($admin->email)->send(new EmailNewOrder($mailData));

                //Send Mail to USER
                $mailData = [
                    'title' => 'Hi, Your booking has been received!',
                    'text' => 'Allow some time for administrator to process! <br> <b>Tracking Code: </b>' . $booking->track_code,
                    'url'  => route('trackWithCode', $booking->track_code),
                ];

                Mail::to($booking->customer->email)->send(new EmailNewOrder($mailData));
                $this->payment_mode = false;
            } else {

                session()->flash('stripe_error', 'Something went wrong!');
            }
        } catch (Exception $e) {

            session()->flash('stripe_error', $e->getMessage());
        }
    }
}
