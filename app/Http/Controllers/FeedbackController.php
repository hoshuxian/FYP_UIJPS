<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stdfeedback;
use App\Models\empfeedback;
use App\Models\joboffer;
use App\Models\student;
use Illuminate\Support\Facades\Route;
use Session;
use DB;

class FeedbackController extends Controller
{
    function submitfeedback(Request $req)
    {   
        if($req->session()->has('result')){
            $result=session('result.0.std_name');
            $var = new stdfeedback;
            $var->std_name=$result;
            $var->company_name=$req->companyname;
            $var->rate=$req->rate;
            $var->comment=$req->comment;
            $var->save();
            return redirect('feedback')->with("openpopup()");
        }
    
    }

        function submitempfeedback(Request $req)
    {
        if($req->session()->has('result')){
            $result=session('result.0.company_name');
            $var = new empfeedback;
            $var->company_name=$result;
            $var->std_name=$req->studentname;
            $var->position=$req->position;
            $var->rate=$req->rate;
            $var->comment=$req->comment;
            $var->save();
            return redirect('empfeedback')->with("openpopup()");
        }
    
        }

        function viewfeedback()
{
    $deta = empfeedback::all();
    return view('\Admin\searchfeedback',['deta'=>$deta]);
}

public function feedbacklist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = empfeedback::select('rate','comment','std_name','company_name','position')->where('rate','LIKE', '%' . $deta . '%')->orwhere('comment','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->orwhere('position','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchfeedback', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchfeedback', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function viewstdfeedback()
{
    $deta = stdfeedback::all();
    return view('\Admin\stdsearchfeedback',['deta'=>$deta]);
}

public function stdfeedbacklist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = stdfeedback::select('rate','comment','std_name','company_name')->where('rate','LIKE', '%' . $deta . '%')->orwhere('comment','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchfeedback', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchfeedback', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displaystdfeedback()
{
    $deta = stdfeedback::all();
    return view('\Staff\displaystdfeedback',['deta'=>$deta]);
}

public function displaystdfeedbacklist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = stdfeedback::select('rate','comment','std_name','company_name')->where('rate','LIKE', '%' . $deta . '%')->orwhere('comment','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\displaystdfeedback', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\displaystdfeedback', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displayempfeedback()
{
    $deta = empfeedback::all();
    return view('\Staff\displayempfeedback',['deta'=>$deta]);
}

public function displayempfeedbacklist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = empfeedback::select('rate','comment','std_name','company_name')->where('rate','LIKE', '%' . $deta . '%')->orwhere('comment','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\displayempfeedback', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\displayempfeedback', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

public function select(Request $req)
{
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = DB::table('joboffers')->join('posts','joboffers.post_id','=','posts.post_id')
        ->leftJoin('employers',function($join){
            $join->on('posts.id','=','employers.id');
        })
        ->select('employers.company_name')
        ->where('joboffers.sid','=',$result)
        ->where('joboffers.status','=','Accept')->get();
    return view('\Student\feedback', ['deta' => $deta]);
}
}

public function select2(Request $req)
{
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = DB::table('posts')->join('joboffers','posts.post_id','=','joboffers.post_id')
        ->leftJoin('students',function($join){
            $join->on('joboffers.sid','=','students.id');
        })
        ->select('students.std_name')
        ->where('posts.id','=',$result)
        ->where('joboffers.status','=','Accept')
        ->distinct()->get();

        $var = DB::table('posts')->join('joboffers','posts.post_id','=','joboffers.post_id')
        ->leftJoin('students',function($join){
            $join->on('joboffers.sid','=','students.id');
        })
        ->select('posts.job_title')
        ->where('posts.id','=',$result)
        ->where('joboffers.status','=','Accept')
        ->distinct()->get();

    return view('\Employer\empfeedback', ['deta' => $deta],['var'=>$var]);

    
}
}

}
