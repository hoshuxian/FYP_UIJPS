@extends ('masterA')
@section('content')

<!DOCTYPE html>
    <html>
        <style>

.container2{
  width: 70%;
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

.top {
  position: absolute;
  top: 120px;
  right: 10%;
}

.top p {
  font-size: 15px;
}

.top span {
  color: #1a1aff;
  cursor: pointer;
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

.alert-success{
    width: 65%;
    height: 200px;
    margin-left: 20%;
    background-color: #d4edda;
    border-radius: 5px;
    margin-top: 5px;
    padding-left: 10px;
    color: #007e33;
}
</style>

<div class="container2">
<div class="top">
<p>
    Student?
    <a href="/createstdprofile">
    <span data-id="#1a1aff">Change now</span>
</a>
</p>
</div>
<form action='createemployer' method='post'enctype="multipart/form-data">
  @csrf
  <img src="/default.jpg"style="width:150px;height:150px; float:left;border-radius:50%;margin-right:25px;border;" name ="image" required>
    <br><br><input type ="file" name="image">
    <div class="hr3">
    <hr>
    </div>
    <div class="user-details">
      <div class="input-box">
        <span class="details">Company Name</span>
        <input type="text" class="text" placeholder="Comapny's Name" name="name" required>
      </div>

      <div class="input-box">
        <span class="details">Register No</span>
        <input type="text" class="text"placeholder ="Company's register number"  name="reg" required>
      </div>
      
      <div class="input-box">
        <span class="details">Address</span>
        <input type="text" class="text" placeholder="Company's Address"  name="address" required>
      </div>

      <div class="input-box">
        <span class="details">Office Number</span>
        <input type="text" class="text" placeholder="Company's office number"  name="officenum" required>
      </div>

      <div class="input-box">
        <span class="details">Fax</span>
        <input type="text" class="text" placeholder="Company's fax number" name="faxnum" >
      </div>

      <div class="input-box">
        <span class="details">Email</span>
        <input type="text" class="text" placeholder="Company's Email Address"  name="email" required>
      </div>

      <div class="input-box">
        <span class="details">Password</span>
        <input type="text" class="text" placeholder="********" name="password" required>
      </div>

      <div class="input-box">
        <span class="details">Confirm Password</span>
        <input type="text" class="text" placeholder="********" name="confirmpassword" required>
      </div>

      <div class="company-details">
        <input type="radio" name="company" id="dot-1" value="Micro-sized business">
        <input type="radio" name="company" id="dot-2" value="Small-sized business">
        <input type="radio" name="company" id="dot-3" value="Medium-sized business">
        <input type="radio" name="company" id="dot-4" value="Large-sized business">

        <span class="company-title">Company Size</span>
        <div class="category">
          <label for="dot-1">
            <span class="dot one"></span>
            <span class="company">Micro-sized business</span>
          </label>

          <label for="dot-2">
            <span class="dot two"></span>
            <span class="company">Small-sized business</span>
          </label>

          <label for="dot-3">
            <span class="dot three"></span>
            <span class="company">Medium-sized business</span>
          </label>

          <label for="dot-4">
            <span class="dot four"></span>
            <span class="company">Large-sized business</span>
          </label>
        </div>
      </div>

      <div class="input-box">
        <span class="details">Company Profile Description</span>
        <textarea class="text" name="description" cols="90" rows="3"id="description" type="text" placeholder="Company's description" name="description" ></textarea>
      </div>
</div>
    
    @if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

    <button type="submit" class="button" value="create" style="margin-left:65%;"> CREATE</button>
    <button onclick="location.href='{{ url('/searchempprofile') }}'" type="submit" class="button" value="Back">CANCEL</button>

  </form>
</div>

</html>




@endsection
