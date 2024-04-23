<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model
{
    use HasFactory;

    public function getAllUsers(){
        $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');

        return $users;
    }
}
