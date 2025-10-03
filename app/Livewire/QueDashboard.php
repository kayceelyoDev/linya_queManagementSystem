<?php

namespace App\Livewire;

use App\Models\QueStatus;
use App\Models\queTable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class QueDashboard extends Component
{
   public $userID;
   public $purpose;
    public $number;
    public $isHaveQue;
    public $userQueNumber;
    public $currentNumber;

    public function addque(){
        $maxNumber = queTable::max('que_number');

        if($maxNumber >= 300){
             $this -> number =  1;
        }else{
             $this -> number = ($maxNumber ?? 0 ) + 1;
        }
       
        $this -> validate([
            'purpose' => 'required',
        ]);
        
        queTable::create([
            'user_id' => $this -> userID,
            'que_number' => $this->number,
            'purpose' => $this-> purpose,
        ]);

    }

    public function render()
    {
        $user = Auth::user();
        $this->userID = $user->id;
        $this->isHaveQue = queTable::where('user_id',$user->id)->where('status', 'waiting')->count();
        $userQue = queTable::where('user_id', $user->id)
                   ->where('status', 'waiting')
                   ->first(); 

        $this->userQueNumber = $userQue ? $userQue->que_number : null;
        $currentQueue = queTable::where('status', 'waiting')->first();
        $this->currentNumber = $currentQueue?->que_number ?? 0;

        return view('livewire.que-dashboard');
    }
 
}
