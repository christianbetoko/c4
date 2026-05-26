<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Enterprise;
use Carbon\Carbon;
use Livewire\Attributes\Title;
#[Title('Vision - C4')]
class VisionPage extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
        $enterprise = Enterprise::first();
        return view('livewire.vision-page', compact('enterprise'));
    }
}
