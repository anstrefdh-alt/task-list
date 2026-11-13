<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// مسار عرض المهام
Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

// مسار إضافة مهمة جديدة
Route::post('/create', function () {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();
});

// مسار جلب المهمة للتعديل
Route::post('/edit/{id}', function ($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('task', 'tasks'));
});

// مسار حفظ التعديل
Route::post('/update/{id}', function ($id) {
    $task_name = $_POST['name'];
    DB::table('tasks')->where('id', $id)->update(['name' => $task_name]);
    return redirect('/tasks');
});

// مسار الحذف
Route::post('/delete/{id}', function ($id) {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});