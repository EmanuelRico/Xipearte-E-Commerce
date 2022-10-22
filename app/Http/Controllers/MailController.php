<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NuevoPedidoAdmin;

class MailController extends Controller
{
    //
    public function index(Type $var = null)
    {
        $data = [
            'subject' => 'hgolla',
        ];
        try{
            Mail::to('fejerogo.17@gmail.com')->send(new NuevoPedidoAdmin($data));
            return response()->json(['dfssdfsdf']);
        }catch(Exception $th){
            return response()->json(['rrro']);
        }
    }
}
