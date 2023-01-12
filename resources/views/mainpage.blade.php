<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Rancho&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300&family=Rancho&display=swap');

    .left h3 {
color: #000000;
margin:0;
text-transform:uppercase;
font-size:22px;
font-weight:900;
font-family: roboto;
}

.left span{
color: #1DC4E7;
margin: 0 10px;
}

.menu-wrapper{
    max-width:10000px;
    margin: 0;
}

.nav-area{
    left: 0;
    top: 0;
    width: 100%;
    box-sizing: border-box;
    transition: top .6s;
    padding: 5px;
    overflow: hidden;
    position: fixed;
    z-index: 1;
    background-size:cover;
}

.menu-wrapper nav{
    float: right;
    margin-right: 100px;
    margin-top: 20px;
}

.right-nav{
    overflow: hidden;
    list-style: none;
}

.right-nav li{
    display: inline-block;
    float: left;
    margin: 0 20px;
}

.right-nav li a{
    color: #094b65;
    text-decoration: none;
    font-family: roboto;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
}

.banner-area{
    height: 100vh;
    -webkit-background-size: cover;
    background-size: cover;
    background-position: center center;
}
.main-text{
    position: relative;
    background: #ffffff;
}

.nav-area.animate{
    top: -200px;
}

.nav-area.sticky{
    top: 0;
    z-index: 99;
}

button{
    background: #efefef;
    height: 30px;
    width: 60px;
    border-radius: 20px;
    border:0;
    outline: 0;
    cursor: pointer;
    transition: backgrond 0.5s;
}

button span1{
    display: block;
    background: #999;
    height: 26px;
    width: 26px;
    border-radius: 50%;
    margin-left: 1px;
    transition: backgrond 0.5s; margin-left 0.5s:
}

button:hover{
  color:#094b65;
}

.lamp-container{
    position: absolute;
    top:0;
    left: 17%;
    width: 200px;
    object-fit: cover;
}

.lamp{
    width:100%
}

.light{
    position:absolute;
    top: 97%;
    left: 50%;
    transform: translateX(-50%);
    width: 700px;
    margin-left:-10px;
    opacity: 0;
    transition: opacity 0.5s;
}

.active{
    background: green;
}

.active span1 {
    background: #fff;
    margin-left: 24px;
}

.on{
    opacity: 1;
}

section{
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url(bckg.png);
    background-size:cover;
}

section::before{
    content:'';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    background: linear-gradient(to top, #ffffff, transparent);
    z-index: 100;
}

section #trust{
    position: absolute;
    color: #094b65;
    font-size:10vw;
    text-align: center;
    line-height: 0.55em;
    font-family: 'Rancho', cursive;
}

section #text{
    position: absolute;
    color: #094b65;
    text-align: center;
    line-height: 0.55em;
    font-size: 25px;
    Letter-spacing: 2px;
    font-weight: 400;
    margin-top: -3%;
}

section #text span{
    font-size:3vw;
    Letter-spacing: 2px;
    font-weight: 400;
    font-family: 'Rancho', cursive;
}

.laptop{
    height: 700px;
    width: 1000px;
    margin-left: 3%;
    object-fit: cover;
    margin-top: 10%;
}

.plant{
    height: 300px;
    object-fit: cover;
    width: 300px;
    margin-left: 75%;
    margin-top: -15%;
    position: absolute;
}

.coffeecup{
    height: 200px;
    object-fit: cover;
    width: 350px;
    margin-left: 80%;
    margin-top: 40%;
    position: absolute;
}

.eyeglass{
    height: 10%;
    object-fit: cover;
    width: 300px;
    margin-top: 40%;
    margin-left: -80%;
    position: absolute;
}

.magnifier{
    height: 250px;
    width: 250px;
    margin-left: 330px;
    object-fit: cover;
    position: absolute;
    -ms-transform: rotate(-70deg); /* IE 9 */
  transform: rotate(-70deg);
  margin-top: -8%;
}

.background{
    overflow-x: hidden;
    object-fit: cover;
}

body{
    margin: 0;
    padding: 0;
}

.line-container{
    position: fixed;
    top: 0;
    left:10%;
    width:80%;
    height:100%;
    text-align:center;
    overflow:hidden; 
}

svg{
    display: inline-block;
    height:100%;
}

header ul li a:hover,
header ul li a.active{
    background:#ffffff;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    text-decoration:none;
    padding: 5px 15px;
    border-radius:25px;
}

.content{
    transform: translateX(-100px);
    width: 560px;
    height: 280px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.25);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    animation: animate 5s linear infinite;
    object-fit: cover;
    position: absolute;
    margin-top: -40%;
    margin-left: 55%;
}

.content h2{
    font-size: 3em;
    color: #094b65;
    padding: 30px;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    position: relative;
    overflow:hidden;
}

.content p{
    font-size: 1.2em;
    color: #094b65;
    padding-left:30px;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    position: relative;
    overflow:hidden;
    margin-top: -10%;
}

.content2{
    transform: translateX(-100px);
    width: 500px;
    height: 250px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    border-radius: 20px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.25);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
    animation: animate 5s linear infinite;
    object-fit: cover;
    position: absolute;
    margin-top: -40%;
    margin-left: 5%;
}

.content2 h2{
    font-size: 3em;
    color: #094b65;
    padding: 30px;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    position: relative;
    overflow:hidden;
}

.content2 p{
    font-size: 1.2em;
    color: #094b65;
    padding-left:30px;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    position: relative;
    overflow:hidden;
    margin-top: -10%;
}

.carrerfair{
    object-fit: cover;
    position: absolute;
    margin-left: 60%;
    max-width: 600px;
    max-height: 1000px;
    margin-top: 10%;
}

.findjob{
    object-fit: cover;
    position: absolute;
    max-width: 400px;
    margin-top: 10%;
    margin-left: 15%;
}

.find hr{
    margin-top: 8%;
    position: center;
    background-color: #094b65;
}

.career p{
    position: center;
    z-index:-1;
    color:rgb(241,241,241);
    white-space: nowrap;
    font-size: 3rem;
    background-color: white;
    display: grid;
    place-content: center;
    font-family:'Cormorant Garamond', serif;
    overflow:hidden;
}

.career2 p{
    position: center;
    color: #094b65;
    font-size: 2rem;
    place-content: center;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    overflow:hidden;
    margin-top: -6%;
} 

.career2 hr{
    margin-top: -2%;
    position: center;
    background-color: #094b65;
    width: 10%;
}

.career3 hr{
    margin-top: 8%;
    position: center;
    background-color: #094b65;
}

.chat p{
    position: center;
    z-index:-1;
    color:rgb(241,241,241);
    white-space: nowrap;
    font-size: 3rem;
    background-color: white;
    display: grid;
    place-content: center;
    font-family:'Cormorant Garamond', serif;
    overflow:hidden;
}

.chat2 p{
    position: center;
    color: #094b65;
    font-size: 2rem;
    place-content: center;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    overflow:hidden;
    margin-top: -6%;
} 

.chat2 hr{
    margin-top: -2%;
    position: center;
    background-color: #094b65;
    width: 20%;
}

.avatar1 {
    border: 2px solid black;
  border-radius: 50%;
  width: 250px;
  height:250px;
}

.avatar2 {
    border: 2px solid black;
  border-radius: 50%;
  width: 250px;
  height:250px;
  margin-left: 15%;
}

.deco{
    z-index:-1;
    object-fit: cover;
    position: absolute;
    width:85%;
    height:60%;
    margin-left: -18%;
    margin-top: -6%;
    transform: rotate(-10deg);
}

.deco2{
    z-index:-1;
    object-fit: cover;
    position: absolute;
    width:115%;
    height:84%;
    margin-top: -10%;
    margin-left: -3%;
    transform: rotate(-15deg);
}

.deco3{
    z-index:-1;
    object-fit: cover;
    position: absolute;
    width:100%;
    height:65%;
    margin-top:-3%;
}

.deco4{
    z-index:-1;
    object-fit: cover;
    position: absolute;
    width:100%;
    height:65%;
    margin-top:-3%;
}

.chat3{
    position: center;
    margin-left: 24%;
    margin-top: 5%;
}

.chat3 h2{
    font-family:'Cormorant Garamond', serif;
    font-weight: normal;
    font-size: 46px;
    line-height: 0.9;
    color: black;
    margin-top:5%;
}

.chat3 p{
    font-family:'Cormorant Garamond', serif;
    font-weight: normal;
    font-size: 20px;
    line-height: 0.9;
    color: black;
    margin-bottom :15%;
}

.service p{
    position: center;
    z-index:-1;
    color:rgb(241,241,241);
    white-space: nowrap;
    font-size: 3rem;
    background-color: white;
    display: grid;
    place-content: center;
    font-family:'Cormorant Garamond', serif;
    overflow:hidden;
    margin
}

.service2 p{
    position: center;
    color: #094b65;
    font-size: 2rem;
    place-content: center;
    display: grid;
    font-family:'Cormorant Garamond', serif;
    overflow:hidden;
    margin-top: -6%;
} 

.service2 hr{
    margin-top: -2%;
    position: center;
    background-color: #094b65;
    width: 10%;
}

@keyframes animate{
    0%,100%
    {
        transform: translateY(50px);
    }
    50%
    {
        transform: translateY(100%);
    }
}

.fax{
    object-fit: cover;
    position: absolute;
    margin-left: 43%;
    margin-top:36px;
}

.tel{
    object-fit: cover;
    position: absolute;
    padding-left: 20px;
}

.email{
    object-fit: cover;
    position: absolute;
    margin-left: 82%;
    margin-top:36px;
}

a.totop {
    position: absolute;
    left: calc(50% - 15px);
    text-align: center;
    color: #000E13;
    text-decoration: none;
    text-transform: uppercase;
    z-index: 2;
}
.simple {
    opacity: 0;
    transition: opacity 0.6s cubic-bezier(0.82, 0, 0.36, 1);
    opacity: 1;
}
a {
    text-decoration: none;
    color: inherit;
}

.addresses {
    padding-top: 3rem;
}

.row {
    box-sizing: border-box;
    display: flex;
    flex: 0 1 auto;
    flex-direction: row;
    flex-wrap: wrap;
}

.bottom-lg{
    margin-top: 50px;
    margin-bottom: 50px;
}
.socials {
    justify-content: space-between !important;
    padding: 0 1.5rem;
}
.socials .btn-primaire {
    border: navajowhite;
    padding: 0;
}

a .item-hvr .hvr {
    position: absolute;
    top: 20px;
    left: 0;
    color: #999;
    transition: top 1s cubic-bezier(0.82, 0, 0.36, 1);
}

footer .btn-primaire {
    color: #e6dece;
}

.btn-primaire {
    letter-spacing: 1px;
    color: #000E13;
    text-decoration: none;
    padding: 15px 0;
    text-transform: uppercase;
    display: inline-block;
    position: relative;
    font-size: 14px;
    animation: animate 3s linear infinite;
    margin-top:-6%;
    
}
a {
    text-decoration: none;
    color: inherit;
}

.center-xs {
    justify-content: center;
    text-align: center;
}
.row {
    box-sizing: border-box;
    display: flex;
    flex: 0 1 auto;
    flex-direction: row;
    flex-wrap: wrap;
    margin-right: -1rem;
    margin-left: -1rem;
    padding-top: 1px;
}
* {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}

div {
    display: block;
}
style attribute {
    opacity: 1;
    pointer-events: all;
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, -6572, 0, 1);
}
footer {
    background: #094b65;
    color: #e6dece;
    position: relative;
    z-index: 1;
}

footer .text-center {
    order: 2;
    text-align: center;
    margin: 1.5rem 0;
}

footer .text-left {
    text-align: center;
    margin-left: 10%;
}

footer .text-right{
    margin-left:50%;
    text-align: center;
}

.col-xs-12 {
    flex-basis: 100%;
    max-width: 100%;
    box-sizing: border-box;
    flex: 0 0 auto;
    padding-right: 1rem;
    padding-left: 1rem;
}

.end {
    padding-bottom: 20px;
    font-size: 12px;
    text-align: center;
}

.copyright{
    margin: 1.5rem 0;
}

.logo-footer img{
    margin-top: -10px;
    width:150px;
    height: 70px;
}

.container-fluid {
    padding: 0 1rem !important;
    position: relative;
}
.container {
    max-width: 1320px;
    margin: auto;
}
.sep-foot svg {
    width: 100%;
    margin: auto;
    max-width: 1180px;
}
footer svg {
    fill: #ffffff;
}

.sep-foot {
    z-index: 1;
    text-align: center;
    position: relative;
    z-index: -1;
    top: -1px;
}

</style>

<body>
    <header class="nav-area">
        <div class="menu-wrapper">
            <div class="left">
            <h3><img src="/umplogo.png" width="200" height="100">University Malaysia <span> Pahang </span>
            <nav>   
            <ul class="right-nav">
                    <li><a href="/login">Login</a></li>
                    <li><a href="/signup">Sign Up</a></li>
                    <button type ="button" onclick="toggleBtn()" id="btn"><span1></span1></button>
                </ul>
            </nav>
            </h3>
            </div>
        </div>
    </header>


<section>
<img src="/magnifier.png" id="magnifier" class="magnifier">
    <h2 id ="text">We will build your <span> success</span></h2>
    <h2 id= "trust" ><br>Trust Us</br></h2>
    <img src="/laptop.png" id="laptop" class="laptop">
    <img src="/plant.png" id="plant" class="plant">
    <img src="/eyeglass.png" id="eyeglass" class="eyeglass">
    <img src="/coffeecup.png" id="coffeecup" class="coffeecup">
</section>


<div class="background">
    <div class="lamp-container">
        <img src="/lamp.png" class="lamp">
        <img src="/light.png" class="light" id="light">
    </div>
</div>

<div class="service">
    <p>Our Services</p>
</div>

<div class="service2">
    <p>Our Services</p>
    <hr></hr>
</div>

<div class="find">
<img src="/deco4.png" class="deco4" id="deco4"> 
    <img src="/findjob.png" class="findjob" id="findjob">  
    <hr width="1" size="500%"></hr>
    <div class="content">
        <h2> Find Your Internship on UIJPS</h2>
        <p>The widest range of internship opportunities and companies.</p>
    </div>
</div>

<div class="career">
    <p>Career Fair</p>
</div>

<div class="career2">
    <p>Career Fair</p>
    <hr></hr>
</div>

<div class="career3">
    <img src="/carrerfair.png" class="carrerfair" id="carrerfair">   
    <hr width="1" size="500%"></hr>
    <div class="content2">   
        <h2> Latest Career Fair</h2>
        <p>UMP latest career event will be enounce at here.</p>
    </div>
</div>

<div class="chat">
    <p>Contact with Employers</p>
</div>

<div class="chat2">
    <p>Contact with Employers</p>
    <hr></hr>
</div>

<div class="chat3">
    <img src="/deco.png" class="deco" id="deco">   
    <img src="/avatar1.png" class="avatar1" id="avatar1">   
    <img src="/avatar2.png" class="avatar2" id="avatar2">   
    <div class="content3">   
        <h2> Communicate with the top employers</h2>
        <p>UMP latest career event will be enounce at here.</p>
    </div>
</div>


    <footer data-scroll-section>
    <a href="/" class="totop simple" data-scroll-to data-scroll>TOP<br />OF<br />PAGE</a>
	<div class="sep-foot">
		<svg viewBox="0 0 837.6 195">
			<path class="st0" d="M0,0c167.5,0,315.7,75.8,418.8,195C521.9,75.8,670.1,0,837.6,0H0z"/>
		</svg>
	</div>
	<div class="container container-fluid" data-scroll-offset="-100%" data-scroll data-scroll-speed="-1">
                <div class="row bottom-lg addresses">
                    <div class="col-xs-12 col-lg-4 text-left">
                        <p>
                        UMP Pekan<br />Universiti Malaysia Pahang<br />26600 Pekan<br />Pahang, Malaysia<br />
						</p>
                    </div>
                    <div class="col-xs-12 col-lg-4 text-right">
                        <p>
                        UMP Gambang<br />Universiti Malaysia Pahang<br />Lebuhraya Persiaran Tun Khalil Yaakob<br />26300, Kuantan<br />Pahang, Malaysia
						</p>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 text-center">
                        <a href="/contact" class="btn-primaire">
							<span class="item-hvr">
								<span class="nml">CONTACT</span>
								<span class="hvr">CONTACT</span>
                                <br></br>
							</span>
                            <div class="tel">
                                <a>Tel: +609 431 5000</a>
                            </div> 
                            <div class="fax">
                                <a>Fax: +609 431 5555</a>
                            </div> 
                            <div class="email">
                                <a>E-mail: pro@ump.edu.my</a>
                            </div> 
						</a>
                    </div>
                    <br></br>
                <hr>
                <div class="row center-xs bottom-lg socials">
                    <a href="https://www.instagram.com/umpmalaysia/?hl=en" target="_blank" class="btn-primaire">
						<span class="item-hvr">
							<span class="nml">
								INSTAGRAM
							</span>
							<span class="hvr">
								INSTAGRAM
							</span>
						</span>
					</a>
                    <a href="https://www.facebook.com/universiti.malaysia.pahang/" target="_blank" class="btn-primaire">
						<span class="item-hvr">
							<span class="nml">
								FACEBOOK
							</span>
							<span class="hvr">
								FACEBOOK
							</span>
						</span>
					</a>
                    <a href="https://twitter.com/umpmalaysia" target="_blank" class="btn-primaire">
						<span class="item-hvr">
							<span class="nml">
								TWITTER
							</span>
							<span class="hvr">
								TWITTER
							</span>
						</span>
					</a>
                    <a href="https://www.youtube.com/channel/UCpJ5ZWo69R58Z0Ts9nSp4cA" target="_blank" class="btn-primaire">
						<span class="item-hvr">
							<span class="nml">
								YOUTUBE
							</span>
							<span class="hvr">
								YOUTUBE
							</span>
						</span>
					</a>
                </div>
                <hr>
                <div class="row center-xs end">
                    <div class="col-xs-12 col-lg-4 copyright">
                        <p>copyright © 2022 Ho Shu Xian</p>
                    </div>
                    <div class="col-xs-12 col-lg-4 text-center logo-footer">
                    <img src="/umplogo.png" width="200" height="100">
                    </div>
                </div>
            </div>
        </footer>
    </div>

	</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(function(){

        var scroll = $(document).scrollTop();
        var navHeight = $('.nav-area').outerHeight();
        var btn =  document.getElementById("btn");
        var light =  document.getElementById("light");
        var text =  document.getElementById("text");
        var trust =  document.getElementById("trust");
        var eyeglass =  document.getElementById("eyeglass");
        var coffeecup =  document.getElementById("coffeecup");
        var magnifier =  document.getElementById("magnifier");
         
        $(window).scroll(function(){

            var scrolled = $(document).scrollTop();

            if(scrolled > navHeight){
                $('.nav-area').addClass('animate');
            }else{
                $('.nav-area').removeClass('animate');
            }
            if(scrolled > scroll){
                $('.nav-area').removeClass('sticky');
            }else{
                $('.nav-area').addClass('sticky');
            }
            scroll = $(document).scrollTop();
        });

    });

        var btn =  document.getElementById("btn");
        var light =  document.getElementById("light");
        var path = document.querySelector('path');
         var pathLength = path.getTotalLength();
         path.style.strokeDasharray = pathLength + ' ' + pathLength;
        path.style.strokeDashoffset = pathLength;

        
         function toggleBtn(){
            btn.classList.toggle("active");
            light.classList.toggle("on");
         }

         window.addEventListener('scroll', function(){
            var value =  window.scrollY;
            var linePercentage = (document.documentElement.scrollTop + document.body.scrollTop) / (document.documentElement.scrollHeight - document.documentElement.clientHeight);

        var drawLength = (pathLength * linePercentage);

        path.style.strokeDashoffset = pathLength - drawLength;

            text.style.top= 50 + value * -0.5 + '%';
            magnifier.style.top= 350+  value * -1.5 + 'px';
            magnifier.style.right= 420+  value * -2.5 + 'px';
            trust.style.top= 27 + value * -0.27 + '%';
            eyeglass.style.top= value * -1.5 + '%';
            eyeglass.style.left=  1100+ value * -7.5 + 'px';
            coffeecup.style.top=  -5+ value * -1.0 + '%';
           coffeecup.style.right= 20+  value * -20 + 'px';
         });

       
        </script>

    </script>

</body>
</html>