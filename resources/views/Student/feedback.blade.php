@extends ('masterS')
@section('content')

<!DOCTYPE html>
    <html>
        <style>
.design1{
    width: 70%;
    height: 350px;
    margin-left: 15%;
    margin-bottom: 10%;
    text-align: center;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: #FDD017;
}

.design2{
    width: 90%;
    height: 250px;
    margin-left: 5%;
    margin-bottom: 10%;
    text-align: center;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: white;
}

.p3{
    text-align:center;
    font-size: 30px;
    font-style: normal;
    font-weight: bold;
    padding: 18px;
}

.design3{
    width: 112%;
    height: 400px;
    margin-left: -55px;
    margin-bottom: 10%;
    text-align: center;
    margin-top: 12%;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: #FDD017;
}
textarea{
    width: 90%;
    height: 250px;
    margin-left: 5%;
    margin-bottom: 10%;
    text-align: left;
    border-radius: 20px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    background: white;
    font-size: 21px;
    padding-left: 20px;
    padding-top: 20px;
}

.p1{
    text-align:center;
    font-size: 30px;
    font-style: normal;
    font-weight: bold;
    margin-top: 10px;
}

.p2{
    text-align:center;
    font-size: 27px;
    font-style: normal;
    font-weight: thin;
    margin-bottom: 10px;
}

.smileys input[type="radio"] {
			-webkit-appearance: none;
			width: 120px;
			height: 120px;
			border: none;
			cursor: pointer;
			transition: border .2s ease;
			transition: all .2s ease;
            margin-left: 30px;
}

.smileys input[type="radio"]:hover ,
.smileys input[type="radio"]:checked {
			border: 2px solid black;
			}
			
            .smileys input[type="radio"]:focus {
				outline: 0;
			}
			
            .smileys input[type="radio"].excellent {
				background: url('/rate1emoji.png');
				background-size: cover;
			}
			
            .smileys input[type="radio"].good {
    background: url('/rate2emoji.png');
				background-size: cover;
			}
            .smileys input[type="radio"].moderate {
    background: url('/rate3emoji.png');
				background-size: cover;
			}

            .smileys input[type="radio"].bad {
    background: url('/rate4emoji.png');
				background-size: cover;
			}

            .smileys input[type="radio"].worst {
    background: url('/rate5emoji.png');
				background-size: cover;
			}

            .smileys{
                margin-top: 20px;
            }

form .button{
  height: 45px;
  margin-top: 27%;
  margin-left: 70%;
  margin-bottom: 6%;
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
 .popup{
    width: 400px;
    background: #fff;
    border-radius: absolute;
    margin-top: 74%;
    transform: translate(-50%,-50%) scale(0.1);
    text-align:center;
    padding: 0 30px 30px;
    color: #333;
    transition: transform 0.4s , top 0.4s;
    margin-left: 50%;
    visibility: hidden;
    box-shadow: 0 15px 30px rgba(0,0,0,0.6);
     border: 1px solid rgba(255,255,255,0.5);
     margin-bottom: -100%;
 }

 .open-popup{
    visibility:visible;
    margin-top: -40%;
    transform: translate(-50%,-50%) scale(1);
    margin-bottom: 14%;
 }

 .popup img{
    width: 100px;
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
 }

 .popup h2{
    font-size: 38px;
    fontweight: 500;
    margin: 30px 0 10px;
 }

 .popup button{
    width: 100px;
    margin-top: 50px;
    padding: 10px 0;
    background: #6fd649;
    color: #fff;
    border: 0;
    outline: none;
    font-size: 18px;
    border-radius: 4px;
    cursor: pointer;
    box-shadow: 0 5px 5px rgba(0,0,0,0.2);
 }

 textarea,
span.prefix {
  font-size: 1em;
  font-weight: normal;
  padding: 15px;
  border-width: 1px;
  margin-left: 3%;
  padding-top: 30px;
}

span.prefix {
  position: absolute;
}

</style>

<form action="/submitfeedback" method="post" enctype="multipart/form-data">
<p style="color:black;margin-top: -5%;margin-left: 20%;font-size: 24px;">Company: &emsp;
<select style="width: 60%;height: 30px;" id="companyname" name="companyname" required>
@foreach($deta as $detaa)
<option value="Select">Select Company name</option>
<option value="{{$detaa->company_name}}">{{ $detaa->company_name }}</option>
 @endforeach
    </select>
</p>
<br><br>
@csrf
<div class="design1">
    <div class="p3">
        <p>We'd love your feedback</p>
    </div>
    <div class="design2">
    <div class="p3">
        <p> How do you rate our system?</p>
        </div>

        <div class="smileys">
	<input type="radio" name="rate" id="rate" value="excellent" class="excellent" required>
	<input type="radio" name="rate" id="rate" value="good" class="good"required>
	<input type="radio" name="rate" id="rate" value="moderate" class="moderate"required>
    <input type="radio" name="rate" id="rate" value="bad" class="bad"required>
    <input type="radio" name="rate" id="rate" value="worst" class="worst"required>
        </div>
        <div class="design3">
            <div class="p1">
                 <p>Could you tell us a little bit more?</p>
            </div>
            <div class="p2">
                <p style="font-weight: thin;">We'll use your feedback to improve our system</p>   
            </div>
            <textarea class="text" name="comment" cols="90" rows="3"id="comment" type="text" placeholder="Add a comment..." data-prefix="Student comments on company:"></textarea>
        </div>
    </div>
</div>
<button type="button" class="button" onclick="openpopup()"> SUBMIT</button>
<div class="popup" id="popup">
    <img src="tick.png">
    <h2>Thank You!</h2>
    <p>Your feedback has been successfully submitted. Thanks!</p>
    <button type="submit" onclick="closepopup()">OK</button>
</div>
        </form>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
const popup = document.getElementById("popup");
        function openpopup(){

                popup.classList.add("open-popup");
        }

        function closepopup(){
            popup.classList.remove("open-popup");
        }

        $('textarea.text').each(function() {
  var prefix = $('<span/>')
    .text($(this).data('prefix'))
    .addClass('prefix')
    .appendTo('body')
    .css({
      left: $(this).position().left + 'px',
      top: $(this).position().top + 'px',
    });
  $(this).css({
    textIndent: prefix.outerWidth() + 'px'
  });
});
      </script>  
</html>




@endsection
