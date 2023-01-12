<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Poppins&display=swap');

:root{
    --bg:#2f323f;
}

body{
    display: fixed;
    justify-content:center;
    align-items:center;
}

.navigation{
    position: fixed;
    width: 75px;
    display: flex;
    justify-content:center;
    align-items: center;
    transition: 0.5s;
    height: 150%;
    padding-bottom: 10%;
    transition-property: left;
    background: #F2F3F4;
    z-index: 4;
    margin-top: -50px;
}

.navigation.active{
    width: 250px;
    height: 105%;
    margin-bottom: -10%;
    background: black;
}

.menuToggle{
    position: absolute;
    top: 0px;
    left:45px;
    width: 50px;
    height: 50px;
    padding-left: 10px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    cursor: pointer;
    background: white;
    border-radius: 50%;
    margin-top: 20px;
}

.navigation .pic img{
    height:150px;
    border-radius: 50%;
    margin-bottom: 10px;
    margin-left: -270px;
    border: 2px solid black;
    object-fit: cover;
    position: absolute;
    width: 150px;
    margin-top: -800%;
    display: flex;
    flex-direction: row;
}

.navigation.active .pic img{
    margin-left: 20%;
    margin-top: -135%;
}

.navigation .logo img {
    height: 150px;
    margin-bottom: 10px;
    margin-left: 250px;
    object-fit: cover;
    position: absolute;
    width: 165px;
    margin-top: -30px;
    display: flex;
    flex-direction: row;
}

.navigation .logo{
    height:40px;
    margin-bottom: 10px;
    margin-left: -270px;
    object-fit: cover;
    position: absolute;
    width: 40px;
    margin-top: -800%;
    display: flex;
    flex-direction: row;
}

.navigation h2{
    margin-bottom: 10px;
    margin-left: -240px;
    position: absolute;
    margin-top: -800%;
    display: flex;
    flex-direction: row;
    color: white;
}

.navigation.active h2{
    margin-left: 2px;
    margin-top: -110%;
}

.menuToggle::before{
    content: '';
    position: absolute;
    width: 30px;
    height: 2px;
    background: black;
    transform: translateY(-8px);
    transition: 0.5s;
}

.navigation.active .menuToggle::before{
    transform: translateY(0) rotate(45deg);
}

.menuToggle::after{
    content: '';
    position: absolute;
    width: 30px;
    height: 2px;
    background: black;
    transform: translateY(8px);
    box-shadow: 0 -8px 0 #333;
    transition: 0.5s;
}

.navigation.active .menuToggle::after{
    transform: translateY(0) rotate(-45deg);
    box-shadow: 0 0 0 #333;
}

.navigation.active .menuToggle{
    left: 220px;
    margin-top: 20px;
}

.navigation.active .content{
    margin-left: 250px;
}

.navigation.active .footer{
    margin-left: 250px;
}

.navigation ul{
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 0;
    margin-top: -400px;
    position: relative;
    z-index: 1;
}

.navigation.active ul{
    margin-top: 400px;
    margin-bottom: 40px;
}

.navigation ul li{
    list-style: none;
    position: relative;
    width: 100%;
    height: 60px;
    border-radius: 12px;
    border: 8px solid transparent;
    transition: 0.5s;
    left: 10px;
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.25);
    margin-top:5px;
}

.navigation ul li.active{
    transform: translateX(30px);
}

.navigation ul li::before{
    content: '';
    position: absolute;
    top:-28px;
    right: -10px;
    width: 20px;
    height: 20px;
    background: transparent;
    border-bottom-right-radius: 20px;
    box-shadow: 6px 5px 0 5px var(--bg);
    transform: scale(0);
    transform-origin: bottom right;
    transition: 0.5s;
}


.navigation ul li::after{
    content: '';
    position: absolute;
    bottom:-28px;
    right: -10px;
    width: 20px;
    height: 20px;
    background: transparent;
    border-top-right-radius: 20px;
    box-shadow: 6px -3px 0 3px var(--bg);
    transform: scale(0);
    transform-origin: bottom right;
    transition: 0.5s;
}

.navigation ul li a{
    position: relative;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 100%;
    text-align: center;
    text-decoration: none;
    z-index: 1000;
}

.navigation ul li a .icon {
    position: relative;
    display: block;
    min-width: 40px;
    height: 40px;
    border-radius: 10px;
    background: transparent;
    font-size: 1.5em;
    line-height: 50px;
    margin-left: 10px;
}

.navigation ul li.active a .icon{
    color: #fff;
    background: var(--clr);
}

.navigation ul li a .icon::before{
    content: '';
    position: absolute;
    top: 12px;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--clr);
    filter: blur(8px);
    opacity: 0;
    transition: 0.5s;
}

.navigation ul li.active a .icon::before{
    opacity: 0.5s;
}

.navigation ul li a .icon::after{
    content: '';
    position: absolute;
    top: 10px;
    left: -66px;
    width: 15px;
    height: 15px;
    background: var(--clr);
    border: 8px solid var(--bg);
    border-radius: 50%;
}

.navigation ul li a .text{
    position: relative;
    padding: 0 15px;
    color: #333;
    display: flex;
    align-items: center;
    height: 60px;
    opacity: 0;
    visibility: hidden;
    transition: 0.5s;
    color: white;
}

.navigation.active ul li a .text{
    opacity: 1;
    visibility: visible;
    color: var(--clr);
}

.navigation.active ul li a .icon{
    color: white;
}

.navigation ul li.active a .text{
    color: #fff;
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
    margin-top: 3%;
}


.email{
    object-fit: cover;
    position: absolute;
    margin-left: 82%;
    margin-top:36px;
}

.contact{
    margin-top: 20%;
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
    margin:0;
    padding: 0;
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-family: 'Poppins',san-serif;
}

user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
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
    z-index: -1;
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
    margin-left:70%;
    text-align: center;
    margin-top: -9%;
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
    fill:white;
}

.sep-foot {
    z-index: 1;
    text-align: center;
    position: relative;
    z-index: 1;
    top: -1px;
}

.content{
margin-left:75px;
background-position: center;
background-size: cover;
transition: 0.5s;
z-index:-5;
object-fit: cover;
min-height: 1000px;
margin-top: 130px;
}

header{
    background-color: #000000;
padding:5px;
width:94.7%;
height:50px;
margin-left: 75px;
}

.left h3 {
color: #fff;
margin-top:6px;
text-transform:uppercase;
font-size:22px;
font-weight:900;
margin-left: 20px;
}

.left span{
color: #1DC4E7;
}
</style>
<body>
<header>
<div class="left">
    <h3>University   Malaysia <span> Pahang</span></h3>
</div>
</header>
<div class="navigation">
    <div class="menuToggle"></div>
    <!--<div class="logo">
        <img src = " {{ URL('/umplogo.png') }} " alt="ump" width="200" height="100"> 
    </div>-->
    @foreach(Session::get('result') as $result)

    <div class="pic">
    <img class="company_logo" src="{{$result->company_logo}}" name="image">
    </div>
    <h2>{{$result->company_name}}</h2>
    
    @endforeach
    
    <ul>
        
        <li class="list active">
            <a href="/showempprofile" style="--clr:#f44336;">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="text"> Company Profile</span>
            </a>
        </li>

        <li class="list">
            <a href="/searchallpost" style="--clr:#ffa117;">
                <span class="icon"><ion-icon name="search-outline"></ion-icon></span>
                <span class="text">Search Job</span>
            </a>
        </li>

        <li class="list">
            <a href="#" style="--clr:#FDD017;">
                <span class="icon"><ion-icon name="chatbubbles-outline"></ion-icon></span>
                <span class="text">Chat Box</span>
            </a>
        </li>

        <li class="list">
            <a href="/filterevent" style="--clr:#0fc70f;">
                <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                <span class="text">Event</span>
            </a>
        </li>

        <li class="list">
            <a href="/searchpost" style="--clr:#2196f3;">
                <span class="icon"><ion-icon name="push-outline"></ion-icon></span>
                <span class="text">Post Job</span>
            </a>
        </li>

        <li class="list">
            <a href="/searchstudent" style="--clr:#4B0082;">
                <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                <span class="text">Students</span>
            </a>
        </li>

        <li class="list">
            <a href="/empfeedback" style="--clr:#b145e9;">
                <span class="icon"><ion-icon name="create-outline"></ion-icon></span>
                <span class="text">Feedback</span>
            </a>
        </li>

        <li class="list">
            <a href="#" style="--clr:#fe98bf;">
                <span class="icon"><ion-icon name="notifications-outline"></ion-icon></span>
                <span class="text">Notification</span>
            </a>
        </li>

        <li class="list">
            <a href="{{ url('/logout') }}" style="--clr:#CD66FF;">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="text">Logout</span>
            </a>
        </li>
</div>

<div class="content">

@yield('content')

<footer data-scroll-section>
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
							<span class="item-hvr contact">
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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script>

   const menuToggle = document.querySelector('.menuToggle');
   const navigation = document.querySelector('.navigation');

   menuToggle.onclick = function(){
    navigation.classList.toggle('active');
   }

   const list =  document.querySelectorAll('.list');
   function activeLink(){
    list.forEach((item)=>
    item.classList.remove('active'));
    this.classList.add('active');
   }
   list.forEach((item)=>
   item.addEventListener('mouseover',activeLink));

</script>
</body>
</html>