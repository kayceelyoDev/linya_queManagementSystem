<?php

use App\Http\Controllers\QueController;
use App\Livewire\AddUser;
use App\Livewire\DisplayQue;
use App\Livewire\MainDashboard;
use App\Livewire\ManageQue;
use App\Livewire\QueDashboard;
use App\Livewire\Themetoggle;
use App\Livewire\UpdateUser;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('main');
})->name('home');



Route::get('/displayque', DisplayQue::class);

//route dashboard///
Route::middleware(['auth','verified' ])->group(function (){
        
        Route::prefix('dashboard')->group(function(){
            Route::get('/', MainDashboard::class)->name('dashboard');
            Route::get('/addque', QueDashboard::class)->name('addque');
            Route::get('/manageque', ManageQue::class)->name('manageQue')->middleware('role:staff,admin');
            Route::get('/adduser', AddUser::class)->name('addUser')->middleware('role:admin');
            Route::get('/updateuser', UpdateUser::class)->name('updateUser')->middleware('role:admin');
            Route::get('/updateuser/{id}/edit', UpdateUser::class)->name('updateUser.edit')->middleware('role:admin');
        });
        
});



//settings....//
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
