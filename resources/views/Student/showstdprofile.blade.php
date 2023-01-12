@extends ('masterS')
@section('content')

<!DOCTYPE html>
    <html>
        <style>
.box{
    width: 80%;
    height: fit-content;
    margin-left: 15%;
    margin-bottom: 3%;
    text-align: center;
    object-fit: cover;
    margin-top: -6%;
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

.profile{
    margin-left:-40%;
    margin-top: 10px;
}

.design2 th{
    width:90%;
    font-size: 24px;
    border-radius:5px;
    border: transparent;
    margin-top: 3%;
    text-align: center;
    justify-content: center;
    margin-left: 12%;
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

</style>

@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif
<div class="box">
<div class="background">
<img class="background_img"src="/stdbackground.jpg">
<div class="myprofile">

@foreach(Session::get('result') as $detaa)
<form action="/editprofile/{{ $detaa->id}}" method='get'>
    
@csrf
@if($detaa->std_pic)
    <img class="std_pic" src="{{$detaa->std_pic}}" name="image" id="image">
@else
    <img class="std_pic" src="/default.jpg" name="image"id="image"/>
@endif

<h2 class="profile" style="margin-left: -6%;margin-top: -10%;"> MY PROFILE<span style ="font-size: 90px;color: red;margin-left:40%;">{{$detaa->standard}}</span></h2>
<p style ="font-size:20px;color: red;margin-left:35%;margin-top: -5%;margin-bottom: 3%;">Level</p>
                 <div class="design1">
            <div class="design2">
    <table>
<tr>
<th>{{$detaa->std_name}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->std_matric}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->std_address}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->std_phonenum}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->std_email}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->std_faculty}}<br><br></th>
</tr>
<tr>
<th>{{$detaa->std_description}}<br><br></th>
</tr>

</table>
            </div>
        </div>
        <h2 class="resume"> RESUME</h2>
        @if($detaa->resume)
        <img src="{{$detaa->resume}}" name="image" class="resume_pic">
@else
    <img class="resume_pic" src="/nofile.png" name="image"/>
@endif
@endforeach
    </div>
</div>
</div>

<br><br>
<button type="submit" value="edit" style="margin-left:70%;">EDIT</button>
<button  onclick="location.href='{{ url('/ratingform') }}'" type="button" style="width:fit-content;padding:2px;">Rating Form</button>
<br><br>
</form>
</div>
</div>
</div>

</html>




@endsection