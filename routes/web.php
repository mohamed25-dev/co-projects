<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProjectController;
use App\Http\Livewire\NewsLetter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('langauge')->group(function () {
  Route::get('/', [ProjectController::class, 'list'])->name('home');
  Route::get('/projects/{project}', [ProjectController::class, 'view'])->name('projects.show');
  
  Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/projects', ProjectController::class);
    Route::resource('/newsletters', NewsletterController::class);
  });
  
  Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');
});

Route::get('/setlang/{lang}', function ($lang) 
{
  if ($lang == 'ar' || $lang == 'en') {
    session(['langauge' => $lang]);
    return redirect()->back();
  }
  
  //Default is Arabic :)
  session(['langauge' => 'ar']);
  return redirect()->back();
});

