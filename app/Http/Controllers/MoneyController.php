<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbmoney;

class MoneyController extends Controller
{
    public function index(){
        $tbmoney = tbmoney::all();
        //return view('admin.index');

        return view('admin.index',compact('tbmoney'));
    }
    public function addMoney(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                
                'money_Detail'=>"required|max:255",
                'money_type'=>"required|in:in,out",
                'money_date'=>"required",
                'money_amount' => "required|regex:/^\d+(\.\d{1,2})?$/"
            ],
            [
                'money_Detail.required'=>"กรุณาป้อนข้อมูลแผนก",
                'money_type.required'=>"กรุณาเลือก รายรับหรือรายจ่าย",
                'money_Detail.mex'=>"ห้ามป้อนเกิน 255 ตัวอักษร",
                'money_date.required'=>"กรุณาเลือกหรือกรอก วันที่",
                'money_amount.required'=>"กรุณาป้อนจำนวน",
                'money_amount.regex'=>"รูปแบบจำนวนธุรกรรมไม่ถูกต้อง"
            ]
        );

        //dd($request->transection_Detail,$request->transection_type,$request->transection_date,$request->transection_amount);

        //บันทึกข้อมูล สร้าง Object
        $tbmoney = new tbmoney;
        //detail=fild tbmoney_Detail=input
        $tbmoney->detail = $request->money_Detail;
        $tbmoney->type = $request->money_type;
        $tbmoney->date = $request->money_date;
        $tbmoney->amount = $request->money_amount;
        $tbmoney->save();
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
    }
}
