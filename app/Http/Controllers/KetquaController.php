<?php

namespace App\Http\Controllers;

use App\Models\Ketqua;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KetquaController extends Controller
{
    //
    public function ketQuaLamBai(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'socaudung' => 'required|int',
            'sodiem' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $ketQua = new Ketqua();
        $ketQua->socaudung = $data['socaudung'];
        $ketQua->sodiem = $data['sodiem'];
        $ketQua->thoigianvaothi = Carbon::now();
        $ketQua->thoigianlambai = 50;
        $ketQua->dethi_id = $data['dethi_id'];
        $ketQua->user_id = $data['user_id'];
        $ketQua->save();
        return response()->json(['message' => 'Nộp bài thành công'], 200);
    }
}
