<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $users;

    public function render()
    {   
        
        $this->users =User::whereIn('role',['admin','staff','student'])->orderBy('status', 'asc')->orderBy('role','asc')->get() ;
        return view('livewire.add-user');
    }
}
