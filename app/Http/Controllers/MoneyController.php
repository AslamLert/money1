<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbmoney;
use Illuminate\Support\Facades\DB;

class MoneyController extends Controller
{
    public function index(){
        //เรียกใช้ {{$row->name}}
        // $tbmoney = DB::table('tbmoney')
        // ->join('users','tbmoney.user_id','users.id')
        // ->select('tbmoney.*','users.name');
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
    public function edit($id){
        //dd($id);
        $tbmoney = tbmoney::find($id);
        //dd($transections,$transections->detail);
        return view('admin.edit',compact('tbmoney'));
    }
    public function update(Request $request , $id){
        $request->validate(
            [
                
                'tbmoney_Detail'=>"required|max:255",
                'tbmoney_type'=>"required|in:in,out",
                'tbmoney_date'=>"required",
                'tbmoney_amount' => "required|regex:/^\d+(\.\d{1,2})?$/"
            ],
            [
                'tbmoney_Detail.required'=>"กรุณาป้อนข้อมูลแผนก",
                'tbmoney_type.required'=>"กรุณาเลือก รายรับหรือรายจ่าย",
                'tbmoney_Detail.mex'=>"ห้ามป้อนเกิน 255 ตัวอักษร",
                'tbmoney_date.required'=>"กรุณาเลือกหรือกรอก วันที่",
                'tbmoney_amount.required'=>"กรุณาป้อนจำนวน",
                'tbmoney_amount.regex'=>"รูปแบบจำนวนธุรกรรมไม่ถูกต้อง"
            ]
            );
        //dd($id , $request->tbmoney_Detail,$request->tbmoney_type,$request->tbmoney_date,$request->tbmoney_amount);
        tbmoney::find($id)->update([
            $update =   'detail'=>$request->tbmoney_Detail,
                        'type'=>$request->tbmoney_type,
                        'date'=>$request->tbmoney_date,
                        'amount'=>$request->tbmoney_amount
        ]);
        return redirect()->route('admin')->with('success',"อัพเดตข้อมูลเรียบร้อย");

    }
    public function delete($id){
        //dd($id);
        $delete=tbmoney::find($id)->forceDelete();
        return redirect()->back()->with('success',"ลบข้อมูลเรียบร้อย");
    }
}
