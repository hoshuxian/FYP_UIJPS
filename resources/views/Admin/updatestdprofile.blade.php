@extends ('masterA')
@section('content')

<!DOCTYPE html>
    <html>
        <style>

.container2{
  width: 60%;
  background: white;
  padding: 30px;
  border-radius: 5px;
  height: 100%;
  margin-left: 20%;
  margin-bottom: 10%;
  object-fit: cover;
  margin-top: -330px;
}

.container2 .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}

.container2 .title::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}

.container2 form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

form .user-details .input-box{
  margin: 20px 0 12px 0;
  width: calc(100% / 2 -20px);
}

.user-details .input-box .details{
  display: block;
  font-weight:500;
  margin-bottom: 5px;
}

.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.user-details .input-box textarea{
  height: 60px;
  width: 100%;
  outline: none;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 15px;
  font-size: 16px;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}

.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}

form .faculty-details{
  font-size: 16px;
  font-weight: 500;
  margin: 20px 0 12px 0;
}

form .faculty-details .faculty-title{
  font-size: 16px;
  font-weight: 500;
  margin: 20px 0 12px 0;
}

form .faculty-details .category{
  display: flex;
  width: 80%;
  margin: 14px 0;
  justify-content: space-between;
}

.faculty-details .category label{

  display: flex;
  align-items: center;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 5px;
}

.faculty-details .category .dot{
  height: 18px;
  width: 18px;
  background: #d9d9d9;
  border-radius: 50%;
  margin-right: 10px;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}

#dot-1:checked ~ .category label .one,
#dot-2:checked ~ .category label .two,
#dot-3:checked ~ .category label .three,
#dot-4:checked ~ .category label .four,
#dot-5:checked ~ .category label .five,
#dot-6:checked ~ .category label .six,
#dot-7:checked ~ .category label .seven{
  border-color: #d9d9d9;
  background: black;
}

form input[type="radio"]{
  display: none;
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
  background: black;
  margin-left: 22%;
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
</style>
<div class="container2">
<form action="/stdupdate" method='POST'enctype="multipart/form-data">
{{ csrf_field() }}
@foreach($result as $detaa)
<input type="hidden" class="text" placeholder="Student's ID" value="{{ $detaa->id}}"name="id" id="id">

  <img src="{{ $detaa->std_pic}} "style="width:150px;height:150px; float:left;border-radius:50%;margin-right:25px;border;" name ="image" required>
    <br><br><input type ="file" name="image" value="{{ $detaa->std_pic}}" id="image">
    <div class="hr3">
    <hr>
    </div>
    <div class="user-details">
      <div class="input-box">
        <span class="details">Name</span>
        <input type="text" class="text" placeholder="Student's Name" value="{{ $detaa->std_name}}"name="name" id="name" required >
      </div>

      <div class="input-box">
        <span class="details">Matric ID</span>
        <input type="text" class="text"placeholder ="Student's Matric ID"  value="{{ $detaa->std_matric}}" name="matric" id="matric" required>
      </div>

      <div class="input-box">
        <span class="details">Address</span>
        <input type="text" class="text" placeholder="Student's Address"value="{{ $detaa->std_address}}" name="address" id="address" required>
      </div>

      <div class="input-box">
        <span class="details">Phone Number</span>
        <input type="text" class="text" placeholder="Student's Phone Number" value="{{ $detaa->std_phonenum}}" name="phonenum" id="phonenum" required>
      </div>

      <div class="input-box">
        <span class="details">Email Address</span>
        <input type="text" class="text" placeholder="Student's Email Address" value="{{ $detaa->std_email}}"name="email" id="email" required>
      </div>

      <div class="input-box">
        <span class="details">Password</span>
        <input type="text" class="text" placeholder="********" value="{{ $detaa->cstd_password}}"name="password" id="password" required>
      </div>

      <div class="input-box">
        <span class="details">Confirm Password</span>
        <input type="text" class="text" placeholder="********" value="{{ $detaa->std_confirmpassword}}"name="confirmpassword" id="confirmpassword" required>
      </div>

      <div class="faculty-details">
        <input type="radio" name="faculty" id="dot-1" value="FKOM" {{ $detaa -> std_faculty == 'FKOM' ? 'checked' : ''}} required>
        <input type="radio" name="faculty" id="dot-2" value="FKM" {{ $detaa -> std_faculty == 'FKM' ? 'checked' : ''}} required>
        <input type="radio" name="faculty" id="dot-3" value="FTKKP" {{ $detaa -> std_faculty == 'FTKKP' ? 'checked' : ''}} required>
        <input type="radio" name="faculty" id="dot-4" value="FTKEE" {{ $detaa -> std_faculty == 'FTKEE' ? 'checked' : ''}} required>
        <input type="radio" name="faculty" id="dot-5" value="FTKPM" {{ $detaa -> std_faculty == 'FTKPM' ? 'checked' : ''}} required>
        <input type="radio" name="faculty" id="dot-6" value="FIST" {{ $detaa -> std_faculty == 'FIST' ? 'checked' : ''}} required>
        <input type="radio" name="faculty" id="dot-7" value="FTKA" {{ $detaa -> std_faculty == 'FTKA' ? 'checked' : ''}} required>

        <span class="faculty-title">Faculty</span>
        <div class="category">
          <label for="dot-1">
            <span class="dot one"></span>
            <span class="faculty">FKOM</span>
          </label>

          <label for="dot-2">
            <span class="dot two"></span>
            <span class="faculty">FKM</span>
          </label>

          <label for="dot-3">
            <span class="dot three"></span>
            <span class="faculty">FTKKP</span>
          </label>

          <label for="dot-4">
            <span class="dot four"></span>
            <span class="faculty">FTKEE</span>
          </label>

          <label for="dot-5">
            <span class="dot five"></span>
            <span class="faculty">FTKPM</span>
          </label>

          <label for="dot-6">
            <span class="dot six"></span>
            <span class="faculty">FIST</span>
          </label>

          <label for="dot-7">
            <span class="dot seven"></span>
            <span class="faculty">FTKA</span>
          </label>
        </div>
      </div>

      <div class="input-box">
        <span class="details">Profile Description</span>
        <input class="text" name="description" cols="90" rows="3"id="description" type="text"value="{{ $detaa->std_description}}" style="width:680px;"></input>
      </div>

      <div class="input-box">
        <span class="details">Resume</span>
        <input style="border:transparent;margin-top:10px;" type ="file" name="resume" value="{{ $detaa->resume}}" id="resume" required>
      </div>


    </div>

    @if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

    <button type="submit" class="button" value="update" style="margin-left:65%;"> UPDATE</button>
    <a href='/displaystdprofile/{{$detaa->id}}' type="button "value="Back" class="button" style="padding: 0.5rem 1.5rem;">BACK</a>
    @endforeach
  </form>
</div>

</html>




@endsection
