@extends ('masterA')
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
  margin-left: 20%;
  margin-bottom: 10%;
  object-fit: cover;
  margin-top: -330px;
  text-align:left;
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

form .hr3{
  margin-top: 3%;
  border-left: 3px solid black;
  height: 600px;
  width:20%;
}

form .hr4{
  margin-top: 3%;
  margin-left: 22%;
  border-top: 3px solid black;
  width:270%
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

form th{
  padding-left: 5%;
  width: 30%;
}
</style>

<div class="container2">
<form action='/eventupdate' method='post'enctype="multipart/form-data">
@foreach($result as $detaa)
@csrf
<input type="hidden" class="text" placeholder="Event's ID" value="{{ $detaa->id}}" name="id" id="id" >

    <table>
    <tr>
    @if($detaa->event_pic)
    <td rowspan="15" style="width:10px;"><img src="{{$detaa->event_pic}}" style="width:300px;height:300px;float:left;margin-left: -10%;" name ="image">
    <input type ="file" name="image" style="margin-top: 5%;font-size: 15px;" value="{{$detaa->event_pic}}" id="image" required></td>
        @else
        <td rowspan="15" style="width:10px;"><img src="/picdefault.png"style="width:300px;height:300px;float:left;margin-left: -10%;" name ="image">
    <input type ="file" name="image" style="margin-top: 5%;font-size: 15px;"></td>
        @endif
</tr>

<tr>
    <td rowspan="15" ><div class="hr3"></div></td>
</tr>

<tr> 
<th>Event Name:</th>
<th><input type="text" class="text" placeholder="Event's Name" name="name" value="{{$detaa->event_name}}" id="name" required></th>
</tr>

<tr>
<th>Event Description 1:</th>
<th><input type="text" class="text"placeholder ="Event's Description 1"  name="description1" value="{{$detaa->event_description1}}" id="description1" required></input></th>
</tr>

<tr>
<th>Event Description 2:</th>
<th><input type="text" class="text" placeholder="Event's Description 2" name="description2" value="{{$detaa->event_description2}}" id="description2" required></input></th>
</tr>

<tr>
    <td columnspan="20"><div class="hr4"></div></td>
</tr>

<tr>
<th style="font-size: 27px;">Event Details</th>
</tr>

<tr>
<th>Event Time</span></th>
<th><input type="text" class="text" placeholder="Time" name="time" value="{{$detaa->event_time}}" id="time"required></th>
</tr>

<tr>
<th>Event Date:</th>
<th><input type="date" class="text" placeholder="Date" name="date" value="{{$detaa->event_date}}" id="date" required></th>
</tr>

<tr>
<th>Speaker:</th>
<th><input type="text" class="text" placeholder="Speaker" name="speaker" value="{{$detaa->event_speaker}}" id="speaker" required></th>
</tr>

<tr>
<th>Venue:</th>
<th><input type="text" class="text" placeholder="Venue" name="address" value="{{$detaa->event_address}}" id="address" required></th>
</tr>

<tr>
<th>Link:</th>
<th><input type="text" class="text" placeholder="Link" name="link" value="{{$detaa->event_link}}" id="link"></th>
</tr>

</table>
@if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

    <button type="submit" class="button" value="update" style="margin-left:65%;"> UPDATE</button>
    <a href='/displayevent/{{$detaa->id}}' type="button "value="Back" class="button" style="padding: 0.5rem 1.5rem;">BACK</a>
    @endforeach
  </form>
</div>

</html>

@endsection