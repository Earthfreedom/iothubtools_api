<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Device;
use Validator;
use Auth;
use App\Http\Controllers\Controller;

class DevicesController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
    public function __construct(){
        $this->middleware('auth');
    }
    //登録処理関数
    public function store(Request $request)
    {

        $device = new device;
        $device->user_id = Auth::user()->id;
////        $device->device_connect_json = $request->device_connect_json;
////        $device->necessary_sub_device = $request->necessary_sub_device;
        $form = $request->all();
        unset($form['_token']);
        $device->fill($form)->save();
        $devices = device::where('user_id',Auth::user()->id)
            ->orderBy('device_name', 'desc')
            ->get();
        return $devices;
    }
    //表示処理関数
    public function index()
    {
        $devices = device::where('user_id',Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->get();
        return $devices;
    }

    public function destroy($device_id) {
        $device = device::where('user_id',Auth::user()->id)->find($device_id);
        $device->delete();
        $devices = device::where('user_id',Auth::user()->id)
            ->orderBy('updated_at', 'desc')
            ->get();
        return $devices;
    }
}
