<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('user.edit', compact('user'));
    }
}
