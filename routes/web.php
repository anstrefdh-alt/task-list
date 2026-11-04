<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/tasks', function () {
    return view('tasks');
});


Route::post('/create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return view('tasks');
});