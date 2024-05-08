<?php
use Illuminate\Support\Facades\Route;


// clear all cache :
// Clear application cache:
Route::get('/reboot', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Application All Cache Has Been Cleared';
});





?>

