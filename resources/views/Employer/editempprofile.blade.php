@extends ('masterE')
@section('content')

<!DOCTYPE html>
    <html>
        <style>

.container2{
  width: 63%;
  background: white;
  padding: 30px;
  border-radius: 5px;
  height: 100%;
  margin-left: 20%;
  margin-bottom: 10%;
  object-fit: cover;
  margin-top: -90px;
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
  margin: 20px 0 2px 0;
  width: calc(100% / 2 -20px);
}

.user-details .input-box .details{
  display: block;
  font-weight:500;
  margin-bottom: 5px;
}

.user-details .input-box input{
  height: 45px;
  width: 120%;
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

form .company-details{
  font-size: 16px;
  font-weight: 500;
  margin: 20px 0 12px 0;
}

form .company-details .company-title{
  font-size: 16px;
  font-weight: 500;
  margin: 20px 0 12px 0;
}

form .company-details .category{
  display: flex;
  width: 120%;
  margin: 14px 0;
  justify-content: space-between;
}

.company-details .category label{

  display: flex;
  align-items: center;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 5px;
}

.company-details .category .dot{
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

.emp_pic{
  width:150px;
  height:150px; 
  float:left;
  border-radius:50%;
  margin-right:25px;
  
}

</style>
<div class="container2">
<form action="/editemp" method='POST'enctype="multipart/form-data">
{{ csrf_field() }}
@foreach(Session::get('result') as $detaa)
<input type="hidden" class="text" placeholder="Comapny's ID" value="{{ $detaa->id}}"name="id" >
@if($detaa->company_logo)
<img src="{{$detaa->company_logo}}" name ="image" class="emp_pic" required>
@else
    <img class="emp_pic" src="/nologo.png" name="image"/>
@endif
<br><br><input type ="file" name="image" value="{{ $detaa->company_logo}}" id="image" required>
    <div class="hr3">
    <hr>
    </div>
    <div class="user-details">
      <div class="input-box">
        <span class="details">Company Name</span>
        <input type="text" class="text" placeholder="Comapny's Name" value="{{ $detaa->company_name}}"name="name" id="name" required >
      </div>

      <div class="input-box">
        <span class="details">Register No</span>
        <input type="text" class="text"placeholder ="Company's register number"  value="{{ $detaa->reg_no}}" name="reg_no" id="reg_no" required>
      </div>
      
      <div class="input-box">
        <span class="details">Address</span>
        <input type="text" class="text" placeholder="Company's Address" value="{{ $detaa->company_address}}" name="address" id="address" required>
      </div>

      <div class="input-box">
        <span class="details">Office Number</span>
        <input type="text" class="text" placeholder="Company's office number"  value="{{ $detaa->company_officenum}}" name="officenum" id="officenum" required>
      </div>

      <div class="input-box">
        <span class="details">Fax</span>
        <input type="text" class="text" placeholder="Company's fax number" value="{{ $detaa->company_faxnumber}}" name="faxnum" id="faxnum" >
      </div>

      <div class="input-box">
        <span class="details">Email</span>
        <input type="text" class="text" placeholder="Company's Email Address" value="{{ $detaa->company_email}}"name="email" id="email" required>
      </div>

      <div class="input-box">
        <span class="details">Password</span>
        <input type="text" class="text" placeholder="Password" value="{{ $detaa->company_password}}"name="password" id="password" required>
      </div>

      <div class="input-box">
        <span class="details">Confirm Password</span>
        <input type="text" class="text" placeholder="Confirm Password" value="{{ $detaa->company_confirmpass}}"name="confirmpassword" id="confirmpassword" required>
      </div>
      

      <div class="company-details">
        <input type="radio" name="company" id="dot-1" value="Micro-sized business" {{ $detaa -> company_size == 'Micro-sized business' ? 'checked' : ''}} required>
        <input type="radio" name="company" id="dot-2" value="Small-sized business"{{ $detaa -> company_size == 'Small-sized business' ? 'checked' : ''}} required>
        <input type="radio" name="company" id="dot-3" value="Medium-sized business"{{ $detaa -> company_size == 'Medium-sized business' ? 'checked' : ''}} required>
        <input type="radio" name="company" id="dot-4" value="Large-sized business"{{ $detaa -> company_size == 'Large-sized business' ? 'checked' : ''}} required>

        <span class="company-title">Company Size</span>
        <div class="category" selected>
          <label for="dot-1">
            <span class="dot one"></span>
            <span class="company">Micro-sized business</span>
          </label>

          <label for="dot-2" selected>
            <span class="dot two"></span>
            <span class="company">Small-sized business</span>
          </label>

          <label for="dot-3" selected>
            <span class="dot three"></span>
            <span class="company">Medium-sized business</span>
          </label>

          <label for="dot-4" selected>
            <span class="dot four"></span>
            <span class="company">Large-sized business</span>
          </label>
        </div>
      </div>

      <div class="input-box">
        <span class="details">Company Profile Description</span>
        <input class="text" name="description" cols="90" rows="3"id="description" type="text" placeholder="Company's description" value="{{ $detaa->company_description}}" style="width:680px;" ></input>
      </div>
    </div>

    @if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

    <button type="submit" class="button" value="update" style="margin-left:65%;"> UPDATE</button>
    <a href='/showempprofile' type="button "value="Back" class="button" style="padding: 0.5rem 1.5rem;">BACK</a>
    @endforeach
  </form>
</div>

</html>




@endsection
