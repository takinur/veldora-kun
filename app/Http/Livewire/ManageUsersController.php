<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ManageUsersController extends Component
{

    public $search;

    public $usrid;

    use WithPagination;

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

       $users=  User::whereNotIn('id', [auth()->id()])
        ->where(function($query) use ($keyword) {
            $query->OrWhere('name', 'LIKE', $keyword)
                  ->orWhere('email', 'LIKE', $keyword)
                  ->orWhere('phone', 'LIKE', $keyword);
        })
        ->orderByDesc('created_at')
        ->paginate(12);

        return view('livewire.manage-users-controller')
            ->with(compact('users'));
    }

    //bind id
    public function deleteUser($id)
    {
        $this->usrid = $id;
    }

    public function removeUser()
    {


        if ($this->usrid) {
            User::where('id', $this->usrid)->delete();

            session()->flash('message', 'User Removed successfully!');
        }
    }
}
