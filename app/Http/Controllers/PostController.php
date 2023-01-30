<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Employer;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\jobapply;
use App\Models\joboffer;
use Image;
use Session;
use DB;

class PostController extends Controller
{

    function createjob(Request $req)
    {

            //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
            $var = new post;
            if($req->session()->has('result')){
                $result=session('result.0.id');
                //$result = $req->session()->all();
                //dd($result);
                $var->id=$result;
            $var->job_title=$req->job_title;
            $var->job_venue=$req->job_venue;
            $var->job_address=$req->job_address;
            $var->position_available=$req->position_available;
            $var->job_salary=$req->job_salary;
            $var->job_category=$req->job_category;
            $var->job_description=$req->job_description;
            $var->job_benefit=$req->job_benefit;
            $var->job_highlight=$req->job_highlight;
            $var->job_requirement=$req->job_requirement;
            $var->save();
            return redirect('searchpost')->with('successMsg','Job Post Successfully !');
            }
    }

    function viewpostlist(Request $req)
    {
        if($req->session()->has('result')){
            $result=session('result.0.id');
        $deta = DB::table('posts')->select('*')->where('posts.id', '=', $result)->get();
        return view('\Employer\searchpost',['deta'=>$deta]);
        }
    }

    public function postlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = post::select('*')->where('job_title','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Employer\searchpost', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Employer\searchpost', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displaypost(Request $req,$post_id)

{
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit','posts.job_applynumber','posts.hired','posts.position_available', 'employers.company_description', 'employers.company_size', 'employers.reg_no', 'posts.post_id')
        ->where('posts.id', '=', $result)->where('posts.post_id', '=', $post_id)->get();
    return view('\Employer\displaypost', ['deta' => $deta]);
    }
}

public function deletepost($post_id)
{
    
    $result = post::select('*')->where('post_id', '=', $post_id)->delete();
    $deta = joboffer::select('*')->where('post_id', '=', $post_id)->delete();
    $detaa = jobapply::select('*')->where('post_id', '=', $post_id)->delete();
    return redirect('searchpost')->with('successMsg','Profile Successful deleted !');
}

public function deletehiredlist($post_id,$id)
{
    $result = joboffer::select('*')->where('post_id', '=', $post_id)->where('sid','=',$id)->delete();
    $detaa =  DB::table('posts')->select('post_id')->where('post_id','=',$post_id)->decrement('hired');
    $deta = DB::table('students')->join('joboffers', 'joboffers.sid', '=', 'students.id')
    ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum', 'students.id','joboffers.post_id')
    ->where('joboffers.post_id', '=', $post_id)->get();
    return view('\Employer\displayhiredlist', ['deta' => $deta])->with('successMsg','Profile Successful deleted !');
}

function updatepost($post_id)

{
    $result = post::select('*')->where('post_id', '=', $post_id)->get();
    return view('\Employer\updatepost', ['result' => $result]);
}

function postupdate(Request $req, $post_id)
{
            if($req->session()->has('result')){
                $result=session('result.0.id');
                $var = post::where('post_id', '=', $req->post_id)->where('id','=',$result)->first();
                $var->job_title=$req->input('job_title');
                $var->job_venue=$req->input('job_venue');
                $var->job_address=$req->input('job_address');
                $var->position_available=$req->input('position_available');
                $var->job_salary=$req->input('job_salary');
                $var->job_category=$req->input('job_category');
                $var->job_description=$req->input('job_description');
                $var->job_benefit=$req->input('job_benefit');
                $var->job_highlight=$req->input('job_highlight');
                $var->job_requirement=$req->input('job_requirement');
                $var->update();
                return redirect('searchpost')->with('successMsg','Job Post Successfully !');
                }

    }

function viewallpostlist()
    {

        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')->get();
    return view('\Employer\searchallpost', ['deta' => $deta]);
    }

    public function allpostlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
    ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')
    ->where('posts.job_title','LIKE', '%' . $deta . '%')->orwhere('posts.job_salary','LIKE', '%' . $deta . '%')->orwhere('posts.job_venue','LIKE', '%' . $deta . '%')->orwhere('employers.company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Employer\searchallpost', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Employer\searchallpost', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displayallpost(Request $req,$post_id)

{
        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit', 'posts.job_applynumber', 'posts.hired' ,'posts.position_available','employers.company_description', 'employers.company_size', 'employers.reg_no', 'employers.company_name', 'employers.id', 'employers.company_logo','posts.post_id')
        ->where('posts.post_id', '=', $post_id)->get();
    return view('\Employer\displayallpost', ['deta' => $deta]);
}

function viewjoblist()
    {

        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')->get();
    return view('\Student\searchjob', ['deta' => $deta]);
    }

    public function joblist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
    ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')
    ->where('posts.job_title','LIKE', '%' . $deta . '%')->orwhere('posts.job_salary','LIKE', '%' . $deta . '%')->orwhere('posts.job_venue','LIKE', '%' . $deta . '%')->orwhere('employers.company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Student\searchjob', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Student\searchjob', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displayjob(Request $req,$post_id)

{
    $apply = post::select('position_available','hired')->where('post_id', '=', $post_id)->first();
    if($apply->position_available === $apply->hired){
        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit', 'posts.job_applynumber', 'posts.position_available', 'posts.hired', 'employers.company_description', 'employers.company_size', 'employers.reg_no', 'employers.company_name', 'employers.id', 'employers.company_logo', 'posts.post_id')
        ->where('posts.post_id', '=', $post_id)->get();
        return view('\Student\displayjob', ['deta' => $deta])->with('disable',true);
    }else if($req->session()->has('result')){
            $result=session('result.0.id');
            $apply = jobapply::select('id')->where('post_id', '=', $post_id)->where('id','=',$result)->first();
           if($apply != null){
                $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
                ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit', 'posts.job_applynumber', 'posts.position_available', 'posts.hired', 'employers.company_description', 'employers.company_size', 'employers.reg_no', 'employers.company_name', 'employers.id', 'employers.company_logo', 'posts.post_id')
                ->where('posts.post_id', '=', $post_id)->get();
                return view('\Student\displayjob', ['deta' => $deta])->with('disable',true);
            }else {
            $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
            ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit', 'posts.job_applynumber', 'posts.position_available', 'posts.hired', 'employers.company_description', 'employers.company_size', 'employers.reg_no', 'employers.company_name', 'employers.id', 'employers.company_logo', 'posts.post_id')
            ->where('posts.post_id', '=', $post_id)->get();
            return view('\Student\displayjob', ['deta' => $deta]); 
        }
    }
}
    


function apply(Request $req,$post_id)
{
        $deta =  DB::table('posts')->select('post_id')->where('post_id','=',$post_id)->increment('job_applynumber');
    $var = new jobapply;
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $var->id=$result;
    $var->post_id=$post_id;
    $var->save();
    return redirect('searchjob')->with('successMsg','Your apply had been sent to the company!');
    }
}

function displaystudentapply(Request $req,$post_id)

{
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
        ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum', 'students.id','jobapplies.post_id','jobapplies.status')
        ->where('jobapplies.post_id', '=', $post_id)->get();
    return view('\Employer\displaystudentapply', ['deta' => $deta]);
    }
}

function displayhiredlist(Request $req,$post_id)

{
        $deta = DB::table('students')->join('joboffers', 'joboffers.sid', '=', 'students.id')
        ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum', 'students.id','joboffers.post_id')
        ->where('joboffers.post_id', '=', $post_id) ->where('joboffers.status', '=', 'Accept')->get();
    return view('\Employer\displayhiredlist', ['deta' => $deta]);
}

function display(Request $req,$post_id,$id)

{
    /*$deta = joboffer::Select('id')->where('post_id', '=', $post_id)->first();
        if($deta->id === $id){
            $result = DB::table('students')->join('joboffers', 'jobpffers.id', '=', 'students.id')
            ->select('students.std_name', 'students.std_matric', 'students.std_address', 'students.std_phonenum','students.std_email','students.std_faculty','students.std_description','students.std_pic','students.resume','students.id','students.standard','jobapplies.post_id')
            ->where('students.id','=',$id)
            ->where('joboffers.post_id', '=', $post_id)->get();
            return view('\Employer\display', ['result' => $result])->with('disable',true);
    }else {*/

        $hired = joboffer::select('post_id')->where('post_id', '=', $post_id)->first();
        if ($hired != null){
            $result = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
            ->select('students.std_name', 'students.std_matric', 'students.std_address', 'students.std_phonenum','students.std_email','students.std_faculty','students.std_description','students.std_pic','students.resume','students.id','students.standard','jobapplies.post_id')
            ->where('students.id','=',$id)
            ->where('jobapplies.post_id', '=', $post_id)->get();
            return view('\Employer\display', ['result' => $result])->with('disable',true);
        }else{
            $result = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
            ->select('students.std_name', 'students.std_matric', 'students.std_address', 'students.std_phonenum','students.std_email','students.std_faculty','students.std_description','students.std_pic','students.resume','students.id','students.standard','jobapplies.post_id')
            ->where('students.id','=',$id)
            ->where('jobapplies.post_id', '=', $post_id)->get();
            
            $detaa= DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
            ->select('students.id')
            ->where('students.id','=',$id)
            ->where('jobapplies.post_id', '=', $post_id)->get();
            $req->session()->put('hire',$detaa);

            return view('\Employer\display', ['result' => $result]);
        }
    }

    function offerprofile(Request $req,$post_id,$id)

{
            $result = DB::table('students')->join('joboffers', 'joboffers.sid', '=', 'students.id')
            ->select('students.std_name', 'students.std_matric', 'students.std_address', 'students.std_phonenum','students.std_email','students.std_faculty','students.std_description','students.std_pic','students.resume','students.id','students.standard','joboffers.post_id')
            ->where('students.id','=',$id)
            ->where('joboffers.post_id', '=', $post_id)->get();

            return view('\Employer\offerprofile', ['result' => $result]);
}



/*public function searchapply(request $request,$post_id)
{
   
    if($request->session()->has('result')){
        $result=session('result.0.id');
        $deta = $request->input('deta'); 
        $deta = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
        ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum','students.id','jobapplies.post_id')
        ->where('students.std_matric','LIKE', '%' . $deta . '%')
        ->orwhere('students.std_name','LIKE', '%' . $deta . '%')
        ->orwhere('students.std_email','LIKE', '%' . $deta . '%')
        ->orwhere('students.std_phonenum','LIKE', '%' . $deta . '%')
        ->where('jobapplies.post_id', '=', $post_id)->get();
        if (count ( $deta ) > 0){
        return view('\Employer\displaystudentapply', ['deta' => $deta])->with('successMsg','Results Found !');
        }
        else {
        if($request->session()->has('result')){
            $result=session('result.0.id');
            $deta = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
            ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum', 'students.id','jobapplies.post_id')
            ->where('jobapplies.post_id', '=', $post_id)->get();
        return view ('\Employer\displaystudentapply', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );	
        }
    }
}

}*/

function hired(Request $req,$post_id,$id)
{

    $var = new joboffer;
    if($req->session()->has('hire')){
        $result = Session::get('hire');
        $var->post_id=$post_id;
        $var->sid=$id;
    $var->save();

    $deta = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
        ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum', 'students.id','jobapplies.post_id','jobapplies.status')
        ->where('jobapplies.post_id', '=', $post_id)->get();
        $detaa = jobapply::Select('apply_id')->where('id', '=', $id)->where('post_id','=',$post_id)->get();
        $req->session()->put('offer',$detaa);
        if($req->session()->has('offer')){
            $result=session('offer.0.apply_id');
            $var = jobapply::where('apply_id', '=', $result)->first();
        $var->status = 'Offer';
        $var->update();
        $deta = DB::table('students')->join('jobapplies', 'jobapplies.id', '=', 'students.id')
        ->select('students.std_matric', 'students.std_name', 'students.std_email', 'students.std_phonenum', 'students.id','jobapplies.post_id','jobapplies.status')
        ->where('jobapplies.post_id', '=', $post_id)->get();
        }
    return view ('\Employer\displaystudentapply', ['deta' => $deta])->with('successMsg','Your offer had been sent to the student!');
    }
    
}

function receiptoffer(Request $req)

{
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = DB::table('joboffers')->join('students', 'joboffers.sid', '=', 'students.id')
        ->join('posts','joboffers.post_id','=','posts.post_id')
        ->leftJoin('employers',function($join){
            $join->on('posts.id','=','employers.id');
        })
        ->select('employers.company_name', 'employers.company_email', 'employers.company_officenum','posts.post_id','joboffers.id','posts.job_title','joboffers.status')
        ->where('joboffers.sid','=',$result)->get();
        return view('\Student\receiptoffer', ['deta' => $deta]);
    }
}

function displayoffer($post_id)

{
    $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
    ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit', 'posts.job_applynumber', 'posts.position_available', 'posts.hired', 'employers.company_description', 'employers.company_size', 'employers.reg_no', 'employers.company_name', 'employers.id', 'employers.company_logo', 'posts.post_id')
    ->where('posts.post_id', '=', $post_id)->get();
    return view('\Student\displayoffer', ['deta' => $deta])->with('successMsg','Congratulations!! You get the offer!!');
}

function accept(Request $req,$post_id)
{
    $deta =  DB::table('posts')->select('post_id')->where('post_id','=',$post_id)->increment('hired');
    
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = joboffer::Select('id')->where('post_id', '=', $post_id)->where('sid','=',$result)->get();
        $detaa= joboffer::find($deta)->first();
        $detaa->status = 'Accept';
        $detaa->update();
        return redirect('receiptoffer')->with('successMsg','Your reply had been sent to the company!');
        }
}

function viewlist()
    {

        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')->get();
    return view('\Admin\viewalljobpost', ['deta' => $deta]);
    }

    public function alllist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
    ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')
    ->where('posts.job_title','LIKE', '%' . $deta . '%')->orwhere('posts.job_salary','LIKE', '%' . $deta . '%')->orwhere('posts.job_venue','LIKE', '%' . $deta . '%')->orwhere('employers.company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\viewalljobpost', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\viewalljobpost', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displayalllist(Request $req,$post_id)

{
        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit','posts.job_applynumber','posts.hired','posts.position_available', 'employers.company_description', 'employers.company_logo','employers.company_name','employers.company_size', 'employers.reg_no', 'posts.post_id')
        ->where('posts.post_id', '=', $post_id)->get();
    return view('\Admin\displayjobpost', ['deta' => $deta]);
}

function alljoblist()
    {

        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')->get();
    return view('\Staff\viewjobpost', ['deta' => $deta]);
    }

    public function searchjoblist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
    ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_benefit', 'posts.job_applynumber', 'employers.company_name', 'employers.company_logo', 'posts.post_id')
    ->where('posts.job_title','LIKE', '%' . $deta . '%')->orwhere('posts.job_salary','LIKE', '%' . $deta . '%')->orwhere('posts.job_venue','LIKE', '%' . $deta . '%')->orwhere('employers.company_name','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\viewjobpost', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\viewjobpost', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function showjob(Request $req,$post_id)

{
        $deta = DB::table('employers')->join('posts', 'posts.id', '=', 'employers.id')
        ->select('posts.job_salary', 'posts.job_title', 'posts.job_venue', 'posts.job_description', 'posts.job_requirement', 'posts.job_category', 'posts.job_benefit','posts.job_applynumber','posts.hired','posts.position_available', 'employers.company_description', 'employers.company_logo','employers.company_size', 'employers.reg_no', 'posts.post_id')
        ->where('posts.post_id', '=', $post_id)->get();
    return view('\Staff\showjob', ['deta' => $deta]);
}

function report(Request $req)
    {
        if($req->session()->has('result')){
            $result=session('result.0.id');
            $deta = DB::table('joboffers')->join('students', 'joboffers.sid', '=', 'students.id')
            ->join('posts','joboffers.post_id','=','posts.post_id')
            ->leftJoin('employers',function($join){
                $join->on('posts.id','=','employers.id');
            })
            ->select('employers.company_name','posts.job_title','joboffers.status','students.std_name','students.std_matric')->get();
            return view('\Staff\report', ['deta' => $deta]);
        }
    }

    public function searchreport(request $req)
{
   
    $deta = $req->input('deta'); 
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $deta = DB::table('joboffers')->join('students', 'joboffers.sid', '=', 'students.id')
        ->join('posts','joboffers.post_id','=','posts.post_id')
        ->leftJoin('employers',function($join){
            $join->on('posts.id','=','employers.id');
        })
        ->select('employers.company_name','posts.job_title','joboffers.status','students.std_name','students.std_matric')
        ->where('posts.job_title','LIKE', '%' . $deta . '%')->orwhere('employers.company_name','LIKE', '%' . $deta . '%')->orwhere('joboffers.status','LIKE', '%' . $deta . '%')->orwhere('students.std_name','LIKE', '%' . $deta . '%')->orwhere('students.std_matric','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\report', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\report', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    }
    
}

}
