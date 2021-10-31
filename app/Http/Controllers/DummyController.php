<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use GeoIP;

class DummyController extends Controller
{
    public function index(Request $request){
        $geoIP = GeoIP::getLocation()->toArray();
        $agent = new Agent();
        $devices = [
            'device' => $agent->device(),
            'platform' => $agent->platform(),
            'browser' => $agent->browser(),
            'isDesktop' => $agent->isDesktop(),
            'isPhone' => $agent->isPhone(),
            'isTablet' =>  $agent->isTablet()
        ];
        return response()->json([
            'url' => $request->url(),
            'ip' => $request->ip(),
            'devices' => $devices,
            'geoip' => $geoIP
        ]);
    }
}
