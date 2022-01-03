<?php

namespace App\Http\Livewire;

use App\Models\DriverBooking;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCompletedTasks extends Component
{
    public function render()
    {

        $tasks = DriverBooking::where('user_id', Auth::user()->id)
            ->with('booking')
            ->orderByDesc('created_at')
            ->get();

        return view('livewire.show-completed-tasks')
            ->with(compact('tasks'))
            ->extends('admin.app')
            ->section('content');
    }
}
