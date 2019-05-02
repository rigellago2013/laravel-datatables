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

    public static function getBranches()
    {
       return DB::table('form_regist_data')
                        ->select(DB::raw('DISTINCT(branch_cd) as branch_cd, branch_name'))
                        ->whereNotNull('branch_cd')
                        ->whereNotNull('branch_name')
                        ->orderBy('branch_cd')
                        ->get();
    }

    public static function getPrefectureName($prefecture_id)
    {
       return $name = DB::table('form_regist_data')->select('prefecture_name')->where('prefecture_cd', $prefecture_id)->value('prefecture_name');
    }

}
