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
  margin-left: 24%;
  margin-bottom: 10%;
  object-fit: cover;
  margin-top: -330px;
  border: 2px solid black;
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
  width: 80%;
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
@foreach($result as $detaa)
<div class="container2">
<form action='/blacklistupdate' method='post'enctype="multipart/form-data">
  {{ csrf_field() }}
  <h1>Update Form</h1>
  <div class="hr3">
    <hr>
    </div>
    <input type="text" class="text" placeholder="Blacklist's ID" value="{{ $detaa->id}}"name="id" id="id" hidden >
    <div class="user-details">
    <div class="input-box">
        <span class="details">Company Name</span>
        <input type="text" class="text" placeholder="Comapny's Name" value="{{ $detaa->companyname}}"name="name" id="name" required >
      </div>
      
      <div class="input-box">
        <span class="details">Address</span>
        <input type="text" class="text" placeholder="Company's Address" value="{{ $detaa->companyaddress}}" id="address"  name="address" required>
      </div>
    </div>
    
    @if(session()->has('successMsg'))
    <div class="alert alert-success">
        {{ session()->get('successMsg') }}
    </div>
@endif

    <button type="submit" class="button" value="update" style="margin-left:55%;"> Update</button>
    <a href='/searchblacklist' type="button "value="Back" class="button" style="padding: 0.5rem 1.5rem;">BACK</a>

  </form>
</div>
@endforeach
</html>




@endsection
