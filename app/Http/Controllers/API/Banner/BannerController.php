<?php

namespace App\Http\Controllers\API\Banner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ads\AdsResource;
use App\Models\Ads;
use Illuminate\Http\Request;

class BannerController extends Controller
{


    public function index()
    {
        return response()->json(
            [
                'payload' =>  AdsResource::collection(Ads::all()),
                '_response' => ['msg' => 'successfully Banners']
            ],
            200
        );
    }
}
