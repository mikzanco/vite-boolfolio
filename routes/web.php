<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'index'])->name('home');

// crearto il gruppo di rotte protette da middleware con prefisso ‘admin’ e name ‘admin.’
Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('home');
        Route::get('projects/projects-typology', [ProjectController::class, 'typologies_project'])->name('typologies_project');
        Route::resource('projects', ProjectController::class);
        Route::get('Projects/orderby/{column}/{direction}', [ProjectController::class, 'orderby'])->name('projects.orderby');
    });



require __DIR__.'/auth.php';

// creo la rotta per (any) tutte le rotte vue
Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*')->name('home');
