<?php
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return redirect('/guests');
});

Route::resource('/guests', GuestController::class);

