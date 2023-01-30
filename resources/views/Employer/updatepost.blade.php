@extends ('masterE')
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

form input:focus,
form input:valid{
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
@foreach(Session::get('result') as $detaa)
<input type="hidden" class="text" placeholder="Company's ID" value="{{ $detaa->id}}"name="id" id="id">
    <img class="background_img" src="/nobackground.jfif" id="background"/>
@if($detaa->company_logo)
        <img src="{{$detaa->company_logo}}" name="image" class="emp_pic" id="image"><h2 style="padding-left:23%;margin-top:-9%;" class="name">{{$detaa->company_name}}<br><br></h2>
@else
    <img class="emp_pic" src="/nologo.png" name="image"id="image"/>
@endif
@endforeach
<br>
@foreach($result as $detaa)
<form action='/postupdate/{{$detaa->post_id}}' method='post'enctype="multipart/form-data">
@csrf
<input type="hidden" class="text" placeholder="Post's ID" value="{{ $detaa->post_id}}" name="post_id" id="post_id" required readonly>
    <table>
<tr> 
<th>Job title:</th>
<th><input type="text" class="text" placeholder="Job Title" name="job_title" value="{{ $detaa->job_title}}" id="job_title" required></th>
</tr>

<tr>
<th>Venue:</th>
<th><input type="text" class="text"placeholder ="Working Place"  name="job_venue" value="{{ $detaa->job_venue}}" id="job_venue" required></input>
</tr>

<tr>
<th>Address:</th>
<th><input type="text" class="text" placeholder="Company's Address" name="job_address" value="{{ $detaa->job_address}}" id="job_address" required></input></th>
</tr>

<tr>
<th>Position Available:</th>
<th><input type="text" class="text" placeholder="Number of position available" name="position_available" value="{{ $detaa->position_available}}" id="position_available"  required></input></th>
</tr>

<tr>
<th>Salary:</th>
<th><input type="text" class="text" placeholder="Job's Salary" name="job_salary" value="{{ $detaa->job_salary}}" id="job_salary" required></input></th>
</tr>

<tr>
<th>Job Category:</th>
<th><select name = "job_category" required>
<option value="{{ $detaa->job_category}}" id="job_category">{{ $detaa->job_category}}</option>
<option value ="all">All Job Specializations</option>
<option value = "accounting/finance">Accounting/Finance</option>
<option value = "admin/human resources">Admin/Human Resources</option>
<option value = "sales/marketing">Sales/Marketing </option>
<option value ="arts/media/communications">Arts/Media/Communications</option>
<option value = "services">Services</option>
<option value = "hotel/restaurant">Hotel/Restaurant </option>
<option value ="education/training">Education/Training</option>
<option value = "computer/information technology">Computer/Information Technology</option>
<option value = "engineering">Engineering</option>
<option value ="manufacturing">Manufacturing</option>
<option value = "building/construction">Building/Construction</option>
<option value = "science">Sciences</option>
<option value ="healthcare">Healthcare</option>
<option value = "other">Others</option>
</select></th>
</tr>

<tr>
    <td columnspan="20"><div class="hr4"></div></td>
</tr>

<tr>
<th style="font-size: 27px;">Job Details</th>
</tr>

<tr>
<th>Job Description:</span></th>
<th><input type="text" class="text" placeholder="Description..." style="height:100px" name="job_description" value="{{ $detaa->job_description}}" id="job_description" required></input></th>
</tr>

<tr>
<th>Benefits:</th>
<th><input type="text" class="text" placeholder="Description..." style="height:100px" name="job_benefit" value="{{ $detaa->job_benefit}}" id="job_benefit" ></input></th>
</tr>

<tr>
<th>Job Highlight:</th>
<th><input type="text" class="text" placeholder="Description..." style="height:100px" name="job_highlight" value="{{ $detaa->job_highlight}}" id="job_highlight" ></input></th>
</tr>

<tr>
<th>Job Requirement:</th>
<th><input type="text" class="text" placeholder="Description..." style="height:100px" name="job_requirement"  value="{{ $detaa->job_requirement}}" id="job_requirement" required></input></th>
</tr>


</table>
<button type="submit" class="button" value="update" style="margin-left:65%;"> UPDATE</button>
@if(session()->has('successMsg'))
<div class="alert alert-success">
     {{ session()->get('successMsg') }}
</div>
@endif
@endforeach
  </form>
</div>

</html>

@endsection
