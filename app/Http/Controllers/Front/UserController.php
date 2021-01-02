<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    //
    public function showUsername()
    {
        return "mubarak ismail";
    }
    public function getIndex()
    {
        /*$obj = new \stdClass();
        $obj -> id = 5;
        $obj -> name = "Mubarak ismail";
        $obj -> gender = "male";*/

        $data=['a'=>'ahmed','b'=>'brince','m'=>'mohamed'];
        return view('welcome',compact('data'));
    }
}
