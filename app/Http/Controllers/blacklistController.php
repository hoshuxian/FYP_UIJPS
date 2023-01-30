<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blacklist;

class blacklistController extends Controller
{
    //
    //Blacklist
//display company blacklist
function viewblacklist()
{
    $deta = blacklist::all();
    return view('\Admin\searchblacklist',['deta'=>$deta]);
}

function displayblacklist()
{
    $deta = blacklist::all();
    return view('\Staff\displayblacklist',['deta'=>$deta]);
}

//search company blacklist
public function blacklist(request $request)
{ 
    $deta = $request->input('deta'); 
    $deta = blacklist::select('companyname','companyaddress')->where('companyname','LIKE', '%' . $deta . '%')->orwhere('companyaddress','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Admin\searchblacklist', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Admin\searchblacklist', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

public function searchblacklist(request $request)
{ 
    $deta = $request->input('deta'); 
    $deta = blacklist::select('companyname','companyaddress')->where('companyname','LIKE', '%' . $deta . '%')->orwhere('companyaddress','LIKE', '%' . $deta . '%')->get();
    if (count ( $deta ) > 0)
    return view('\Staff\displayblacklist', ['deta' => $deta])->with('successMsg','Results Found !');
    else
    return view ('\Staff\displayblacklist', ['deta' => $deta])->with('FailedMsg','No Details found. Try to search again !' );		
    
}

public function deleteblacklist($id)
{
    $result = blacklist::select('*')->where('id', '=', $id)->delete();
    return redirect('searchblacklist')->with('successMsg','Profile Successful deleted !');
}

function createblacklist(Request $req)
    {
            $var = new blacklist;
            $var->companyname=$req->name;
            $var->companyaddress=$req->address;
            $var->save();
            return redirect('searchblacklist')->with('successMsg','Profile Successful created !');

}

public function updateblacklist($id)
{
    $result = blacklist::select('*')->where('id', '=', $id)->get();
    return view('\Admin\updateblacklist', ['result' => $result]);
}

function blacklistupdate(Request $req)
    {
            $var = blacklist::find($req->id);
            $var->companyname=$req->input('name');
            $var->companyaddress=$req->input('address');
            $var->update();
            return redirect('searchblacklist')->with('successMsg','Profile Successful updated !');

}
}
