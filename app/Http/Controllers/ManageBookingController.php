<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Notification;
use App\Models\PackageType;
use App\Models\Service;


class ManageBookingController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bookings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $booking = Booking::findOrFail($id);

        $customer = Customer::find($booking->customer_id);

        //Dropdowns
        $services = Service::all();
        $delivery = Delivery::all();
        $notifications = Notification::all();
        $packageTypes = PackageType::all();
        $bookStatus = BookingStatus::all();

        $sizes = [
            ['name' => '1 KG or Less', 'value' => '1'],
            ['name' => '2 KG or Less', 'value' => '2'],
            ['name' => '3 KG or Less', 'value' => '3'],
            ['name' => '4 KG or Less', 'value' => '4'],
            ['name' => '5 KG or Less', 'value' => '5'],

        ];

        return view('admin.bookings.edit')->with(compact('sizes', 'booking', 'bookStatus', 'customer', 'services', 'delivery', 'notifications', 'packageTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Booking $ooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {

        $request->validate(
            [

                'cname' => 'required|max:255|string',
                'cemail' => 'required|email|max:255',
                'cphone' => 'required|string|max:255',
                'caddress' => 'required|string|max:255',
                'size' => 'required|string|max:50',
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
                're_email.required' => 'Please enter Recipients name!',
                're_email.email' => 'Please enter valid Recipients Email!',
                're_phone.required' => 'Please enter Recipients phone number!',
                're_phone.string' => 'Please enter valid phone!',
                're_address.required' => 'Please enter Recipients Address!',
                're_address.string' => 'Please enter valid Address!',
            ]
        );



        $appr = '';

        if ($request->payment == 1) {
            $appr = now();
        } else {
            $appr = null;
        }


        $price = $request->price;

        Customer::find($booking->customer_id)
            ->update([
                'name' => $request->cname,
                'phone' => $request->cphone,
                'email' => $request->cemail,
                'address' => $request->caddress,

            ]);

        Booking::find($booking->id)
            ->update([
                're_name' => $request->re_name,
                're_phone' => $request->re_phone,
                're_email' => $request->re_email,
                'price' => $price,
                'paid_at' => $appr,
                'size' => $request->size,
                're_address' => $request->re_address,
                'date' => date( "Y-m-d", strtotime( $request->date )),
                'service_id' => $request->service,
                'delivery_id' => $request->delivery,
                'notification_id' => $request->notify,
                'package_id' => $request->pkgtype,
                'bookingstatus_id' => $request->bookStatus,
                //'track_code' => $trackingid,
            ]);

        session()->flash('message', 'Booking Updated successfully!');

        return redirect()->route('bookings.index');
    }

}
