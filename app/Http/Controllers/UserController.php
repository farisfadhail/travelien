<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Mengatur untuk function index
    public function index()
    {
        // Mengambil semua data users
        $users = DB::select("SELECT * FROM users");
        
        // Mengarahkan ke tampilan users.index dengan membawa variable $users
        return view('users.index', compact('users'));
    }
}
