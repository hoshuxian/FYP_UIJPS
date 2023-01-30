@extends ('masterA')
@section('content')

<!DOCTYPE html>
    <html>
        <style>
.box{
    width: 70%;
    height: fit-content;
    margin-left: 15%;
    margin-bottom: 3%;
    text-align: center;
    object-fit: cover;
    margin-top: -24%;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
}

.background{
    margin: 10px;
    width: 120%;
    height: 100%;
    margin-left:-10%;
    margin-top: 20px;
    z-index: -5;
}

.design1{
    width: 74%;
    height: fit-content;
    margin-left: 12%;
    margin-bottom: 5%;
    text-align: center;
    object-fit: cover;
    margin-top: 1%;
    border-radius: 20px;
    object-fit: cover;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: #FDD017;
}

.design2{
    width: 103%;
    height: fit-content;
    margin-left: 3%;
    text-align: center;
    object-fit: cover;
    margin-top: 3%;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: white;
}

.background_img{
    width: 80%;
    height:40%;
    object-fit:cover;
}

.emp_pic{
    width:200px;
    height:200px;
    margin-left:-45%;
    margin-top: -10%;
    z-index: 999;
    object-fit:fill;
    border: 1px solid black;
    border-radius: 50%;
}

.profile{
    margin-left:-50%;
    margin-top: 1%;
}

button{
  height: 45px;
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

button:hover{
  background: #F3C301;
  border: 3px solid white;
}

.button{
  height: 60px;
  margin-left: 3%;
  margin-bottom: 15px;
  width: 120px;
  background: white;
  border: 3px solid #F3C301;
  font-size: 18px;
  font-weight: 500;
  border-radius: 35px;
  letter-spacing: 1px;
  padding: 10px;
  padding-left: 20px;
  padding-right: 20px;
}

.button:hover{
  background: #F3C301;
  border: 3px solid white;
}

.name{
    width:90%;
    font-size: 24px;
    border-radius:5px;
    border: transparent;
    margin-top: 3%;
    text-align: center;
    justify-content: center;
    margin-left: 12%;
}

.description{
    margin-left:-60%;
    margin-top: 2%;
}

.company_description{
    margin-left:-90%;
}

.design3{
    width: 74%;
    height: 300px;
    margin-left: 12%;
    margin-bottom: 10%;
    text-align: center;
    object-fit: cover;
    margin-top: 5%;
    border-radius: 20px;
    object-fit: cover;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: #FDD017;
}

.design4{
    width: 102%;
    height: 300px;
    margin-left: 3%;
    margin-bottom: 10%;
    text-align: center;
    object-fit: cover;
    margin-top: 3%;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: white;
}

table{
    font-size: 15px;
    margin-top: -20px;
    margin-left: 3%;
    width: 60%;
}

table th{
    text-align: left;
    padding-left: 10px;
}

.name{
    padding-left: -200px;
    margin-top: -3%;
}

</style>

<div class="box">
<div class="background">

@foreach($result as $detaa)
@if($detaa->company_backgroundpic)
        <img src="{{$detaa->company_backgroundpic}}" name="image" class="background_img">
@else
    <img class="background_img" src="/nobackground.jfif" name="image"/>
@endif

<div class="myprofile">
<form action="/updateempprofile/{{ $detaa->id}} " method='get'>

@if($detaa->company_logo)
        <img src="{{$detaa->company_logo}}" name="image" class="emp_pic">
@else
    <img class="emp_pic" src="/nologo.png" name="image"/>
@endif

<h2 class="name">{{$detaa->company_name}}<br><br></h2>
<h2 class="profile"> COMPANY PROFILE</h2>
        <div class="design1">
            <div class="design2">
            @csrf
            <h2 class="description"> COMPANY DESCRIPTION</h2><br><br>
            <div style="margin-left:1%;" class="company_description">
        {{$detaa->company_description}}<br><br>
            </div>
</div>
</div>
            <div class="design3">
                <div class="design4">
                <h2 class="description"> COMPANY INFORMATION</h2><br><br>
                <table>
<tr>
<th style="font-weight:bold;font-family: 'Poppins',sans-serif;">Register No</th>
<th style="font-weight:bold;font-family: 'Poppins',sans-serif;">Address</th>
</tr>
<tr>
<th style="font-weight:normal;font-family: 'Poppins',sans-serif;">{{$detaa->reg_no}}<br><br></th>
<th style="column:4;font-family: 'Poppins',sans-serif;font-weight:normal;">{{$detaa->company_address}}<br><br></th>
</tr>
<tr>
<th style="font-weight:bold;font-family: 'Poppins',sans-serif;">Company Size</th>
</tr>
<tr>
<th style="font-weight:normal;font-family: 'Poppins',sans-serif;">{{$detaa->company_size}}<br><br></th>
</tr>
<tr>
<th style="font-weight:normal;font-family: 'Poppins',sans-serif;">Email: {{$detaa->company_email}}<br><br></th>
<th style="font-weight:normal;font-family: 'Poppins',sans-serif;">Tel: {{$detaa->company_officenum}}</th>
</tr>
<tr>
<th style="font-weight:normal;font-family: 'Poppins',sans-serif;">Fax: {{$detaa->company_faxnumber}}</th>
</tr>
</table>
@endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

<br><br>
<button type="submit" value="edit" style="margin-left:70%;">EDIT</button>
<a href='/searchempprofile' type="submit"value="Back" class="button">CANCEL</a>
<br><br>
</form>
</html>




@endsection