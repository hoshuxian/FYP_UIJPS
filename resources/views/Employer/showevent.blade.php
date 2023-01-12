@extends ('masterE')
@section('content')

<!DOCTYPE html>
    <html>
        <style>
.box{
    width: 70%;
    margin-left: 15%;
    margin-bottom: 3%;
    text-align: center;
    object-fit: cover;
    margin-top: -3%;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    display: flex;
    flex-direction:column;
    min-height: 100vh;
}

img{
    margin-top: 10%;
    width: 400px;
    height: 290px;
}

table th{
    width: 50%;
    padding-left: 5%;
    padding-right: 5%;
    padding-top: 20px;
    text-align: left;
}

table td{
    width: 30%;
    padding-top: 20px;
}

form{
    flex:1;
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
<div class="box">
@foreach($result as $detaa)
            <form action="/editevent/{{ $detaa->id}}" method='get'>
            @csrf
            <table>
            <tr>
        @if($detaa->event_pic)
            <td rowspan="3"><img class="event_pic" src="{{$detaa->event_pic}}" name="image"></td>
        @else
            <td rowspan="3"><img class="event_pic" src="/picdefault.png" name="image"></td>
        @endif
</tr>

            <tr>
                <th style="font-size: 27px;vertical-align:bottom;">{{$detaa->event_name}}</th>
            </tr>
            <tr>
                <th style="vertical-align:top;">{{$detaa->event_description1}}</th>
            </tr>
            <tr>
                <th colspan="2" style="padding-left:15%;padding-top: 6%;">{{$detaa->event_description2}}<br><br></th>
            </tr>
            <tr>
                <th colspan="2" style="font-size: 27px;padding-left:15%;">Event Details</th>
            </tr>
            <tr>
                <th colspan="2" style="padding-left:15%;">Time: &nbsp&nbsp {{$detaa->event_time}}<br><br></th>
            </tr>
            <tr>
                <th colspan="2" style="padding-left:15%;">Date: &nbsp&nbsp{{$detaa->event_date}}<br><br></th>
            </tr>
            <tr>
                <th colspan="2" style="padding-left:15%;">Speaker: &nbsp&nbsp{{$detaa->event_speaker}}<br><br></th>
            </tr>
            <tr>
                <th colspan="2" style="padding-left:15%;">Link: &nbsp&nbsp{{$detaa->event_link}}<br><br></th>
            </tr>

            </table>
            <br><br>
</form>
@endforeach
</div>
<button  type="submit" style="margin-left:70%;">EDIT</button> <button  onclick="location.href='{{ url('/filterevent') }}'" type="button">BACK</button>
        <br><br>
</html>

@endsection