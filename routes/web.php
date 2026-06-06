<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\BlogPage;
use App\Livewire\VisionPage;
use App\Livewire\ContactPage;
use App\Livewire\ToolsPage;
use App\Livewire\JointPage;
use App\Livewire\SingleBlogPage;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomePage::class)->name('home');
Route::get('/actualites', BlogPage::class)->name('blog');
Route::get('/vision', VisionPage::class)->name('vision');
Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/outils', ToolsPage::class)->name('tools');
Route::get('/rejoindre', JointPage::class)->name('joint');
Route::get('/actualites', BlogPage::class)->name('blog');          
Route::get('/actualites/{category_slug}/{slug}', SingleBlogPage::class)->name('blog.single');         

Route::fallback(function () {
    return view('livewire.error-page');
});