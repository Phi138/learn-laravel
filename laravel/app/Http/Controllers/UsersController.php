<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Users;

class UsersController extends Controller
{
    public function index(){
        $title = 'Danh sách người dùng';

        $users = new Users();

        $usersList = $users->getAllUsers();
        return view('clients.users.lists', compact('title', 'usersList'));
    }
}
