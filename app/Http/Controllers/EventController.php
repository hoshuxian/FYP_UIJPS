<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Image;

class EventController extends Controller
{
    //

    function createevent(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }

            //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
            $var = new event;
            $var->event_name=$req->name;
            $var->event_description1=$req->description1;
            $var->event_description2=$req->description2;
            $var->event_time=$req->time;
            $var->event_date=$req->date;
            $var->event_speaker=$req->speaker;
            $var->event_address=$req->address;
            $var->event_link=$req->link;
            $var->event_pic = '/' . $imagename;
            $var->save();
            return redirect('searchevent')->with('successMsg','Event Successful created !');
            }

            function vieweventlist()
{
    $deta = Event::all();
    return view('\Admin\searchevent',['deta'=>$deta]);
}

public function eventlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = event::select('*')->where('event_name','LIKE', '%' . $deta . '%')->orwhere('event_description1','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchevent', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchevent', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function displayevent($id)

{
    $result = event::select('*')->where('id', '=', $id)->get();
    return view('\Admin\displayevent', ['result' => $result]);
}

function updateevent($id)

{
    $result = event::select('*')->where('id', '=', $id)->get();
    return view('\Admin\updateevent', ['result' => $result]);
}

function eventupdate(Request $req)
{
    if (request()->has('image') ){
        $imageuploaded = request()->file('image');
        $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
        $imagepath = public_path('/');
        $imageuploaded->move($imagepath,$imagename);
    }

        //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
        $var = event::find($req->id);
        $var->event_name=$req->input('name');
        $var->event_description1=$req->input('description1');
        $var->event_description2=$req->input('description2');
        $var->event_time=$req->input('time');
        $var->event_date=$req->input('date');
        $var->event_speaker=$req->input('speaker');
        $var->event_address=$req->input('address');
        $var->event_link=$req->input('link');
        $var->event_pic = '/' . $imagename;
        $var->update();
        return redirect('searchevent')->with('successMsg','Event Successful updated !');
        }

        function view()
        {
            $deta = Event::all();
            return view('\Student\event',['deta'=>$deta]);
        }
        
        public function search(request $request)
        {
           
            $deta = $request->input('deta'); 
            $deta = event::select('*')->where('event_name','LIKE', '%' . $deta . '%')->orwhere('event_description1','LIKE', '%' . $deta . '%')->get();
            if (count ( $deta ) > 0)
            return view('\Student\event', ['deta' => $deta])->with('successMsg','Results Found !');
            else
            return view ('\Student\event', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
            
        }
        
        function eventdetail($id)
        
        {
            $result = event::select('*')->where('id', '=', $id)->get();
            return view('\Student\eventdetail', ['result' => $result]);
        }

        function newevent(Request $req)
    {
        if (request()->has('image') ){
            $imageuploaded = request()->file('image');
            $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
            $imagepath = public_path('/');
            $imageuploaded->move($imagepath,$imagename);
        }

            //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
            $var = new event;
            $var->event_name=$req->name;
            $var->event_description1=$req->description1;
            $var->event_description2=$req->description2;
            $var->event_time=$req->time;
            $var->event_date=$req->date;
            $var->event_speaker=$req->speaker;
            $var->event_address=$req->address;
            $var->event_link=$req->link;
            $var->event_pic = '/' . $imagename;
            $var->save();
            return redirect('filterevent')->with('successMsg','Event Successful created !');
            }

            function list()
{
    $deta = Event::all();
    return view('\Employer\filterevent',['deta'=>$deta]);
}

public function filterlist(request $request)
{
   
    $deta = $request->input('deta'); 
    $deta = event::select('*')->where('event_name','LIKE', '%' . $deta . '%')->orwhere('event_description1','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Employer\filterevent', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Employer\filterevent', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

function showevent($id)

{
    $result = event::select('*')->where('id', '=', $id)->get();
    return view('\Employer\showcareerevent', ['result' => $result]);
}

function editevent($id)

{
    $result = event::select('*')->where('id', '=', $id)->get();
    return view('\Employer\editevent', ['result' => $result]);
}

function eventedit(Request $req)
{
    if (request()->has('image') ){
        $imageuploaded = request()->file('image');
        $imagename = time() . '.' . $imageuploaded->getClientOriginalExtension();
        $imagepath = public_path('/');
        $imageuploaded->move($imagepath,$imagename);
    }

        //Image::make($image)->resize(300,300)->save(public_path('/uploads/student/'.$filename));*/
        $var = event::find($req->id);
        $var->event_name=$req->input('name');
        $var->event_description1=$req->input('description1');
        $var->event_description2=$req->input('description2');
        $var->event_time=$req->input('time');
        $var->event_date=$req->input('date');
        $var->event_speaker=$req->input('speaker');
        $var->event_address=$req->input('address');
        $var->event_link=$req->input('link');
        $var->event_pic = '/' . $imagename;
        $var->update();
        return redirect('filterevent')->with('successMsg','Event Successful updated !');
        }

        function displayeventlist()
        {
            $deta = Event::all();
            return view('\Staff\displayeventlist',['deta'=>$deta]);
        }
        
        public function searcheventlist(request $request)
        {
           
            $deta = $request->input('deta'); 
            $deta = event::select('*')->where('event_name','LIKE', '%' . $deta . '%')->orwhere('event_description1','LIKE', '%' . $deta . '%')->get();
            if (count ( $deta ) > 0)
            return view('\Staff\displayeventlist', ['deta' => $deta])->with('successMsg','Results Found !');
            else
            return view ('\Staff\displayeventlist', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
            
        }
        
        function viewevent($id)
        
        {
            $result = event::select('*')->where('id', '=', $id)->get();
            return view('\Staff\showevent', ['result' => $result]);
        }
}
