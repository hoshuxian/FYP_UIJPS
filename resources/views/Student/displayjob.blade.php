@extends ('masterS')
@section('content')


<!DOCTYPE html>
    <html>
        <style>
.container2{
  width: 80%;
  background: white;
  padding: 30px;
  border-radius: 5px;
  height: 100%;
  margin-bottom: 10%;
  object-fit: cover;
  text-align:left;
  margin-left: 15%;
  margin-top:-6%;
}

/*table .input-box{
  margin: 20px 0 12px 0;
  width: calc(100% / 2 -20px);
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

table .input-box .details{
  display: block;
  font-weight:500;
  margin-bottom: 5px;
}*/

form th input{
  height: 45px;
  width: 200%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  letter-spacing: 1px;
  white-space: nowrap;
  padding: 0.5rem 1rem;
}

form th select{
  height: 45px;
  width: 200%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  letter-spacing: 1px;
  white-space: nowrap;
  padding: 0.5rem 1rem;
}


form th{
    font-size:18px;
    white-space: nowrap;
  padding: 0.5rem 1rem;
}


form textarea{
  height: 60px;
  width: 200%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
  padding-top: 10px;
  white-space: nowrap;
  padding: 0.5rem 1rem;
}

form input:focus,
form input:valid{
  border-color: #9b59b6;
}

form textarea:focus,
form textarea:valid{
  border-color: #9b59b6;
}

form .button{
  height: 45px;
  margin-top: 15px;
  margin-left: 3%;
  margin-bottom: 15px;
  width: 120px;
  background: white;
  border: 3px solid #F3C301;
  font-size: 18px;
  font-weight: 500;
  border-radius: 35px;
  letter-spacing: 1px;
}

form .button:hover{
  background: #F3C301;
  border: 3px solid white;
}

form .hr4{
  margin-top: 3%;
  border-top: 3px solid black;
  width:500%;
  margin-left:6%;
}

form img{
  border: 2px solid black;
}

.alert-success{
    width: 65%;
    height: 30px;
    margin-left: 20%;
    background-color: #d4edda;
    border-radius: 5px;
    margin-top: 5px;
    padding-left: 10px;
    color: #007e33;
    padding-top: 5px;
}

.alert-danger{
    width: 65%;
    height: 30px;
    margin-left: 20%;
    background-color: #f8d7da;
    border-radius: 5px;
    margin-top: 5px;
    padding-left: 10px;
    color: #cc0000;
}

#background{
width:100%;
height:100%;
}

#image{
width:20%;
height:20%;
}
</style>

<div class="container2">
@foreach($deta as $detaa)
<input type="hidden" class="text" placeholder="Company's ID" value="{{ $detaa->id}}"name="id" >
    <img class="background_img" src="/nobackground.jfif" id="background"/>
@if($detaa->company_logo)
        <img src="{{$detaa->company_logo}}" name="image" class="emp_pic" id="image"><h2 style="padding-left:23%;margin-top:-9%;" class="name">{{$detaa->company_name}}<br><br></h2>
@else
    <img class="emp_pic" src="/nologo.png" name="image"id="image"/>
@endif

@if(!empty($disable))
<p style="color: red;font-size:60px;margin-left:80%;margin-top: -10%;transform: translateY(0) rotate(-30deg);"> DISABLE</p>
@endif

<br>
<form action='/apply/{{$detaa->post_id}}' method='POST'enctype="multipart/form-data">
@csrf
<p style="color:red;font-size: 30px;float:right;margin-top:-9%;">{{$detaa->job_salary}}</p>
<p style="color:red;font-size: 24px;float:right;;margin-top:-5%;">{{$detaa->job_applynumber}}<span style="font-size:15px;color:black;margin-left:10px;">applicants</span></p>
<p style="color:red;font-size: 24px;margin-right:10px;float:right;margin-top:-1%;">{{$detaa->hired}}<span style="font-size:15px;color:black;margin-left:10px;">hired / {{$detaa->position_available}}</span></p>
<p style="margin-left: 23%;font-size: 18px;">{{$detaa->job_title}}</p>
<p style="margin-left: 23%;font-size: 18px;">{{$detaa->job_venue}}</p>
<hr><br>
<h2>Job Description:</h2><br>
<p>{{$detaa->job_description}} </p><br>
<h2>Job Requirement:</h2><br>
<p>{{$detaa->job_requirement}} </p><br>
<h2>Job Specialization:</h2><br>
<p>{{$detaa->job_category}}</p><br>
<hr><br>

<h2>Company Overview</h2><br>
<p>{{$detaa->company_description}}</p><br>
<h2>Additional Company Information</h2><br>
<h3 style="display:inline-block;">Register No:</h3><h3 style="display:inline-block;margin-left: 50px;">Company Size:</h3><br>
<p style="display:inline-block;">{{$detaa->reg_no}}</p><p style="display:inline-block;margin-left: 50px;">{{$detaa->company_size}}</p><br>
@endforeach
@foreach($deta as $detaa)
<br><h3>Benefits & Others:</h3><br>
<p>{{$detaa->job_benefit}} </p><br>

@if(!empty($disable))
<button type="submit" class="button" value="apply" style="margin-left:70%;" id="mySubmit" onclick="myFunction()"> APPLY NOW</button>
@endif

@if(empty($disable))
<button type="submit" class="button" value="apply" style="margin-left:70%;" id="mySubmit"> APPLY NOW</button>
@endif

<a href="/searchjob"> <button type="button" class="button" value="back">BACK</button></a>
@if(session()->has('successMsg'))
<div class="alert alert-success">
     {{ session()->get('successMsg') }}
</div>
@endif
  </form>
  @endforeach
</div>
<script>
function myFunction() {
  document.getElementById("mySubmit").disabled = true;
}
</script>
</html>

@endsection