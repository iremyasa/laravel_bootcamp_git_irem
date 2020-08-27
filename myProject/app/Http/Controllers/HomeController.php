<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function merhaba(){
        $users = User::all();
        return view('merhaba', compact('users'));


    }
    public function createView()
    {
        return view('users.create');
    }

    public function create()
    {
        return 'Kayıt başarıyla tamamlandı!';
    }
    public function goster(){
        $users = DB::table('users')->get();
        $products = DB::table('users')->join('products', 'products.created_by', '=', 'users.id')
            ->select('users.name as u_name', 'products.name as p_name')->get();

        return view('users.index', compact('users', 'products'));
    }
}
