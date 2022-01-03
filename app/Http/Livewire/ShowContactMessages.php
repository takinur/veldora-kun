<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ShowContactMessages extends Component
{
    use WithPagination;

    public function render()
    {
        $data = Contact::orderByDesc('created_at')
        ->paginate(12);

        return view('livewire.show-contact-messages', compact('data'));
    }
}
