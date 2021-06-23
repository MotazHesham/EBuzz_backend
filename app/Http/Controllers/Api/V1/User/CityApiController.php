<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Traits\api_return;
use App\Http\Resources\V1\User\CityResource;

class CityApiController extends Controller
{
    //
       use api_return;
    public function index(){

        $cities=City::get();
        $results = CityResource::collection($cities);
        return $this->returnData($results , "success");


    }

    }

