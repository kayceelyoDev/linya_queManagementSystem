<?php

namespace App\Livewire;

use App\Models\queTable;
use Livewire\Component;

class DisplayQue extends Component
{
    public $currentNum;
    public $nextNum;


    public function render()
    {
        $currentNum = queTable::where('status', 'waiting')->first();
        $this->currentNum = $currentNum ?  $currentNum->que_number : 0; 

        
        $next = queTable::where('status', 'waiting')->skip(1)->first();
        $this->nextNum = $next ? $next->que_number : 0;
        return view('livewire.display-que')
            ->layout('components.layouts.blank');
    }
}
