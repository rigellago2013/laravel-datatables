<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_regist_datadev;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the document request page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $prefectures = Form_regist_datadev::getPrefectureByFormType(1);
        if ($request->ajax()) {
            $model = Form_regist_datadev::select('indexcode','regist_datetime', 'last_name_kanji', 'first_name_kanji', 'mail_address_pc')->where('form_type', 1)->get();
    
            $data = array();
            $x = 0;
            
            foreach($model as  $var) {
    
                $date = date_create($var->regist_datetime); 
                $final_date = date_format($date,"Y/m/d");
    
                $data[$x++] = [
                    'indexcode' => $var->indexcode,
                    'date' => $final_date,
                    'name' => $var->last_name_kanji.' '.$var->first_name_kanji,
                    'email' => $var->mail_address_pc,
                    'action' => "<a href='request/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->make(true);
                    }
        return view('tabs.documentrequest',['prefectures' => $prefectures]);
    }
    /*
    * Fetch document reqest form type
    *
    */
    public function getDocumentRequestFormType()
    {
        $documentrequest = Form_regist_datadev::where('form_type', 1)->get();
        return response(['data' => $documentrequest]);
    }
    /**
     * Show orientation page with data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orientation(Request $request)
    {
        if ($request->ajax()) {
        $model = Form_regist_datadev::select('indexcode','regist_datetime', 'last_name_kanji', 'first_name_kanji', 'mail_address_pc')->where('form_type', 2)->get();

        $data = array();
        $x = 0;

        foreach($model as  $var) {

            $date = date_create($var->regist_datetime); 
            $final_date = date_format($date,"Y/m/d");

            $data[$x++] = [
                'indexcode' => $var->indexcode,
                'date' => $final_date,
                'name' => $var->last_name_kanji.' '.$var->first_name_kanji,
                'email' => $var->mail_address_pc,
                'action' => "<a href='request/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
            ];
        }

        return Datatables::of($data)
                    ->addIndexColumn()
                    ->make(true);
                }
            
        return view('tabs.orientation');
    }

    /**
     * Show consultation page with data.
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function consultation(Request $request)
    {   
        if ($request->ajax()) {
            $model = Form_regist_datadev::select('indexcode','regist_datetime', 'last_name_kanji', 'first_name_kanji', 'mail_address_pc')->where('form_type', 5)->get();
    
            $data = array();
            $x = 0;
    
            foreach($model as  $var) {
    
                $date = date_create($var->regist_datetime); 
                $final_date = date_format($date,"Y/m/d");
    
                $data[$x++] = [
                    'indexcode' => $var->indexcode,
                    'date' => $final_date,
                    'name' => $var->last_name_kanji.' '.$var->first_name_kanji,
                    'email' => $var->mail_address_pc,
                    'action' => "<a href='request/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->make(true);
            }
            
                    
        return view('tabs.consultation');
    }

    /*
    * Find document request type by Id.
    * @params
    * int $id
    */
    public function getDocumentRequestById($id)
    {
        $data = Form_regist_datadev::where('indexcode', $id)->get();
        return view('get.documentrequest', ['data' => $data]);
    }

    public function editDocumentRequest()
    {
        $data = '';
    }

    /*
    * Document request per prefecture
    * @params id
    */
    public function getDocumentRequestPerPrefecture($id)
    {
        $data = Form_regist_datadev::where('prefecture_cd',  $id)->where('form_type', 1)->get();
        $prefectures = Form_regist_datadev::getPrefectureByFormType(1);
        $name = Form_regist_datadev::getPrefectureName($id);
        return view('get.predfecturedocumentrequest', ['data' => $data, 'prefectures' => $prefectures, 'prefecture_name' => $name ]);
    }
}
