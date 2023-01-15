<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Main
Route::get('/', function () {
    return view('mainpage');
});


//Sign up
Route::get('/signup', function () {
    return view('/Sign Up/signup');
});
Route::get('/staffsignup', function () {
    return view('/Sign Up/staffsignup');
});
Route::post('/studentsignup', 'App\Http\Controllers\UserController@studentsignup');
Route::post('/employersignup', 'App\Http\Controllers\UserController@employersignup');
Route::get('/studentratingform', function () {
    return view('studentratingform');
});
Route::post('/rate', 'App\Http\Controllers\UserController@rate');

//Login
Route::get('/login', function () {
    return view('/Login/login');
});
Route::post('/trylogin', 'App\Http\Controllers\UserController@login');
Route::get('/forgetpassword', function () {
    return view('/Login/forgetpassword');
});
Route::post('/tryreset', 'App\Http\Controllers\UserController@tryreset');
Route::get('/resetpassword', function () {
    return view('/Login/resetpassword');
});
Route::post('/reset', 'App\Http\Controllers\UserController@reset');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');

//Manage Admin
Route::get('/createstdprofile', function () {
    return view('/Admin/createstdprofile');
});
Route::post('/createstudent', 'App\Http\Controllers\UserController@createstudent');

Route::get('/createempprofile', function () {
    return view('/Admin/createempprofile');
});
Route::post('/createemployer', 'App\Http\Controllers\UserController@createemployer');

Route::get('/searchstdprofile', 'App\Http\Controllers\UserController@viewstudentlist');
Route::get('/searchstdprofile/search', 'App\Http\Controllers\UserController@studentlist');
Route::get('/searchstdprofile/{id}', 'App\Http\Controllers\UserController@deletestudentprofile');

Route::get('/searchempprofile', 'App\Http\Controllers\UserController@viewemployerlist');
Route::get('/searchempprofile/search', 'App\Http\Controllers\UserController@employerlist');
Route::get('/searchempprofile/{reg_no}', 'App\Http\Controllers\UserController@deleteemployerprofile');
Route::get('/displaystdprofile/{id}', 'App\Http\Controllers\UserController@displaystdprofile');
Route::get('/masterS/{id}', 'App\Http\Controllers\UserController@display');

/*Route::get('/test', function () {
    return view('/Admin/test');
});*/

Route::get('/displayempprofile/{reg_no}', 'App\Http\Controllers\UserController@displayempprofile');
Route::view('masterE', 'masterE');
Route::get('/updateempprofile/{id}', 'App\Http\Controllers\UserController@updateempprofile');
Route::post('/update', 'App\Http\Controllers\UserController@update');
Route::get('/editempprofile/{id}', 'App\Http\Controllers\UserController@editempprofile');
Route::post('/editemp', 'App\Http\Controllers\UserController@editemp');


Route::get('/showstdprofile', function () {
    return view('/Student/showstdprofile');
});
Route::get('/showstdprofile/{id}', 'App\Http\Controllers\Usercontroller@showstdprofile');
Route::get('/updatestdprofile/{id}', 'App\Http\Controllers\UserController@updatestdprofile');
Route::post('/stdupdate', 'App\Http\Controllers\UserController@stdupdate');

Route::get('/showempprofile', function () {
    return view('/Employer/showempprofile');
});

Route::get('/showempprofile', 'App\Http\Controllers\UserController@showempprofile');
Route::get('/editprofile/{id}', 'App\Http\Controllers\UserController@editprofile');
Route::post('/edit', 'App\Http\Controllers\UserController@edit');

//Manage Feedback
Route::get('/feedback', function () {
    return view('/Student/feedback');
});

Route::post('/submitfeedback', 'App\Http\Controllers\FeedbackController@submitfeedback');

Route::get('/empfeedback', function () {
    return view('/Employer/empfeedback');
});

Route::post('/submitempfeedback', 'App\Http\Controllers\FeedbackController@submitempfeedback');
Route::get('/searchfeedback', 'App\Http\Controllers\FeedbackController@viewfeedback');
Route::get('/searchfeedback/search', 'App\Http\Controllers\FeedbackController@feedbacklist');
Route::get('/feedback', 'App\Http\Controllers\FeedbackController@select');
Route::get('/empfeedback', 'App\Http\Controllers\FeedbackController@select2');
Route::get('/stdsearchfeedback', 'App\Http\Controllers\FeedbackController@viewstdfeedback');
Route::get('/stdsearchfeedback/search', 'App\Http\Controllers\FeedbackController@stdfeedbacklist');

Route::get('/displaystdfeedback', 'App\Http\Controllers\FeedbackController@displaystdfeedback');
Route::get('/displaystdfeedback/search', 'App\Http\Controllers\FeedbackController@displaystdfeedbacklist');
Route::get('/displayempfeedback', 'App\Http\Controllers\FeedbackController@displayempfeedback');
Route::get('/displayempfeedback/search', 'App\Http\Controllers\FeedbackController@displayempfeedbacklist');

//Manage search company Profile
Route::get('/searchcompany', 'App\Http\Controllers\UserController@viewcompanylist');
Route::get('/searchcompany/search', 'App\Http\Controllers\UserController@companylist');
Route::get('/displaycompanyprofile/{reg_no}', 'App\Http\Controllers\UserController@displaycompanyprofile');

//Manage search student Profile
Route::get('/searchstudent', 'App\Http\Controllers\UserController@viewstdlist');
Route::get('/searchstudent/search', 'App\Http\Controllers\UserController@stdlist');
Route::get('/displaystudentprofile/{std_matric}', 'App\Http\Controllers\UserController@displaystudentprofile');


//Manage Event
//admin
Route::get('/createevent', function () {
    return view('/Admin/createevent');
});
Route::post('/createevent', 'App\Http\Controllers\EventController@createevent');
Route::get('/searchevent', 'App\Http\Controllers\EventController@vieweventlist');
Route::get('/searchevent/search', 'App\Http\Controllers\EventController@eventlist');
Route::get('/displayevent/{id}', 'App\Http\Controllers\EventController@displayevent');
Route::get('/updateevent/{id}', 'App\Http\Controllers\EventController@updateevent');
Route::post('/eventupdate', 'App\Http\Controllers\EventController@eventupdate');
//student
Route::get('/event', 'App\Http\Controllers\EventController@view');
Route::get('/event/search', 'App\Http\Controllers\EventController@search');
Route::get('/eventdetail/{id}', 'App\Http\Controllers\EventController@eventdetail');
//employer
Route::get('/newevent', function () {
    return view('/Employer/newevent');
});
Route::post('/newevent', 'App\Http\Controllers\EventController@newevent');
Route::get('/filterevent', 'App\Http\Controllers\EventController@list');
Route::get('/filterevent/search', 'App\Http\Controllers\EventController@filterlist');
Route::get('/showevent/{id}', 'App\Http\Controllers\EventController@showevent');
Route::get('/editevent/{id}', 'App\Http\Controllers\EventController@editevent');
Route::post('/eventedit', 'App\Http\Controllers\EventController@eventedit');

Route::get('/displayeventlist', 'App\Http\Controllers\EventController@displayeventlist');
Route::get('/displayeventlist/search', 'App\Http\Controllers\EventController@searcheventlist');
Route::get('/showevent/{id}', 'App\Http\Controllers\EventController@viewevent');

//Manage Internship Job Post
Route::get('/createjobpost', function () {
    return view('/Employer/createjobpost');
});
Route::post('/createjob', 'App\Http\Controllers\PostController@createjob');
Route::get('/searchpost', 'App\Http\Controllers\PostController@viewpostlist');
Route::get('/searchpost/search', 'App\Http\Controllers\PostController@postlist');
Route::get('/displaypost/{post_id}', 'App\Http\Controllers\PostController@displaypost');
Route::get('/displaypost/{post_id}/delete', 'App\Http\Controllers\PostController@deletepost');
Route::get('/updatepost/{id}', 'App\Http\Controllers\PostController@updatepost');
Route::post('/postupdate/{post_id}', 'App\Http\Controllers\PostController@postupdate');
Route::get('/searchallpost', 'App\Http\Controllers\PostController@viewallpostlist');
Route::get('/searchallpost/search', 'App\Http\Controllers\PostController@allpostlist');
Route::get('/displayallpost/{post_id}', 'App\Http\Controllers\PostController@displayallpost');

Route::get('/searchjob', 'App\Http\Controllers\PostController@viewjoblist');
Route::post('/apply/{post_id}', 'App\Http\Controllers\PostController@apply');
Route::get('/searchjob/search', 'App\Http\Controllers\PostController@joblist');
Route::get('/displayjob/{post_id}', 'App\Http\Controllers\PostController@displayjob');

Route::get('/displaystudentapply/{post_id}', 'App\Http\Controllers\PostController@displaystudentapply');
Route::get('/display/{post_id}/{id}', 'App\Http\Controllers\POstController@display');
Route::get('/displaystudentapply/{post_id}/search', 'App\Http\Controllers\PostController@searchapply');
Route::post('/hired/{post_id}/{id}', 'App\Http\Controllers\PostController@hired');
Route::get('/displayhiredlist/{post_id}', 'App\Http\Controllers\PostController@displayhiredlist');
Route::get('/displayhiredlist/{post_id}/{id}/delete', 'App\Http\Controllers\PostController@deletehiredlist');
Route::get('/offerprofile/{post_id}/{id}', 'App\Http\Controllers\POstController@offerprofile');
Route::get('/receiptoffer', 'App\Http\Controllers\POstController@receiptoffer');
Route::get('/displayoffer/{post_id}', 'App\Http\Controllers\PostController@displayoffer');
Route::post('/accept/{post_id}', 'App\Http\Controllers\PostController@accept');

Route::get('/viewjobpost', 'App\Http\Controllers\PostController@viewlist');
Route::get('/viewjobpost/search', 'App\Http\Controllers\PostController@alllist');
Route::get('/displayjobpost/{post_id}', 'App\Http\Controllers\PostController@displayalllist');

Route::get('/viewjobpost', 'App\Http\Controllers\PostController@alljoblist');
Route::get('/viewjobpost/search', 'App\Http\Controllers\PostController@searchjoblist');
Route::get('/showjob/{post_id}', 'App\Http\Controllers\PostController@showjob');

//Blacklist
Route::get('/blacklist', function () {
    return view('/Admin/blacklist');
});
Route::post('/createblacklist', 'App\Http\Controllers\UserController@createblacklist');
Route::get('/searchblacklist', 'App\Http\Controllers\UserController@viewblacklist');
Route::get('/searchblacklist/search', 'App\Http\Controllers\UserController@blacklist');
Route::get('/searchblacklist/{id}', 'App\Http\Controllers\UserController@deleteblacklist');
Route::get('/updateblacklist/{id}', 'App\Http\Controllers\UserController@updateblacklist');
Route::post('/blacklistupdate', 'App\Http\Controllers\UserController@blacklistupdate');

Route::get('/displayblacklist', 'App\Http\Controllers\UserController@displayblacklist');
Route::get('/displayblacklist/search', 'App\Http\Controllers\UserController@searchblacklist');

//Rate
Route::get('/ratingform', function () {
    return view('/Student/ratingform');
});
Route::post('/rating', 'App\Http\Controllers\UserController@rating');

//Manage Staff
Route::get('/createstaff', function () {
    return view('/Admin/createstaff');
});
Route::post('/createnewstaff', 'App\Http\Controllers\UserController@createnewstaff');
Route::get('/searchstaff', 'App\Http\Controllers\UserController@viewstafflist');
Route::get('/searchstaff/search', 'App\Http\Controllers\UserController@stafflist');
Route::get('/searchstaff/{id}', 'App\Http\Controllers\UserController@deletestaff');
Route::get('/displaystaff/{id}', 'App\Http\Controllers\UserController@displaystaff');
Route::get('/updatestaff/{id}', 'App\Http\Controllers\UserController@updatestaff');
Route::post('/staffupdate', 'App\Http\Controllers\UserController@staffupdate');

Route::get('/myprofile', function () {
    return view('/Staff/myprofile');
});
Route::get('/myprofile/{id}', 'App\Http\Controllers\UserController@myprofile');
Route::get('/updatestafflist/{id}', 'App\Http\Controllers\UserController@updatestafflist');
Route::post('/stafflistupdate', 'App\Http\Controllers\UserController@stafflistupdate');