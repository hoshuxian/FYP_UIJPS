<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}">
</head>

<style>
   @import url('https://fonts.googleapis.com/css?family=Roboto');
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'); 

body{
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
}

.owl{
  margin-top: -41%;
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
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.5;
}

section .container {
  position: relative;
  width: 900px;
  height: 500px;
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
  top: 55%;
  left: 50%;
  width: 100%;
  max-width: 300px;
  transform: translate(-50%, -50%);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

section form .form-control{
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
  outline: none;
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

section form .form-control {
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

section form .form-control .icon{
  margin-right: 15px;
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
    margin-top: -82%;
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

.input-icons i {
            position: absolute;
  transform: translateY(-50%);
  right: 16rem;
  margin-bottom: 9%;
  margin-top: 6%;
        }
          
        .input-icons {
            width: 100%;
        }
          
        .iconss {
            padding: 10px;
            min-width: 40px;
        }

  .hide{
    width: 10%;
    padding: 10px;
    min-width: 40px;
    position: absolute;
  transform: translateY(-50%);
  left: 16rem;
  cursor: pointer;
  margin-top: -9%;
  }

  section form .form-control input[type="text"] {
  padding-left:20px;
}

section form .form-control input[type="email"] {
  padding-left:20px;
}

section form .form-control input[type="password"] {
  padding-left:20px;
}

section form .form-control input:focus {
  border: 2px solid #005A9C;
}

section form .form-control select:focus {
  border: 2px solid #005A9C;
}

.alert-success{
    width: 65%;
    height: 30px;
    margin-left: 20%;
    background-color: #d4edda;
    border-radius: 5px;
    margin-top: 5px;
    padding-top:6px;
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
    padding-top:6px;
    padding-left: 10px;
    color: #cc0000;
}
    </style>

    <body>
    @if(!empty($successMsg))
                        <div class="alert alert-success" id="successMsg"> {{ $successMsg }}</div>
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
          <img src="/login.png" alt=""/>
          </div>
          <div class="form-box">
            <form action="trylogin" method="post">
            @csrf
              <div class="form-control">
                <h2>Hello Again!</h2>
                <p>Welcome back you've been missed.</p>
                <div class="input-icons"> 
                  <input id="email" placeholder="Email" type="email" name="email" required><i class="fa fa-envelope iconss"></i></input>
                  <input id="password" type="password" placeholder="Password" name="password"required><i class="fa fa-key iconss"></i></input>
                  <div class="icon hide">
                     <img src="/eye.svg" alt=""/>
                  </div>
                  <div>
                  <select id="role" name="role" required>
                    <option value="student">Student</option>
                    <option value="Company">Company</option>
                    <option value="Staff">Staff</option>
                    <option value="Admin">Admin</option>
                    </select>
</div>
                </div>
                <a href="/forgetpassword"><span>Forgot Password?</span></a>
                <input type="Submit" value="Login" id="loginBtn" />
              </div>
            </form>
          </div>
        </div>
</section>

<script>
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


$('input[type="password"]').on('focus', () => {
  $('*').addClass('animate');
}).on('focusout', () => {
  $('*').removeClass('animate');
});
    </script>
</body>
</html>