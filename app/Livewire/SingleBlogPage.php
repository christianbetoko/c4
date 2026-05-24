<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

use Livewire\Attributes\Title;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Comment;
#[Title('Actualité - C4')]
class SingleBlogPage extends Component
{
    public $slug;



    public function mount( $slug){
       
        $this->slug = $slug;
    }
    public function render()
    {
         Carbon::setLocale('fr');
         $post=Post::where('slug',$this->slug)->firstOrFail();
        $comments=Comment::where('post_id',$post->id)->where('is_visible',true)->get();
        $categories=Category::all();
        return view('livewire.single-blog-page', compact('post', 'comments', 'categories'));
    }
}
