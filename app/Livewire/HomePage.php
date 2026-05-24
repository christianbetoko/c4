<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Enterprise;
use App\Models\Post;

use Carbon\Carbon;
use Livewire\Attributes\Title;
#[Title('Accueil - C4')]
class HomePage extends Component
{
    public function render()
    {
        Carbon::setLocale('fr');
            $sliders = Slider::where('status', true)->get();
            $partners = Partner::where('status', true)->get();
            $enterprise = Enterprise::first();
             $posts = Post::where('status','published')->latest()->take(3)->get();
        return view('livewire.home-page', compact('sliders', 'partners', 'enterprise', 'posts'));
    }
}
