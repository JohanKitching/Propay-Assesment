<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\personController;
use App\Http\Controllers\MailController;

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

Route::get('/', function () {
    if (auth()->user())
    {
        return redirect(route('dashboard'));
    }
    else
    {
        return redirect(route('login'));
    }
});

Route::get('/dashboard', [personController::class, 'viewPeople'])->middleware(['auth'])->name('dashboard');

Route::get('/newPerson', function () {
    return view('newPerson');
})->middleware(['auth'])->name('newPerson');

Route::get('/editPerson/{id}', [personController::class, 'editPerson'])->middleware(['auth'])->name('editPerson');

Route::get('/viewPerson/{id}', [personController::class, 'viewPerson'])->middleware(['auth'])->name('viewPerson');

Route::get('/removePerson/{id}', [personController::class, 'removePerson'])->middleware(['auth'])->name('removePerson');

Route::post('/SavePerson', [personController::class, 'savePerson'])->middleware(['auth'])->name('SavePerson');

Route::get('mail/send/{id}', 'App\Http\Controllers\MailController@send');

require __DIR__.'/auth.php';
