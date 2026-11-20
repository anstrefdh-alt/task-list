<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    
    public function create()
    {
        $name = $_POST['name'];

         
       
        DB::table('users')->insert([
            'name' => $name,
            'email' => $name . '@example.com',
            'password' => Hash::make('12345678'),
        ]);

        return redirect()->back();
    }

    
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

     
    public function update($id)
    {
        $name = $_POST['name'];
        DB::table('users')->where('id', $id)->update([
            'name' => $name,
        ]);

        return redirect('/users');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }
}