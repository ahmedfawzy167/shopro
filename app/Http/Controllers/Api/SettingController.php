<?php

namespace App\Http\Controllers\Api;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function show($id){
        $setting = Setting::find($id);
        if($setting != null){
            return response()->json($setting);
        }
         else{
            return response()->json('this ID not correct');
        }
    }
}
