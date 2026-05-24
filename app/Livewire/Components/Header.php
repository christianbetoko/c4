<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Enterprise;

class Header extends Component
{
    public function render()
    {
        $enterprise = Enterprise::first();
        return view('livewire.components.header', compact('enterprise'));
    }
}
