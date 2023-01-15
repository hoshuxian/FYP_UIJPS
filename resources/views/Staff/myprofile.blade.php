@extends ('masterStaff')
@section('content')

<!DOCTYPE html>
    <html>
        <style>
.box{
    width: 77%;
    height: fit-content;
    margin-left: 15%;
    margin-bottom: 3%;
    text-align: center;
    object-fit: cover;
    margin-top: -18%;
    border-radius: 20px;
    object-fit: cover;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
}

.background{
    margin: 10px;
    width: 120%;
    height:  fit-content;
    margin-left:-10%;
    margin-top: 20px;
    z-index: -5;
}

.design1{
    width: 73%;
    height: fit-content;
    margin-left: 12%;
    margin-bottom: 10%;
    text-align: center;
    object-fit: cover;
    margin-top: 3%;
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
    margin-bottom: 3%;
    text-align: center;
    object-fit: cover;
    margin-top: 3%;
    border-radius: 20px;
    object-fit: cover;
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

.std_pic{
    width:250px;
    height:250px; 
    border-radius:50%;
    margin-left:25px;
    margin-top: -10%;
    z-index: 999;
}

.resume{
    margin-top: -5%;
    margin-left: 5%;
}

.resume_pic{
    width: 55%;
    height:600px;
    margin-top: 2%;
    margin-left: 5%;
    object-fit: contain;
}

.profile{
    margin-left:-40%;
    margin-top: 10px;
}

.design2 th{
    width:20%;
    font-size: 24px;
    border-radius:5px;
    border: transparent;
    margin-top: 3%;
    text-align: center;
    justify-content: center;
    text-align:center;
}

.resume{
    margin-top: -5%;
    margin-left: 5%;
}

.resume_pic{
    width: 55%;
    height:600px;
    margin-top: 2%;
    margin-left: 5%;
    object-fit: contain;
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
</style>

<div class="box">
<div class="background">
<img class="background_img"src="/stdbackground.jpg">
<div class="myprofile">
@foreach(Session::get('result') as $detaa)
<form action="/updatestafflist/{{ $detaa->id}} " method='get'>

@if($detaa->staff_pic)
    <img class="std_pic" src="{{$detaa->staff_pic}}" name="image">
@else
    <img class="std_pic" src="/default.jpg" name="image"/>
@endif

<h2 class="profile"> MY PROFILE</h2>
        <div class="design1">
            <div class="design2">
            @csrf
    <table>
<tr>
<th>{{$detaa->staff_name}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->staff_phonenum}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->staff_email}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->staff_faculty}}<br><br></th>
</tr>

</table>
            </div>
        </div>
@endforeach
    </div>
</div>
</div>

<br><br>
<button type="submit" value="edit" style="margin-left:70%;">EDIT</button>
<a href='/searchstaff' type="submit"value="Back" class="button">BACK</a>
<br><br>
</form>
</html>




@endsection