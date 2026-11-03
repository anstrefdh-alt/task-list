<?php

use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    $name = 'Ibrahim';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'] ?? 'Guest';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});