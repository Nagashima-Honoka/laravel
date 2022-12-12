<?php

namespace App\Http\Controllers; // appフォルダ内ののHttpフォルダの中にあるControllersフォルダの中にあることを示す

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // Controller as BaseControllerを使える状態にしている

class Controller extends BaseController // BaseControllerクラスを継承する
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
