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
  margin-top: -132.5%;
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
  max-height: 1500px;
  max-width: 1200px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.5;
  margin-left: 10%;
  margin-top: 15%;
  padding-bottom: 10%;
}

section .container {
  position: relative;
  width: 1200px;
  height: 1500px;
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

section form {
  position: absolute;
  top: 54%;
  left: 50%;
  width: 100%;
  max-width: 80%;
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
  margin-bottom: 3%;
  margin-top: -12%;
}

section form .form-control p {
  font-size: 15px;
  margin-bottom: 20px;
}


section form .form-control span {
  font-size: 13px;
  display: block;
  text-align: left;
  margin-bottom: 20px;
}

section form .form-control div {
  position: relative;
}

section form .form-control .icon {
  position: absolute;
  top: 55%;
  transform: translateY(-150%);
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

.input-icons p{
  font-weight: bold;
}

.input-box span{
  float:left;
}

.form-control .p1{
  font-size: 13px;
  margin-bottom: 3%
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
            <img src="/rate.jpg" alt="" />
          </div>
          <div class="form-box">
            <form action='rate' id="studentsignupform"method='post'enctype="multipart/form-data">
              @csrf
              <div class="form-control">
              <h2>Welcome!</h2>
                <p1 class="p1">This form is use to rate students standard through 4 aspects which include: Inter & Intrapersonal skills, Leadership and teamworking skills, future career development, and academic achievement.The result will display on your profile, therefore please answer the questipons honestly and carefully.The rating scale is as a reference only, it does not represent your value. Thank you.</p1>
                <div class="input-icons"> 
                  <h4 style="margin-top: 6%;"> Student Rating Scale Form</h4>

                  <p> Inter & Intrapersonal skills</p>

                  <div class="input-box">
                    <span class="details">What grade did your MUET take? </span>
                    <select id="muet" name="muet" placeholder="- Select -" required>
                    <option value="1">Band 1</option>
                    <option value="2">Band 2</option>
                    <option value="3">Band 3</option>
                    <option value="4">Band 4</option>
                    <option value="5">Band 5</option>
                    <option value="6">Band 6</option>
                    </select>
                  </div>

                  <div class="input-box">
                    <span class="details">How many languages did you know? </span>
                    <input type="text" class="text" placeholder="Exp: 2" name="language" id="language" required></input>
                  </div>

                  <div class="input-box">
                    <span class="details">Please state the language you know</span>
                    <input type="text" class="text" placeholder="Exp: English" name="language_detail" id="language_detail" required></input>
                  </div>

                  <p> Leadership and teamworking skills</p>

                  <div class="input-box">
                    <span class="details">How many leadership position did you take in social/university club?</span>
                    <input type="text" class="text" placeholder="Exp: 1" name="clubposition" id="clubposition" required></input>
                  </div>

                  <div class="input-box">
                    <span class="details">Please state the position and the club that you participated.</span>
                    <input type="text" class="text" placeholder="Exp: Chairman of Chinese Culture Club" name="position_detail" id="position_detail" required></input>
                  </div>

                  <div class="input-box">
                    <span class="details">How many part-time job experience do you have?</span>
                    <input type="text" class="text" placeholder="Exp: 0" name="jobexperience" id="jobexperience" required></input>
                  </div>

                  <div class="input-box">
                    <span class="details">Please state the position and the company name where you do your part-time job.</span>
                    <input type="text" class="text" placeholder="Exp: Sales promoter in Mobilechoice digi store express" name="experience_detail" id="expenerience_detail" required></input>
                  </div>

                  <p> Future Career Development</p>

                  <div class="input-box">
                    <span class="details">How many extra courses or certificate had you take for self-development?</span>
                    <input type="text" class="text" placeholder="Exp: 0" name="extracert" id="extraxert" required></input>
                  </div>

                  <div class="input-box">
                    <span class="details">Please state the course name.</span>
                    <input type="text" class="text" placeholder="Exp: Programming for Everybody (Getting Started with Python)" name="cert_detail" id="cert_detail" required></input>
                  </div>

                  <p> Academic Achievement</p>

                  <div class="input-box">
                    <span class="details">What is your CGPA result?</span>
                    <input type="text" class="text" placeholder="Exp: 3.7" name="cgpa" id="cgpa" required></input>
                  </div>

                </div>
                <input type="Submit" value="Submit" id="submitBtn" />
              </div>
            </form>
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
            stagger: 0.1,
            delay: 2
        })
        .from('.char2', {
            y: -500,
            stagger: 0.05,
            duration: .6
        }, "-=1.2")
        .to('h1,.p1', {
            y: 130,
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