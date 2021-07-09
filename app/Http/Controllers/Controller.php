<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function amIAdmin(){ 
        if(Auth::user()->type_id==1) {
            return 1;
        }
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function amIteacher(){ 
        if(Auth::user()->type_id==3) {
            return 1;
        }
    }
}
