<?php

namespace App\Http\Livewire;

use App\Mail\EmailNewOrder;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Delivery;
use App\Models\Notification;
use App\Models\PackageType;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;


class NewBooking extends Component
{
    public $state = [];

    public $paymentMethod;

    public $sizes;
    public $services;
    public $delivery;
    public $notifications;
    public $packageTypes;

    public $selectedSize = null;
    public $selectedService = null;
    public $selectedDelivery = null;
    public $selectedNotification = null;
    public $selectedpkg = null;


    public function render()
    {



        //Set Default Value
        if (Auth::check()) {
            $this->state['cname'] = Auth::user()->name;
            $this->state['cemail'] = Auth::user()->email;
            $this->state['cphone'] = Auth::user()->phone;
        }

        $this->sizes = [
            ['name' => '1 KG or Less', 'value' => '1'],
            ['name' => '2 KG or Less', 'value' => '2'],
            ['name' => '3 KG or Less', 'value' => '3'],
            ['name' => '4 KG or Less', 'value' => '4'],
            ['name' => '5 KG or Less', 'value' => '5'],

        ];


        //All Dropdown
        $this->services = Service::all();

        $this->delivery = Delivery::all();

        $this->notifications = Notification::all();

        $this->packageTypes = PackageType::all();

        return view('livewire.new-booking');

    }


    //Add booking
    public function AddBooking()
    {

        $validatedData = Validator::make(
            $this->state,
            [
                'cname' => 'required|max:255|string',
                'cemail' => 'required|email|max:255',
                'cphone' => 'required|string|max:255',
                'caddress' => 'required|string|max:255',
                're_name' => 'required|string|max:255',
                're_email' => 'required|email|max:255',
                're_phone' => 'required|string|max:255',
                're_address' => 'required|string|max:255',
                'date' => 'required|date',

            ],
            [   //Custom Message
                'cname.required' => 'Please enter Your Name!',
                'cname.string' => 'Please enter valid Name!',
                'cemail.required' => 'Please enter Your Email!',
                'cemail.email' => 'Please enter valid Email!',
                'cphone.required' => 'Please enter your phone number!',
                'cphone.string' => 'Please enter valid phone!',
                'caddress.required' => 'Please enter your Address!',
                'caddress.string' => 'Please enter valid Address!',
                're_name.required' => 'Please enter Recipients name!',
                're_name.string' => 'Please enter valid Recipients name!',
                're_email.required' => 'Please enter Recipients Email!',
                're_email.email' => 'Please enter valid Recipients Email!',
                're_phone.required' => 'Please enter Recipients phone number!',
                're_phone.string' => 'Please enter valid phone!',
                're_address.required' => 'Please enter Recipients Address!',
                're_address.string' => 'Please enter valid Address!',


            ]
        )->validate();



        /*-------------------------------Calculate Payable Price--------------------------- */

        //Check for Default Values
        //Size
        if ($this->selectedSize == null) {
            $this->selectedSize = 1;
        }
        //Service
        if ($this->selectedService == null) {
            $this->selectedService = 1;
        }
        //Package
        if ($this->selectedpkg == null) {
            $this->selectedpkg = 1;
        }
        //Delivery
        if ($this->selectedDelivery == null) {
            $this->selectedDelivery = 1;
        }
        //Notification
        if ($this->selectedNotification == null) {
            $this->selectedNotification = 1;
        }

        //Selected Prices
        $servicePrice = Service::findOrFail($this->selectedService);
        $packagePrice = PackageType::findOrFail($this->selectedpkg);
        $sizePrice = (int)$this->selectedSize;

        //Payable Amount
        $payable = ($servicePrice->price + $packagePrice->price) * $sizePrice;

        $this->payable = $payable;


        //Create Customer
        $customer = Customer::create([
            'name' => $validatedData['cname'],
            'phone' => $validatedData['cphone'],
            'email' => $validatedData['cemail'],
            'address' => $validatedData['caddress'],

        ]);

        //Generate Tracking Code
        $trackingid = 'MOSCOW' . str_pad($customer->id + 1, 4, "2B", STR_PAD_LEFT) . Carbon::now()->timestamp;

        //Create Booking
        $booked =  Booking::create([
            'customer_id' => $customer->id,
            're_name' => $validatedData['re_name'],
            're_phone' => $validatedData['re_phone'],
            're_email' => $validatedData['re_email'],
            'size' => $this->selectedSize,
            're_address' => $validatedData['re_address'],
            'date' => date("Y-m-d", strtotime($validatedData['date'])),
            'service_id' => $this->selectedService,
            'delivery_id' => $this->selectedDelivery,
            'notification_id' => $this->selectedNotification,
            'package_id' => $this->selectedpkg,
            'price' => $payable,        //Payable Price
            'bookingstatus_id' => '1', //Pending
            'track_code' => $trackingid,
        ]);




        session()->flash('payments', ['book_id' => $booked->id, 'msg' => 'PROCESS_Payment']);

        return redirect(route('pay-stripe'));
    }
}
