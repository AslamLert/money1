<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbmoney extends Model
{
    use HasFactory;
    //สามารถกำหนดค่า column อะไรได้บ้าง
    protected $fillable = [
        'detail',
        'type',
        'date',
        'amount'

    ];

    // public function user(){
                                            //    money เรียกใช้ {{$row->user()->name}}
    //     return $this->hasOne(User::class,'id','user_id');
    // }
}
