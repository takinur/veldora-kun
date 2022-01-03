<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPayments extends Component
{
    use WithPagination;

    public function render()
    {

        $data = Payment::with('customer')
                    ->with('booking')
                    ->orderByDesc('created_at')
                    ->paginate(12);

        return view('livewire.admin.show-payments', compact('data'));
    }
}
