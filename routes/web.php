<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/Saludar/{name}/{lastname?}', function ($name,$lastname = "Doe") {
    return 'welcome '. $name .' '. $lastname;
})->where(['name' => '^[a-zA-Z]+$', 'lastname' => '^[a-zA-Z]+$']);

Route::get('/sumar/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 + $n2;
    return 'Resultado '. $resultado;
})->where(['n1' => '^[0-9]+$','n2' => '^[0-9]+$']);

Route::get('/restar/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 - $n2;
    return 'Resultado '. $resultado;
})->where(['n1' => '^[0-9]+$','n2' => '^[0-9]+$']);

Route::get('/multi/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 * $n2;
    return 'Resultado '. $resultado;
})->where(['n1' => '^[0-9]+$','n2' => '^[0-9]+$']);

Route::get('/dividir/{n1}/{n2}', function ($n1,$n2) {
    $resultado = $n1 / $n2;
    return 'Resultado '. $resultado;
})->where(['n1' => '^[0-9]+$','n2' => '^[0-9]+$']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
