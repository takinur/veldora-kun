<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TrackingHistory;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Initialize Empty Variable
        $history = [];
        $bstatus = null;

        return view('tracking.index')
            ->with(compact('history', 'bstatus'));
    }

    /**
     * Display the specificied Tracking Info
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function tracking($code)
    {
        return $this->trackingInfo($code);
    }


    public function search(Request $request)
    {

        // Get the search value from the request
        $search = $request->input('search');

        return $this->trackingInfo($search);
    }

    //Search for Code and get history
    public function trackingInfo($code)
    {
        //Sanitize
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $code);
        $words = explode(' ', $term);

        foreach ($words as $idx => $word) {
            // fulltext indices.
            $words[$idx] = $word;
        }

        $code = implode(' ', $words);

        $booking = Booking::where('track_code', $code)
            ->with('bookingStatus')
            ->first();



        if ($booking) {
            $history = TrackingHistory::where('booking_id', $booking->id)
                ->with('user')
                ->with('trackingStatus')
                ->orderBy('created_at', 'desc')
                ->get();

            $bstatus = $booking->bookingStatus->status;
        } else {
            $history = [];
            $bstatus = null;

            session()->flash('status', 'Not Found!');
        }

        return view('tracking.index')
            ->with(compact('history', 'bstatus'));

    }
}
