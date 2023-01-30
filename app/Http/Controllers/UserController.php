<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employer;
use App\Models\Admin;
use App\Models\blacklist;
use App\Models\staff;
use App\Models\studentratingscale;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Manage Sign Up

    function studentsignup(Request $req)
    {
        $std_email = $req->input('std_email'); 
        $std_password = $req->input('std_password'); 
        $std_confirmpassword = $req->input('std_confirmpassword'); 
        $std_email = Student::select('std_email')->where('std_email','=',$std_email)->get();
        
        if (count ( $std_email ) > 0){
            if(($std_password) !== ($std_confirmpassword)){
                return view('\Sign up\signup', ['std_email' => $std_email],['std_password' => $std_password],['std_confirmpassword' => $std_confirmpassword])->with('successMsg','Email already exist!')->with('failedMsg','Password and Confirm password unmatch!');
            }
        return view('\Sign up\signup', ['std_email' => $std_email])->with('successMsg','Email already exist!');
        }else  if(($std_password) !== ($std_confirmpassword)){
            return view('\Sign up\signup', ['std_password' => $std_password],['std_confirmpassword' => $std_confirmpassword])->with('successMsg','Password and Confirm password unmatch!');
        } else{
        $var = new student;
        $var->std_name=$req->sname;
        $var->std_matric=$req->sid;
        $var->std_address=$req->saddress;
        $var->std_phonenum=$req->sphonenum;
        $var->std_email=$req->std_email;
        $var->std_password=$req->std_password;
        $var->std_confirmpassword=$req->std_confirmpassword;
        $var->std_faculty=$req->sfaculty;
        $var->std_description=$req->sdescription;
        $var->save();
        $email = $req->input('std_email'); 
        $result = student::select('id')->where('std_email', '=', $email)->get();
        $req->session()->put('result',$result);
        return redirect('studentratingform')->with('successMsg','Sign Up successfully !');	
        }
    }

    function employersignup(Request $req)
    {
        $company_email = $req->input('company_email'); 
        $company_password = $req->input('company_password'); 
        $company_confirmpass = $req->input('company_confirmpass'); 
        $company_name = $req->input('company_name'); 
        $company_address = $req->input('company_address'); 
        $company_email = employer::select('company_email')->where('company_email','=', $company_email)->get();
        $company_name= blacklist::select('companyname')->where('companyname','=',$company_name)->get();
        
        if (count ( $company_email ) > 0){
            if(($company_password) !== ($company_confirmpass)){
                return view('\Sign up\signup', ['company_email' => $company_email],['company_password' => $company_password],['company_confirmpass' => $company_confirmpass])->with('successMsg','Email already exist!')->with('failedMsg','Password and Confirm password unmatch!');
            }
        return view('\Sign up\signup', ['company_email' => $company_email])->with('successMsg','Email already exist!');
        }else  if(($company_password) !== ($company_confirmpass)){
            return view('\Sign up\signup', ['company_password' => $company_password],['company_confirmpass' => $company_confirmpass])->with('successMsg','Password and Confirm password unmatch!');
        } else if(count($company_name) > 0){
            return view('\Sign up\signup')->with('failedMsg','Sorry, Your company authentication is not approved!!');
        }else{
        $var = new employer;
        $var->company_name=$req->company_name;
        $var->reg_no=$req->e_reg_no;
        $var->company_address=$req->company_address;
        $var->company_officenum=$req->eofficenum;
        $var->company_faxnumber=$req->efaxnum;
        $var->company_email=$req->company_email;
        $var->company_password=$req->company_password;
        $var->company_confirmpass=$req->company_confirmpass;
        $var->company_size=$req->size;
        $var->company_description=$req->edescription;
        $var->save();
        $company_email = $req->input('company_email'); 
        $result = employer::select('id')->where('company_email', '=', $company_email)->get();
        $req->session()->put('result',$result);
        return view('\Login\login')->with('successMsg','Sign Up successfully !');	
        }
    }
    
    //Manage Login

    function login(Request $req){
       // return $req->input();
       $role_type = $req->input('role'); 
        if ($role_type === 'student') {
            $email = $req->input('email'); 
            $password = $req->input('password'); 
            $deta = Student::select('std_email','std_password')->where('std_email','=', $email)->where('std_password','=', $password)->get();
            if (count ( $deta ) >0){
                $result = student::select('*')->where('std_email', '=', $email)->get();
                $req->session()->put('result',$result);
                return redirect('showstdprofile');
            }else{
                return view('\Login\login')->with('failedMsg','Email and password unmatched !');
            }
        }else if ($role_type === 'Company') {
            $email = $req->input('email'); 
            $password = $req->input('password'); 
            $deta = employer::select('company_email','company_password')->where('company_email','=', $email)->where('company_password','=', $password)->get();
            if (count ( $deta ) >0){
                $result = employer::select('*')->where('company_email', '=', $email)->get();
                //$req-> session(['result' => request()->all()]);
                $req->session()->put('result',$result);
                return redirect('showempprofile');
            }else{
                return view('\Login\login')->with('failedMsg','Email and password unmatched !');
            }
        }else if ($role_type === 'Admin') {
            $email = $req->input('email'); 
            $password = $req->input('password'); 
            $deta = admin::select('admin_email','admin_password')->where('admin_email','=', $email)->where('admin_password','=', $password)->get();
            if (count ( $deta ) >0){
                $result = admin::select('*')->where('admin_email', '=', $email)->get();
                //$req-> session(['result' => request()->all()]);
                $req->session()->put('result',$result);
                return redirect('searchstdprofile');
            }else{
                return view('\Login\login')->with('failedMsg','Email and password unmatched !');
            }
        }else if ($role_type === 'Staff') {
            $email = $req->input('email'); 
            $password = $req->input('password'); 
            $deta = staff::select('staff_email','staff_password')->where('staff_email','=',  $email)->where('staff_password','=', $password)->get();
            if (count ( $deta ) >0){
                $result = staff::select('*')->where('staff_email', '=', $email)->get();
                //$req-> session(['result' => request()->all()]);
                $req->session()->put('result',$result);
                return redirect('myprofile');
            }else{
                return view('\Login\login')->with('failedMsg','Email and password unmatched !');
            }
        }else {
            return view('\Sign Up\signup')->with('failedMsg','Login Unsuccessful');
        }
    }

    function logout(Request $request)
    {
        request()->session()->regenerate(true);
        request()->session()->flush();
        return redirect('/login');
    }

    function tryreset(Request $req)
    {
        $result = $req->input('email'); 
        $req->session()->put('result',$result);
        return redirect('resetpassword');
    }
    
    function reset(Request $req)
    {

        if($req->session()->has('result')){
            $result=session('result');
            $var = student::where('std_email',$result)->first();
            $var->std_password=$req->input('password');
            $var->std_confirmpassword=$req->input('confirmpassword');
            $var->update();
            return view('\Login\login')->with('successMsg','Reset password successful!');
        }

    }

    //Manage Student
    //Create New Student Profile
    function createstudent(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }

        if (request()->has('resume') ){
            $resumeuploaded = request()->file('resume');
            $resumename = time() . '.' . $resumeuploaded->getClientOriginalExtension();
            $resumepath = public_path('/');
            $resumeuploaded->move($resumepath,$resumename);
        }

            //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
            $var = new student;
            $var->std_name=$req->name;
            $var->std_matric=$req->matric;
            $var->std_address=$req->address;
            $var->std_phonenum=$req->phonenum;
            $var->std_email=$req->email;
            $var->std_password=$req->password;
            $var->std_confirmpassword=$req->confirmpassword;
            $var->std_faculty=$req->faculty;
            $var->std_description=$req->description;
            $var->resume='/' . $resumename;
            $var->std_pic = '/' . $imagename;
            $var->save();
            return redirect('searchstdprofile')->with('successMsg','Profile Successful created !');
            }


//Manage Employer
    //Create New Employer Profile
    function createemployer(Request $req)
    {
        if (request()->has('image')){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }
            //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
            $var = new employer;
            $var->company_name=$req->name;
            $var->reg_no=$req->reg;
            $var->company_address=$req->address;
            $var->company_officenum=$req->officenum;
            $var->company_faxnumber=$req->faxnum;
            $var->company_email=$req->email;
            $var->company_password=$req->password;
            $var->company_confirmpass=$req->confirmpassword;
            $var->company_size=$req->company;
            $var->company_description=$req->description;
            $var->company_logo = '/' . $imagename;
            $var->save();
            return redirect('searchempprofile')->with('successMsg','Profile Successful created !');

}

function viewstudentlist()
{
    $deta = Student::all();
    return view('\Admin\searchstdprofile',['deta'=>$deta]);
}

public function studentlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = Student::select('std_matric','std_name','std_email','std_phonenum','id')->where('std_matric','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('std_email','LIKE', '%' . $deta . '%')->orwhere('std_phonenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchstdprofile', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchstdprofile', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

public function deletestudentprofile($id)
{
    $result = Student::select('*')->where('id', '=', $id)->delete();
    return redirect('searchstdprofile')->with('successMsg','Profile Successful deleted !');
}

function searchstd()
{
    $deta = Student::all();
    return view('\Staff\searchstd',['deta'=>$deta]);
}

public function list(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = Student::select('std_matric','std_name','std_email','std_phonenum','id')->where('std_matric','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('std_email','LIKE', '%' . $deta . '%')->orwhere('std_phonenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\searchstd', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\searchstd', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function display($id)

{
    $result = student::select('*')->where('id', '=', $id)->get();
    return view('\Staff\display', ['result' => $result]);
}

function profile($reg_no)

{
    $result = employer::select('*')->where('reg_no', '=', $reg_no)->get();
    return view('\Staff\displayemp', ['result' => $result]);
}

//employer
function viewemployerlist()
{
    $deta = employer::all();
    return view('\Admin\searchempprofile',['deta'=>$deta]);
}

public function employerlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = employer::select('reg_no','company_name','company_email','company_officenum')->where('reg_no','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->orwhere('company_email','LIKE', '%' . $deta . '%')->orwhere('company_officenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchempprofile', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchempprofile', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function searchemp()
{
    $deta = employer::all();
    return view('\Staff\searchemp',['deta'=>$deta]);
}

public function emplist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = employer::select('reg_no','company_name','company_email','company_officenum')->where('reg_no','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->orwhere('company_email','LIKE', '%' . $deta . '%')->orwhere('company_officenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\searchemp', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\searchemp', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

public function deleteemployerprofile($reg_no)
{
    $result = employer::select('*')->where('reg_no', '=', $reg_no)->delete();
    return redirect('searchempprofile')->with('successMsg','Profile Successful deleted !');
}

function displaystdprofile($id)

{
    $result = student::select('*')->where('id', '=', $id)->get();
    return view('\Admin\displaystdprofile', ['result' => $result]);
}

function displayempprofile($reg_no)

{
    $result = employer::select('*')->where('reg_no', '=', $reg_no)->get();
    return view('\Admin\displayempprofile', ['result' => $result]);
}

public function updateempprofile($id)
{
    $result = employer::select('*')->where('id', '=', $id)->get();
    return view('\Admin\updateempprofile', ['result' => $result]);
}

function update(Request $req)
    {
        if (request()->has('image')){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }
            $var = employer::find($req->id);
            $var->company_name=$req->input('name');
            $var->reg_no=$req->input('reg_no');
            $var->company_address=$req->input('address');
            $var->company_officenum=$req->input('officenum');
            $var->company_faxnumber=$req->input('faxnum');
            $var->company_email=$req->input('email');
            $var->company_password=$req->input('password');
            $var->company_confirmpass=$req->input('confirmpassword');
            $var->company_size=$req->input('company');
            $var->company_description=$req->input('description');
            $var->company_logo = '/' . $imagename;
            $var->update();
            return redirect('searchempprofile')->with('successMsg','Profile Successful updated !');

}

function showstdprofile($id)

{
    $result = student::select('*')->where('id', '=', $id)->get();
    return view('\Student\showstdprofile', ['result' => $result]);
}

function showempprofile(Request $req)

{
    if($req->session()->has('result')){
        $result=session('result.0.id');
        $result = student::select('*')->where('id', '=', $result)->get();
    return view('\Employer\showempprofile', ['result' => $result]);
    }
}

public function editempprofile($id)
{
    $result = employer::select('*')->where('id', '=', $id)->get();
    return view('\Employer\editempprofile', ['result' => $result]);
}

public function editprofile($id)
{
    $result = student::select('*')->where('id', '=', $id)->get();
    return view('\Student\editprofile', ['result' => $result]);
}

function edit(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }

        if (request()->has('resume') ){
            $resumeuploaded = request()->file('resume');
            $resumename = time() . '.' . $resumeuploaded->getClientOriginalExtension();
            $resumepath = public_path('/');
            $resumeuploaded->move($resumepath,$resumename);
        }

        if($req->session()->has('result')){
            $result=session('result.0.id');
            $var = student::find($result);
            $var->std_name=$req->input('name');
            $var->std_matric=$req->input('matric');
            $var->std_address=$req->input('address');
            $var->std_phonenum=$req->input('phonenum');
            $var->std_email=$req->input('email');
            $var->std_password=$req->input('password');
            $var->std_confirmpassword=$req->input('confirmpassword');
            $var->std_faculty=$req->input('faculty');
            $var->std_description=$req->input('description');
            $var->resume='/' . $resumename;
            $var->std_pic = '/' . $imagename;
            $var->update();
            $result = student::select('*')->where('id', '=', $result)->get();
            $req->session()->put('result',$result);
            return view('\Student\showstdprofile', ['result' => $result])->with('successMsg','Profile Successful updated !');
        }

}

function editemp(Request $req)
    {
        if (request()->has('image')){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }
        if($req->session()->has('result')){
            $result=session('result.0.id');
            $var = employer::find($result);
            $var->company_name=$req->input('name');
            $var->reg_no=$req->input('reg_no');
            $var->company_address=$req->input('address');
            $var->company_officenum=$req->input('officenum');
            $var->company_faxnumber=$req->input('faxnum');
            $var->company_email=$req->input('email');
            $var->company_password=$req->input('password');
            $var->company_confirmpass=$req->input('confirmpassword');
            $var->company_size=$req->input('company');
            $var->company_description=$req->input('description');
            $var->company_logo = '/' . $imagename;
            $var->update();
            $result = employer::select('*')->where('id', '=', $result)->get();
            $req->session()->put('result',$result);
            return view('\Employer\showempprofile', ['result' => $result])->with('successMsg','Profile Successful updated !');
        }
}

public function updatestdprofile($id)
{
    $result = student::select('*')->where('id', '=', $id)->get();
    return view('\Admin\updatestdprofile', ['result' => $result]);
}

function stdupdate(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }

        if (request()->has('resume') ){
            $resumeuploaded = request()->file('resume');
            $resumename = time() . '.' . $resumeuploaded->getClientOriginalExtension();
            $resumepath = public_path('/');
            $resumeuploaded->move($resumepath,$resumename);
        }
            $var = student::find($req->id);
            $var->std_name=$req->input('name');
            $var->std_matric=$req->input('matric');
            $var->std_address=$req->input('address');
            $var->std_phonenum=$req->input('phonenum');
            $var->std_email=$req->input('email');
            $var->std_password=$req->input('password');
            $var->std_confirmpassword=$req->input('confirmpassword');
            $var->std_faculty=$req->input('faculty');
            $var->std_description=$req->input('description');
            $var->resume='/' . $resumename;
            $var->std_pic = '/' . $imagename;
            $var->update();
            return redirect('searchstdprofile')->with('successMsg','Profile Successful updated !');

}

function viewcompanylist()
{
    $deta = employer::all();
    return view('\Student\searchcompany',['deta'=>$deta]);
}

public function companylist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = employer::select('reg_no','company_name','company_email','company_officenum')->where('reg_no','LIKE', '%' . $deta . '%')->orwhere('company_name','LIKE', '%' . $deta . '%')->orwhere('company_email','LIKE', '%' . $deta . '%')->orwhere('company_officenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Student\searchcompany', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Student\searchcompany', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displaycompanyprofile($reg_no)

{
    $result = employer::select('*')->where('reg_no', '=', $reg_no)->get();
    return view('\Student\displaycompanyprofile', ['result' => $result]);
}

function viewstdlist()
{
    $deta = Student::all();
    return view('\Employer\searchstudent',['deta'=>$deta]);
}

public function stdlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = Student::select('*')->where('std_matric','LIKE', '%' . $deta . '%')->orwhere('std_name','LIKE', '%' . $deta . '%')->orwhere('std_email','LIKE', '%' . $deta . '%')->orwhere('std_phonenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Employer\searchstudent', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Employer\searchstudent', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displaystudentprofile($id)

{
    $result = student::select('*')->where('id', '=', $id)->get();
    return view('\Employer\displaystudentprofile', ['result' => $result]);
}

function rate(Request $req)
    {
        
        $var = new studentratingscale;
        if($req->session()->has('result')){
            $result=session('result.0.id');
            //$result = $req->session()->all();
            //dd($result);
            $var->id=$result; 
            $var->muet=$req->muet;
            $var->language=$req->language;
            $var->language_detail=$req->language_detail;
            $var->clubposition=$req->clubposition;
            $var->position_detail=$req->position_detail;
            $var->jobexperience=$req->jobexperience;
            $var->experience_detail=$req->experience_detail;
            $var->extracert=$req->extracert;
            $var->cert_detail=$req->cert_detail;
            $var->cgpa=$req->cgpa;
            $var->save();
            //$deta = DB::table('students')->join('studentratingscales', 'studentratingscales.id', '=', 'students.id')
            //->select('students.standard','studentratingscales.muet','studentratingscales.language','studentratingscales.clubposition' ,'studentratingscales.jobexperience','studentratingscales.extracert','studentratingscales.cgpa','studentratingscales.muet_mark','studentratingscales.language_mark','studentratingscales.position_mark','studentratingscales.experience_mark','studentratingscales.cert_mark','studentratingscales.cgpa_mark')
            //->where('studentratingscales.id', '=', $result)->get();

            $mark = studentratingscale::find($result);

            //muet mark
            if($mark->muet >= 1 && $mark->muet <= 2){
                $mark->muet_mark = '0';
            }else if($mark->muet === 3){
                $mark->muet_mark = '5';
            }elseif($mark->muet >= 4 && $mark->muet <= 5){
                $mark->muet_mark = '8';
            }else{
                $mark->muet_mark = '10';
            }

            //language
            if($mark->language === 1){
                $mark->language_mark = '0';
            }else if($mark->language === 2){
                $mark->language_mark = '5';
            }elseif($mark->language >= 3 && $mark->language <= 4){
                $mark->language_mark = '8';
            }else{
                $mark->language_mark = '10';
            }

            //position
            if($mark->clubposition === 0){
                $mark->position_mark = '0';
            }else if($mark->clubposition === 1){
                $mark->position_mark = '5';
            }elseif($mark->clubposition === 2){
                $mark->position_mark = '8';
            }else{
                $mark->position_mark = '10';
            }

              //Job Experience
              if($mark->jobexperience === 0){
                $mark->experience_mark = '0';
            }else if($mark->jobexperience === 1){
                $mark->experience_mark = '5';
            }elseif($mark->jobexperience === 2){
                $mark->experience_mark = '8';
            }else{
                $mark->experience_mark = '10';
            }

            //Self-development
            if($mark->extracert === 0){
                $mark->cert_mark = '0';
            }else if($mark->extracert === 1){
                $mark->cert_mark = '5';
            }elseif($mark->extracert === 2){
                $mark->cert_mark = '8';
            }else{
                $mark->cert_mark = '10';
            }

            //CGPA
            if($mark->cgpa <2){
                $mark->cgpa_mark = '0';
            }else if($mark->cgpa >= 2 && $mark->cgpa < 3.33){
                $mark->cgpa_mark = '5';
            }elseif($mark->cgpa >= 3.33 && $mark->cgpa <= 3.67){
                $mark->cgpa_mark = '8';
            }else{
                $mark->cgpa_mark = '10';
            }

            $mark->totalmark = ($mark->muet_mark *(30/100))+ ($mark->language_mark *(20/100)) + ($mark->position_mark*(15/100)) + ($mark->experience_mark*(15/100)) + ($mark->cert_mark *(10/100)) + ($mark->cgpa_mark*(10/100));
            
            $deta = student::find($result);

             //total mark
             if($mark->totalmark >= 0 && $mark->totalmark <= 3){
                $deta->standard = 'D';
            }else if($mark->totalmark >= 4 && $mark->totalmark <= 6){
                $deta->standard = 'C';
            }elseif($mark->totalmark >= 7 && $mark->totalmark <= 8){
                $deta->standard = 'B';
            }else{
                $deta->standard = 'A';
            }

            $deta->update();
            
            return redirect('login')->with('successMsg','Rating Successful created !');
            }
        }

function rating(Request $req)
    {
        
        $var = new studentratingscale;
        if($req->session()->has('result')){
            $result=session('result.0.id');
            //$result = $req->session()->all();
            //dd($result);
            $var->id=$result; 
            $var->muet=$req->muet;
            $var->language=$req->language;
            $var->language_detail=$req->language_detail;
            $var->clubposition=$req->clubposition;
            $var->position_detail=$req->position_detail;
            $var->jobexperience=$req->jobexperience;
            $var->experience_detail=$req->experience_detail;
            $var->extracert=$req->extracert;
            $var->cert_detail=$req->cert_detail;
            $var->cgpa=$req->cgpa;
            $var->save();
            //$deta = DB::table('students')->join('studentratingscales', 'studentratingscales.id', '=', 'students.id')
            //->select('students.standard','studentratingscales.muet','studentratingscales.language','studentratingscales.clubposition' ,'studentratingscales.jobexperience','studentratingscales.extracert','studentratingscales.cgpa','studentratingscales.muet_mark','studentratingscales.language_mark','studentratingscales.position_mark','studentratingscales.experience_mark','studentratingscales.cert_mark','studentratingscales.cgpa_mark')
            //->where('studentratingscales.id', '=', $result)->get();

            $mark = studentratingscale::find($result);

            //muet mark
            if($mark->muet >= 1 && $mark->muet <= 2){
                $mark->muet_mark = '0';
            }else if($mark->muet === 3){
                $mark->muet_mark = '5';
            }elseif($mark->muet >= 4 && $mark->muet <= 5){
                $mark->muet_mark = '8';
            }else{
                $mark->muet_mark = '10';
            }

            //language
            if($mark->language === 1){
                $mark->language_mark = '0';
            }else if($mark->language === 2){
                $mark->language_mark = '5';
            }elseif($mark->language >= 3 && $mark->language <= 4){
                $mark->language_mark = '8';
            }else{
                $mark->language_mark = '10';
            }

            //position
            if($mark->clubposition === 0){
                $mark->position_mark = '0';
            }else if($mark->clubposition === 1){
                $mark->position_mark = '5';
            }elseif($mark->clubposition === 2){
                $mark->position_mark = '8';
            }else{
                $mark->position_mark = '10';
            }

              //Job Experience
              if($mark->jobexperience === 0){
                $mark->experience_mark = '0';
            }else if($mark->jobexperience === 1){
                $mark->experience_mark = '5';
            }elseif($mark->jobexperience === 2){
                $mark->experience_mark = '8';
            }else{
                $mark->experience_mark = '10';
            }

            //Self-development
            if($mark->extracert === 0){
                $mark->cert_mark = '0';
            }else if($mark->extracert === 1){
                $mark->cert_mark = '5';
            }elseif($mark->extracert === 2){
                $mark->cert_mark = '8';
            }else{
                $mark->cert_mark = '10';
            }

            //CGPA
            if($mark->cgpa <2){
                $mark->cgpa_mark = '0';
            }else if($mark->cgpa >= 2 && $mark->cgpa < 3.33){
                $mark->cgpa_mark = '5';
            }elseif($mark->cgpa >= 3.33 && $mark->cgpa <= 3.67){
                $mark->cgpa_mark = '8';
            }else{
                $mark->cgpa_mark = '10';
            }

            $mark->totalmark = ($mark->muet_mark *(30/100))+ ($mark->language_mark *(20/100)) + ($mark->position_mark*(15/100)) + ($mark->experience_mark*(15/100)) + ($mark->cert_mark *(10/100)) + ($mark->cgpa_mark*(10/100));
            
            $deta = student::find($result);

             //total mark
             if($mark->totalmark >= 0 && $mark->totalmark <= 3){
                $deta->standard = 'D';
            }else if($mark->totalmark >= 4 && $mark->totalmark <= 6){
                $deta->standard = 'C';
            }elseif($mark->totalmark >= 7 && $mark->totalmark <= 8){
                $deta->standard = 'B';
            }else{
                $deta->standard = 'A';
            }

            $deta->update();
            
            return redirect('showstdprofile')->with('successMsg','Rating Successful created !');
            }
        }

        function createnewstaff(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }
            $var = new staff;
            $var->staff_name=$req->name;
            $var->staff_email=$req->email;
            $var->staff_password=$req->password;
            $var->staff_confirmpass=$req->confirmpassword;
            $var->staff_phonenum=$req->phonenumber;
            $var->staff_faculty=$req->faculty;
            $var->staff_pic = '/' . $imagename;
            $var->save();
            return redirect('searchstaff')->with('successMsg','Staff Successful created !');
            }

            function viewstafflist()
{
    $deta = staff::all();
    return view('\Admin\searchstaff',['deta'=>$deta]);
}


public function stafflist(request $request)
{ 
    $deta = $request->input('deta'); 
    $deta = staff::select('staff_name','staff_email','staff_phonenum','id')->where('staff_name','LIKE', '%' . $deta . '%')->orwhere('staff_email','LIKE', '%' . $deta . '%')->orwhere('staff_phonenum','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchstaff', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchstaff', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

public function deletestaff($id)
{
    $result = staff::select('*')->where('id', '=', $id)->delete();
    return redirect('searchstaff')->with('successMsg','Profile Successful deleted !');
}

function displaystaff($id)

{
    $result = staff::select('*')->where('id', '=', $id)->get();
    return view('\Admin\displaystaff', ['result' => $result]);
}

public function updatestaff($id)
{
    $result = staff::select('*')->where('id', '=', $id)->get();
    return view('\Admin\updatestaff', ['result' => $result]);
}

function staffupdate(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }
            $var = staff::find($req->id);
            $var->staff_name=$req->input('name');
            $var->staff_email=$req->input('email');
            $var->staff_password=$req->input('password');
            $var->staff_confirmpass=$req->input('confirmpassword');
            $var->staff_phonenum=$req->input('phonenumber');
            $var->staff_faculty=$req->input('faculty');
            $var->staff_pic = '/' . $imagename;
            $var->update();
            return redirect('searchstaff')->with('successMsg','Profile Successful updated !');

}

function mystaff($id)

{
    $result = staff::select('*')->where('id', '=', $id)->get();
    return view('\Staff\myprofile', ['result' => $result]);
}

public function updatestafflist($id)
{
    $result = staff::select('*')->where('id', '=', $id)->get();
    return view('\Staff\updatestafflist', ['result' => $result]);
}

function stafflistupdate(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }
        if($req->session()->has('result')){
            $result=session('result.0.id');  
            $var = staff::find($req->id);
            $var->staff_name=$req->input('name');
            $var->staff_email=$req->input('email');
            $var->staff_password=$req->input('password');
            $var->staff_confirmpass=$req->input('confirmpassword');
            $var->staff_phonenum=$req->input('phonenumber');
            $var->staff_faculty=$req->input('faculty');
            $var->staff_pic = '/' . $imagename;
            $var->update();
            $result = staff::select('*')->where('id', '=', $result)->get();
            $req->session()->put('result',$result);
            return view('\Staff\myprofile', ['result' => $result])->with('successMsg','Profile Successful updated !');
        }

}

}

