<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form_regist_datadev;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;

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

        $branches = Form_regist_datadev::getBranches();
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
                    'action' => "<a href='/admin/request/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
            }

        return view('tabs.documentrequest',compact('branches'));
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
        $branches = Form_regist_datadev::getBranches();

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
                'action' => "<a href='/admin/orientation/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
            ];
        }

        return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
            
        return view('tabs.orientation', compact('branches'));
    }

    /**
     * Show consultation page with data.
     *
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function consultation(Request $request)
    {   
        $branches = Form_regist_datadev::getBranches();
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
                    'action' => "<a href='/admin/consultation/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                    ->addIndexColumn()
                        ->make(true);
            }
            
                    
        return view('tabs.consultation',  compact('branches'));
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

    /*
    * Get request per branch
    * @params 
    *         $request - ajax get request
    *         $id - id of resource
    */
    public function getBranchRequest(Request $request, $id)
    {
        $branch_name = Form_regist_datadev::getBranchName($id);
        $branches = Form_regist_datadev::getBranches();
        if ($request->ajax()) {
            $model = Form_regist_datadev::select('indexcode','regist_datetime', 'last_name_kanji', 'first_name_kanji', 'mail_address_pc')->where('form_type', 1)->where('branch_cd', $id)->get();
    
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
                    'action' => "<a href='/admin/request/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
            }

        return view('branch.index',compact('branches','branch_name'));
    }

    /*
    *
    * Get orientation form data of branch
    * @params 
    *        $request - ajax get request
    *        $id - branch_cd
    */
    public function getBranchOrientation(Request $request, $id)
    {
        $branch_name = Form_regist_datadev::getBranchName($id);
        $branches = Form_regist_datadev::getBranches();
        if ($request->ajax()) {
            $model = Form_regist_datadev::select('indexcode','regist_datetime', 'last_name_kanji', 'first_name_kanji', 'mail_address_pc')->where('form_type', 2)->where('branch_cd', $id)->get();
    
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
                    'action' => "<a href='/admin/orientation/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
            }

        return view('branch.orientation',compact('branches', 'branch_name'));
    }

    /*
    *
    * Get consultation form data of branch
    * @params 
    *        $request - ajax get request
    *        $id - branch_cd
    */
    public function getBranchConsultation(Request $request, $id)
    {
        $branch_name = Form_regist_datadev::getBranchName($id);
        $branches = Form_regist_datadev::getBranches();
        if ($request->ajax()) {
            $model = Form_regist_datadev::select('indexcode','regist_datetime', 'last_name_kanji', 'first_name_kanji', 'mail_address_pc')->where('form_type', 5)->where('branch_cd', $id)->get();
    
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
                    'action' => "<a href='/admin/consultation/$var->indexcode' class='edit btn btn-primary btn-sm'>View</a>"
                ];
            }
    
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
            }

        return view('branch.consultation',compact('branches','branch_name'));
    }

    /*
    * Get orientation form from resource
    * @params 
    *           $id 
    */
    public function getOrientationById($id)
    {
        $data = Form_regist_datadev::where('indexcode', $id)->get();
        return view('get.orientation', ['data' => $data]);
    }

     /*
    * Get orientation form from resource
    * @params 
    *           $id 
    */
    public function getConsultationById($id)
    {
        $data = Form_regist_datadev::where('indexcode', $id)->get();
        return view('get.consultation', ['data' => $data]);
    }


    public function update(Request $request)
    {
        if(isset( $request->phone[0]) && isset( $request->phone[1]) && isset( $request->phone[2]) && isset( $request->phone[3]) && isset( $request->phone[4]) && isset( $request->phone[5]) && isset( $request->phone[6]) && isset( $request->phone[7]) && isset( $request->phone[8]) && isset( $request->phone[9]) && isset( $request->phone[10]) ) {


            $tel_area_no = $request->phone[0].''.$request->phone[1].''.$request->phone[2];
            $tel_local_no = $request->phone[3].''.$request->phone[4].''.$request->phone[5].''.$request->phone[6];
            $tel_entrant_no = $request->phone[7].''.$request->phone[8].''.$request->phone[8].''.$request->phone[10];

            switch ($request->formtype) {
                case 'orientation':
                    Form_regist_datadev::where('indexcode', $request->indexcode)
                    ->update([
                        'first_name_kanji' => $request->first_name_kanji,
                        'last_name_kanji' => $request->last_name_kanji,
                        'first_name_kana' => $request->first_name_kana,
                        'last_name_kana' => $request->last_name_kana,
                        'tel_area_no' => $tel_area_no,
                        'tel_local_no' => $tel_local_no,
                        'tel_entrant_no' => $tel_entrant_no,
                        'mail_address_pc' => $request->mail_address_pc,
                        'wish_date' => $request->wish_date,
                        'wish2_date' => $request->wish2_date,
                        'wish3_date' => $request->wish3_date
                    ]);

                    return redirect()->back()->with('message', 'Successfully updated!');
                break;
                case 'consultation':
                    Form_regist_datadev::where('indexcode', $request->indexcode)
                    ->update([
                        'first_name_kanji' => $request->first_name_kanji,
                        'last_name_kanji' => $request->last_name_kanji,
                        'first_name_kana' => $request->first_name_kana,
                        'last_name_kana' => $request->last_name_kana,
                        'tel_area_no' => $tel_area_no,
                        'tel_local_no' => $tel_local_no,
                        'tel_entrant_no' => $tel_entrant_no,
                        'mail_address_pc' => $request->mail_address_pc,
                        'wish_date' => $request->wish_date,
                        'wish2_date' => $request->wish2_date,
                        'wish3_date' => $request->wish3_date
                    ]);

                    return redirect()->back()->with('message', 'Successfully updated!');      
                break;
            default:
                Form_regist_datadev::where('indexcode', $request->indexcode)
                ->update([
                    'first_name_kanji' => $request->first_name_kanji,
                    'last_name_kanji' => $request->last_name_kanji,
                    'first_name_kana' => $request->first_name_kana,
                    'last_name_kana' => $request->last_name_kana,
                    'gender_cd' => $request->gender,
                    'age_name' => $request->age_name,
                    'zip_first' => $request->zip_first,
                    'zip_last' => $request->zip_last,
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'tel_area_no' => $tel_area_no,
                    'tel_local_no' => $tel_local_no,
                    'tel_entrant_no' => $tel_entrant_no,
                    'mail_address_pc' => $request->mail_address_pc
                ]);

                return redirect()->back()->with('message', 'Successfully updated!');

            }

        }
        return redirect()->back()->with('error', 'Error: Phone number is invalid! ');
     

       
    }



}
