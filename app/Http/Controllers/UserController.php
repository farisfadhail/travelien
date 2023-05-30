<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::paginate();
        $users = DB::select("SELECT * FROM users");

        return view('users.index', compact('users'));
    }
}
