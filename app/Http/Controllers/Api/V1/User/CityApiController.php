<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Traits\api_return;


class CityApiController extends Controller
{
    //
       use api_return;
    public function index(){

        $city=City::get();

        return $this->returnData($city , "success");


    }

    }

