@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <form class="form-horizontal" id="api_form">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="device_name" class="col-sm-3 control-label">デバイス名</label>
                    <input type="text" name="device_name" id="device_name" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="device_id" class="col-sm-3 control-label">デバイスID</label>
                    <input type="text" name="device_id" id="device_id" class="form-control">
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label for="device_use_line" class="control-label">デバイスに必要な線の本数</label>
                        <input type="number" name="device_use_line" id="device_use_line" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label for="sub_device_true_or_false" class="control-label">サブデバイスを使用するか</label>
                        <select class="form-control" id="sub_device_true_or_false" name="sub_device_true_or_false">
                            <option value="true">使用する</option>
                            <option value="false" selected="selected">使用しない</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="svg_device_1" class="col-sm-3 control-label">デバイスSVGデータ前半</label>
                    <input type="text" name="svg_device_1" id="svg_device_1" class="form-control">
                </div>
                <div class="col-sm-6">
                    <label for="svg_device_2" class="col-sm-3 control-label">デバイスSVGデータ後半</label>
                    <input type="text" name="svg_device_2" id="svg_device_2" class="form-control">
                </div>
                <div class="row">
                    <div class="col-sm-3 control-label">
                        <label for="device_use_mA">デバイス使用ｍA数</label>
                        <input type="number" name="device_use_mA" id="device_use_mA" class="form-control">
                    </div>
                    <div class="col-sm-3 control-label">
                        <label for="device_use_V">デバイス使用V数</label>
                        <input type="number" name="device_use_V" id="device_use_V" class="form-control">
                    </div>
                </div>
            </div>
            <!-- タスク登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="button" class="btn btn-default" id="submit">Save</button>
                </div>
            </div>
        </form>
        <div class="panel panel-default">
            <div class="panel-heading">デバイスリスト</div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                    <th>デバイス</th>
                    <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody id="echo">
                    <!--データ出力部分-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
