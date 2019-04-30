<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Form_regist_datadev extends Model
{
    protected $table = 'form_regist_data';

    /*
    *@params $formtype
    *
    */
    public static function getPrefectureByFormType($formtype)
    {
       return $prefecture_name = DB::table('form_regist_data')
                     ->select(DB::raw('DISTINCT(prefecture_name) as prefecture_name, prefecture_cd'))
                     ->where('form_type', $formtype)
                     ->orderBy('prefecture_cd')
                     ->get();
    }

    public static function getPrefectureName($prefecture_id)
    {
       return $name = DB::table('form_regist_data')->select('prefecture_name')->where('prefecture_cd', $prefecture_id)->value('prefecture_name');
    }

}
