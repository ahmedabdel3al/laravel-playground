<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Get User expect Current User
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUserExpectCurrentUser()
    {
        return User::where('id','!=',auth()->id())->get();
    }
}
