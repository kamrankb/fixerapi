<?php 
use KamranKB\FixerApi\FixerapiController;

Route::controller(FixerapiController::class)->group(function() {
    Route::get('fixer', 'index');
    Route::get('fixer/convert/{currency_from}/{amount}/{currency_to}/', 'convert');
});
