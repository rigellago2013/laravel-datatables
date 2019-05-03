<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Form_regist_datadev extends Model
{
    protected $table = 'form_regist_data';
    public $timestamps = false;
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
                        ->whereIn('branch_cd',[1,2,3,4,5,10,11,15])
                        ->orderBy('branch_cd')
                        ->get();
    }

    public static function getBranchName($branch_cd)
    {
       return $name = DB::table('form_regist_data')->select('branch_name')->where('branch_cd', $branch_cd)->value('branch_name');
    }

}
