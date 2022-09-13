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

    public function changeUserTypw($id, $type){
        $user = User::find($id);
        $reply = '404';
        if($user){
            $user->type = intval($type);
            $user->save();
            $reply = '200';
        }  
        return response()->json($reply);
    }
}
