<?php

namespace App\Livewire;

use App\Models\queTable;
use Livewire\Component;

class MainDashboard extends Component
{   
    public $currentNum;
    public $nextNum;
    public $numOfQue;
    public $que;
    public function render()
    {   
        //get the current que number
        $current = queTable::where('status', 'waiting') -> first() ?? 0;
        $this-> currentNum = $current ? $current -> que_number : 0;

        //get the next number
        $next  = queTable::where('status', 'waiting')->skip(1)->first();
        $this-> nextNum = $next ? $current -> que_number : 0;

        //fetch all data in one
        $queues = queTable::with('user')->where('status', 'waiting')->orderby('que_number' , 'asc')->take(30)->get();
        $this->que = $queues;
        
        $this->numOfQue = queTable::where('status','waiting')->count();
        return view('livewire.main-dashboard');
    }
}
