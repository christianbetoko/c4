<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Enterprise;
use App\Models\Social;
class Footer extends Component
{
    public function render()
    {
        $enterprise = Enterprise::first();
        $socials = Social::all();
        return view('livewire.components.footer', compact('enterprise', 'socials'));
    }
}
