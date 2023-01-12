<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        
</head>

<style>
    /* FONTS */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap');
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
body{
    margin:0;
    font-family: 'Poppins',sans-serif;
}
/*iframe {
    width: 100%;
    margin-right: auto;
    position: absolute;
    z-index:-2;
    top: 0;
    right: 0;
}
h1 {
    font-family: 'Playfair Display';
    font-size: 4rem;
    margin-top: 3em;
    margin-bottom: .3em;
    color: #094b65;
}
.p1 {
    font-size: 1.6rem;
    font-weight: 300;
    margin: 0;
    color: #094b65;
}
h1,.p1 {
    text-align: center;
    clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
}*/
.owl{
  margin-top: -95.5%;
  margin-left: 55%;
  width: 211px;
  height: 108px;
  background-image: url('https://dash.readme.io/img/owl-login.png');
  object-fit: cover;
    position: absolute;
    z-index: 100;
}
  
.owl .hand{
    width: 34px;
    height: 34px;
    border-radius: 40px;
    background-color: #472d20;
    transform :scaleY(0.6);
    position :absolute;
    object-fit: cover;
    left: 14px;
    bottom :-8px;
    transition: 0.3s ease-out;
    
  }
    
    //.animate{
      transform: translateX(42px) translateY(-15px) scale(0.7);
    }
    
.owl .hand-r{
      left: 170px;
    }
      
      //.animate{
        transform: translateX(-42px) translateY(-15px) scale(0.7);
      }
    
.owl .arms{
    position: absolute;
    object-fit: cover;
    top: 58px;
    height: 41px;
    width: 100%;
    overflow :hidden;
  }
  
.owl .arms .arm{
      width: 40px;
      height: 65px;
      background-image: url('https://dash.readme.io/img/owl-login-arm.png');
      position: absolute;
      left: 20px;
      top :40px;
      transition: 0.3s ease-out;
    }
//.owl .arms .arm .animate{
        transform :translateX(40px) translateY(-40px);
      }
    
.owl .arms .arm-r{
        left: 158px;
        transform: scaleX(-1);
      }
//.owl .arms .arm-r .animate {
            transform: translateX(-40px) translateY(-40px) scaleX(-1);
        }
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
:root {
  /* Colors */
  --pink: #ff0066;
  --lightpink: #ffcce0;
  --blue: #1a1aff;
  --lightblue: #ccccff;
  --color: #4d4d4d;
  --custom: #1a1aff;
}
.img-box img {
  width: 100%;
  height: 100%;
}
.icon img {
  width: 20px;
}
section {
  position: relative;
  max-height: 770px;
  max-width: 900px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.5;
  margin-left: 20%;
  margin-top: 15%;
  padding-bottom: 10%;
}
section .container {
  position: relative;
  width: 900px;
  height: 770px;
  background-color: white;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
  overflow: hidden;
}
section .user {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
}
section .img-box {
  position: relative;
  width: 70%;
  height: 100%;
  transition: all 500ms ease-in-out;
}
section .img-box img {
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
}
section .form-box {
  position: relative;
  width: 50%;
  height: 100%;
  background-color: white;
  transition: 500ms ease-in-out;
}
section .form-box .top {
  position: absolute;
  top: 14px;
  right: 14px;
}
section .form-box .top p {
  font-size: 13px;
}
section .form-box .top span {
  color: var(--custom);
  cursor: pointer;
}
section form {
  position: absolute;
  top: 54%;
  left: 50%;
  width: 100%;
  max-width: 300px;
  transform: translate(-50%, -50%);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
section form .form-control {
  text-align: center;
}
section form .form-control input {
  font-family: "Poppins", sans-serif;
  border-radius: 5px;
  border: 1px solid #ddd;
  padding: 10px 0;
  margin-bottom: 10px;
  text-indent: 16px;
  width: 100%;
  color: var(--color);
  outline: none;
}
section form .form-control input:focus {
  border: 2px solid #005A9C;
}
section form .form-control select:focus {
  border: 2px solid #005A9C;
}
section form .form-control textarea:focus {
  border: 2px solid #005A9C;
}
section form .form-control textarea {
  font-family: "Poppins", sans-serif;
  border-radius: 5px;
  border: 1px solid #ddd;
  padding: 10px 0;
  margin-bottom: 10px;
  text-indent: 16px;
  width: 100%;
  color: var(--color);
  outline: none;
}
section form .form-control input[type="submit"] {
  display: block;
  text-align: center;
  width: 100%;
  border: none;
  outline: none;
  cursor: pointer;
  background-color: var(--custom);
  color: white;
  transition: 0.5s;
}
section form .form-control input[type="submit"]:hover {
  background-color: var(--lightblue);
}
section form .form-control h2 {
  width: 100%;
  font-weight: 400;
  font-size: 26px;
}
section form .form-control p {
  font-size: 15px;
  margin-bottom: 20px;
}
section form .form-control span {
  font-size: 13px;
  display: block;
  text-align: right;
  margin-bottom: 20px;
}
section form .form-control div {
  position: relative;
}
section form .form-control .icon {
  position: absolute;
  top: 55%;
  transform: translateY(-50%);
  right: 1rem;
  cursor: pointer;
}
section form .form-control{
  text-align: center;
}
section form .form-control p {
  position: relative;
  display: inline-block;
  font-size: 14px;
}
section form .form-control p::after {
  content: "";
  position: absolute;
  right: -50px;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  height: 2px;
  background-color: #ddd;
}
section form .form-control p::before {
  content: "";
  position: absolute;
  left: -50px;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  height: 2px;
  background-color: #ddd;
}
section form .form-control .icons {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
}
section form .form-control .icon {
  cursor: pointer;
}
section form .form-control .icon {
  margin-right: 15px;
}
/* Functionality */
section .owl.active{
  left: -45%;
}
section .container .signup {
  pointer-events: none;
}
section .container.active .signup {
  pointer-events: initial;
}
section .container .signup .form-box {
  top: 100%;
}
section .container.active .signup .form-box {
  top: 0;
}
section .container .signup .img-box {
  top: -100%;
}
section .container.active .signup .img-box {
  top: 0;
}
/*section .container .login .form-box {
  top: 0;
}
section .container.active .login .form-box {
  top: 100%;
}
section .container .login .img-box {
  top: 0;
}
section .container.active .login .img-box {
  top: -100%;
}*/
section form .form-control select {
  font-family: "Poppins", sans-serif;
  border-radius: 5px;
  border: 1px solid #ddd;
  padding: 10px 0;
  margin-bottom: 10px;
  text-indent: 16px;
  width: 100%;
  outline: none;
}
@media (max-width: 996px) {
  section .container {
    max-width: 400px;
  }
  section .container .img-box {
    display: none;
  }
  section .container .form-box {
    width: 100%;
  }
  section .container.active .login .form-box {
    top: -100%;
  }
  section .owl{
    margin-top: -105%;
    margin-left: 5%;
  }
}
@media (max-width: 567px) {
  section {
    padding: 0 50px;
  }
}
input::-ms-reveal,
      input::-ms-clear {
        display: none;
      }
      .hide{
    z-index: 10;
  }
  .emp{
    margin-top: 8%;
  }
  .alert-danger{
    width: 65%;
    height: 39px;
    margin-left: 20%;
    background-color: #f8d7da;
    border-radius: 5px;
    margin-top: 5px;
    padding-top:6px;
    padding-left: 10px;
    color: #cc0000;
}
  
    </style>


    <body>
            <!--<h1>We will build your success</h1>
            <p class="p1">Trust Us</p>
            <i class="fa fa-envelope"></i>
<iframe src='https://my.spline.design/untitled-04106cf20c93dae480a1b3aeb7364979/' frameborder='0' width='100%' height='100%'></iframe>-->
  @if(!empty($successMsg))
                        <div class="alert alert-danger" id="successMsg"> {{ $successMsg }}</div>
                    @endif
                    @if(!empty($failedMsg))
                        <div class="alert alert-danger" id="failedMsg"> {{ $failedMsg }}</div>
                    @endif
  <section>
  <div class="owl">
        <div class="hand"></div>
        <div class="hand hand-r"></div>
        <div class="arms">
            <div class="arm"></div>
             <div class="arm arm-r"></div>
        </div>
</div>
      <div class="container">
        <div class="user login">
          <div class="img-box">
            <img src="/stusignup.png" alt="" />
          </div>
          <div class="form-box">
            <div class="top">
              <p>
                Employer?
                <span data-id="#ff0066">Sign Up now</span>
              </p>
            </div>
            <form action='studentsignup' id="studentsignupform"method='post'enctype="multipart/form-data">
@csrf
              <div class="form-control">
              <h2>Welcome!</h2>
                <p>It's good to have you.</p>
                <div class="input-icons"> 
                <input id="name" placeholder="Student's Name" type="text" name="sname" required></input>
                  <input id="id" type="text" placeholder="Student's Matric ID" name="sid" required></input>
                  <input id="address" placeholder="Student's Address" type="text" name="saddress" required></input>
                  <input id="phonenum" type="text" placeholder="Student's Phone Address" name="sphonenum" required></input>
                  <input id="std_email" placeholder="Student's Email Address" type="email" name="std_email" required></input>
                  <input id="std_password" type="password" placeholder="Password" name="std_password" required></input>
                  <div class="icon hide">
                     <img src="/eye.svg" alt=""/>
                  </div>
                  <div>
                  <input id="std_confirmpassword" type="confirmpassword" placeholder="Confirm Password" name="std_confirmpassword" required></input>
                  <select id="faculty" name="sfaculty" required>
                    <option value="FKOM">FKOM</option>
                    <option value="FKM">FKM</option>
                    <option value="FTKKP">FTKKP</option>
                    <option value="FTKEE">FTKEE</option>
                    <option value="FTKPM">FTKPM</option>
                    <option value="FIST">FIST</option>
                    <option value="FTKA">FTKA</option>
                    </select>
                    <textarea name="sdescription" cols="40" rows="3"id="description" type="text" placeholder="Student's description" ></textarea>
                  </div>
                </div>
                <input type="Submit" value="Sign Up" id="signupBtn" />
              </div>
            </form>
          </div>
        </div>

        <!-- Register -->
        <div class="user signup">
          <div class="form-box">
            <div class="top">
              <p>
                Student?
                <span data-id="#1a1aff">Sign Up now</span>
              </p>
            </div>
            <form action='employersignup' id="employersignupform"method='post'enctype="multipart/form-data">
            @csrf
              <div class="form-control">
                <h2>Welcome Codevo!</h2>
                <p>It's good to have you.</p>
                <div class="input-icons"> 
                <input id="company_name" placeholder="Company's Name" type="text" name="company_name" required></input>
                  <input id="nombor" type="text" placeholder="Company's register number" name="e_reg_no" required></input>
                  <input id="company_address" placeholder="Company's Address" type="text" name="company_address" required></input>
                  <input id="officenum" type="text" placeholder="Company's office number" name="eofficenum" required></input>
                  <input id="faxnum" type="text" placeholder="Company's fax number" name="efaxnum"></input>
                  <input id="company_email" placeholder="Company's Email Address" type="email" name="company_email" required></input>
                  <input id="company_password" type="password" placeholder="Password" name="company_password" required></input>
                  <div class="icon hide emp">
                     <img src="/eye.svg" alt=""/>
                  </div>
                  <div>
                  <input id="company_confirmpass" type="password" placeholder="Confirm Password" name="company_confirmpass" required></input>
                  <select id="size" name="size" required>
                    <option value="micro">Micro-sized business</option>
                    <option value="small">Small-sized business</option>
                    <option value="medium">Medium-sized business</option>
                    <option value="large">Large-sized business</option>
                    </select>
                    <textarea name="edescription" cols="40" rows="3"id="description" type="text" placeholder="Company's description"></textarea>
                  </div>
                </div>
                <input type="Submit" value="Sign Up" />
              </div>
            </form>
          </div>
          <div class="img-box">
            <img src="/empsignup.png" alt="" />
          </div>
        </div>
      </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js"></script>
        <script src="https://unpkg.com/split-type@0.3.3/umd/index.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

        <script>
	$(function() {
		$( "#successMsg" ).alert();
	});
  setTimeout(function () {
  $('#successMsg').alert('close');
}, 5000);
</script>

<script>
	$(function() {
		$( "#failedMsg" ).alert();
	});
  setTimeout(function () {
  $('#failedMsg').alert('close');
}, 5000);
</script>

        <script>
    const headLine = new SplitType('h1')
        const myText2 = new SplitType('.p1', {charClass:'char2'})
        var tl = gsap.timeline({defaults: {ease: "Expo.easeInOut"}})
        tl.from('.char', {
            y: -100,
            stagger: 0.05,
            delay: 2
        })
        .from('.char2', {
            y: -100,
            stagger: 0.05,
            duration: .6
        }, "-=1.2")
        .to('h1,.p1', {
            y: -150,
            delay: 1,
            duration: 1.4
        })
  
        window.addEventListener("load",function(){
            setTimeout(
                function open(event){
                    document.querySelectorAll("section").style.display="block";
                },5000
            )
        });
         // Toggle Form
const container = document.querySelector(".container");
const inputs = document.querySelectorAll(".form-box input[type = 'password']");
const hide = [...document.querySelectorAll(".hide")];
const spans = [...document.querySelectorAll(".form-box .top span")];
const section = document.querySelector("section");
const owl = document.querySelector(".owl");
spans.map((span) => {
  span.addEventListener("click", (e) => {
    container.classList.toggle("active");
    section.classList.toggle("active");
    owl.classList.toggle("active");
  });
});
Array.from(inputs).map((input) => {
  hide.map((icon) => {
    icon.innerHTML = `<img src="/eye.svg" alt="" />`;
    icon.addEventListener("click", () => {
      const type = input.getAttribute("type");
      if (type === "password") {
          input.setAttribute("type", "text");
          icon.innerHTML = `<img src="/hide.svg" alt="" />`;
      } else if (type === "text") {
        input.setAttribute("type", "password");
        icon.innerHTML = `<img src="/eye.svg" alt="" />`;
      }
    });
  });
});
            </script>

    </body>
        </html>