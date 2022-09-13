<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkadmin');
    }

    public function changeUserToAdmin($id){
        $user = User::find($id);
        $reply = '404';
        if($user){
            $user->type = 2;
            $user->save();
            $reply = '200';
        }  
        return json_encode($reply);
    }

    public function changeUserToNormal($id){
        $user = User::find($id);
        $reply = '404';
        if($user){
            $user->type = 1;
            $user->save();
            $reply = '200';
        }
        return json_encode($reply);
    }
}
