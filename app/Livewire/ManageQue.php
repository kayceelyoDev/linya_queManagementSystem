<?php

namespace App\Livewire;

use App\Models\queTable;
use Livewire\Component;

class ManageQue extends Component
{   
    public $queues;
    public $currentQue;
    public $currentQueCount;
    public function render()
    { 
        $currentQue = queTable::with('user')->where('status','waiting')->first();
        $this->currentQue = $currentQue;
        $queues = queTable::with('user')->orderby('que_number','asc')->where('status','waiting')->take(30)->get();
        $this->queues = $queues;
        $this->currentQueCount = queTable::where('status','waiting')->count();
        return view('livewire.manage-que');
    }

    public function nextQueue(){
        $currentQue = queTable::with('user')->where('status','waiting')->first();
        $currentQue -> status = "complete";
        $currentQue -> save();
    }
   
}
