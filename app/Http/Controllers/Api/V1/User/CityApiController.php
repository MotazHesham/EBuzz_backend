<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityApiController extends Controller
{
    //

    public function index(){

        $city=City::get();

        return $this->returnData($city , "success");


    }

    }

