<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;

class UpdateUser extends Component
{
    public $userId;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = '';

    public function mount($id){
        $user = User::findorFail($id);
        $this->userId = $user->id;
        $this->name = $user->name ?? '';
        $this->email = $user->email ?? '';
        $this->role = $user->role ?? '';
    }
    public function render()
    {   
      

        return view('livewire.update-user');
    }


    public function updateUser(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'role' =>['required','string'],
        ]);

         $user = User::find($this->userId);

        $user->update($validated);
   

        

       
        $this->redirectIntended(route('addUser', absolute: false), navigate: true);
    }

    public function deleteAccount(){
        $user = User::find($this->userId);
        $user->delete();
        $this->redirectIntended(route('addUser', absolute: false), navigate: true);
    }
}
