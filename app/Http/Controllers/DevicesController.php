<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use Validator;
use Auth;

class DevicesController extends Controller
{
    //クラスが呼ばれたら最初に実行する処理
    public function __construct(){
        $this->middleware('auth');
    }
    //登録処理関数
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'device' => 'required|max:255',
            'deadline' => 'required'
        ]);

        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        // Eloquentモデル
        $devices = new Device;
        $devices->user_id = Auth::user()->id;
        $devices->device = $request->device;
        $devices->deadline = $request->deadline;
        $devices->comment = $request->comment;
        $devices->save();
        //「/」ルートにリダイレクト
        return redirect('/');
    }
    //表示処理関数
    public function index()
    {
        $devices = Device::where('user_id',Auth::user()->id)
            ->orderBy('deadline', 'desc')
            ->get();
        return view('devices', [
            'devices' => $devices
        ]);
    }

    //更新画面表示関数
    public function edit($device_id) {
        $devices = Device::where('user_id',Auth::user()->id)->find($device_id);
        return view('devicesedit', ['device' => $devices]);
    }
    //更新処理関数
    public function update(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'device' => 'required|max:255',
            'deadline' => 'required'
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        //データ更新処理
        $devices = Device::where('user_id',Auth::user()->id)
            ->find($request->id);
        $devices->device = $request->device;
        $devices->deadline = $request->deadline;
        $devices->comment = $request->comment;
        $devices->save();
        return redirect('/');
    }
    //削除処理関数
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect('/');
    }


    //api画面表示用関数
    public function api_test() {
        return view('api_test');
    }





}
