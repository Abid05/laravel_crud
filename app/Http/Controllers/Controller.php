<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

   

    // public function demo(){

    //     return view('demo');
    // }
    
 

    
    public function function2(){

        return view('demo3');
    }
    public function function(){

        return view('demo2');
    }
}

