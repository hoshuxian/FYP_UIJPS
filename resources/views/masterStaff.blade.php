<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
}

:root{
    --bck:#222327;
}

body{
    display: fixed;
    justify-content:center;
    align-items:center;
}

.navigation{
    position: relative;
    width: 600px;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
   margin-bottom: 0;
   z-index: 2;
   margin-top: 25%;
   margin-left: -18%;
   transform: rotate(90deg);
   object-fit: cover;
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.5);
    border-top: 1px solid rgba(255,255,255,0.5);
    border-left: 1px solid rgba(255,255,255,0.5);
}

.navigation ul{
    display: flex;
    width: 500px;
}

.navigation ul li{
    position: relative;
    list-style:none;
    width: 100px;
    height: 70px;
    z-index: 1;
}

.navigation ul li a{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 100%;
    text-align: center;
    font-weight: 500;
}

.navigation ul li a .icon{
    position: relative;
    display: block;
    line-height: 75px;
    font-size: 2em;
    text-align:center;
    transition: 0.5s;
    color: var(--bck);
    transform: rotate(270deg);
    padding-top: 9px;
    padding-left: 9px;
}

.navigation ul li.active a .icon{
    transform: translateY(-35px) rotate(270deg);
    color: white;
}

.navigation ul li a .text{
    position: absolute;
    color:var(--bck);
    font-weight: 400;
    font-size: 0.75em;
    letter-spacing: 0.05em;
    transition: 0.5s;
    opacity:0;
    transform: translateY(20px);

}

.navigation ul li.active a .text{
    opacity: 1;
    transform: translateY(10px);
}

.indicator{
    position:absolute;
    top: -50%;
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 6px solid white;
    transition: 0.5s;
    margin-left: 5px;
    z-index: -4;
}

.indicator::before{
    content:"";
    position: absolute;
    top: 50%;
    left: -22px;
    width: 20px;
    height: 20px;
    background:transparent;
    border-top-right-radius: 20px; 
    box-shadow: 0px -10px 0 0 white;
}

.indicator::after{
    content:"";
    position: absolute;
    top: 50%;
    right: -22px;
    width: 20px;
    height: 20px;
    border-top-left-radius: 20px;
    box-shadow: -1px -10px 0 0 white; 
}

.navigation.animate{
    top: -200%;
}

.navigation.sticky{
    top: 0;
    z-index: 99;
}

.navigation ul li:nth-child(1).active ~ .indicator{
    transform: translateX(calc(70px * 0));
    background: #f44336;
}

.navigation ul li:nth-child(2).active ~ .indicator{
    transform: translateX(calc(65px * 1));
    background: #ffa117;
}

.navigation ul li:nth-child(3).active ~ .indicator{
    transform: translateX(calc(68px * 2));
    background: #FDD017;
}

.navigation ul li:nth-child(4).active ~ .indicator{
    transform: translateX(calc(70px * 3));
    background: #0fc70f;
}

.navigation ul li:nth-child(5).active ~ .indicator{
    transform: translateX(calc(69px * 4));
    background: #2196f3;
}

.navigation ul li:nth-child(6).active ~ .indicator{
    transform: translateX(calc(70px * 5));
    background: #4B0082;
}

.navigation ul li:nth-child(7).active ~ .indicator{
    transform: translateX(calc(71px * 6));
    background: #CD66FF;
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
    margin-top: 2.5%;
}

.email{
    object-fit: cover;
    position: absolute;
    margin-left: 82%;
    margin-top:36px;
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
    margin-left:65%;
    text-align: center;
    margin-top: -5%;
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
    fill: white;
}

.sep-foot {
    z-index: 1;
    text-align: center;
    position: relative;
    z-index: -1;
    top: -1px;
}

.content {
    background-position: center;
    background-size: cover;
    transition: 0.5s;
    z-index: -5;
    object-fit: cover;
    min-height: 1000px;
}

header{
position: fixed;
background-color: #000000;
padding:5px;
width:100%;
height:50px;
margin-top:-355px;
}

.left h3 {
color: #fff;
margin-top:6px;
text-transform:uppercase;
font-size:22px;
font-weight:900;
margin-left: 30px;
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
 <div class="navigation" id="navigation">
    <ul>
        <li class="list active">
            <a href="/myprofile" style="--clr:#f44336;">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="text">My Profile</span>  
            </a>
        </li>

        <li class="list">
            <a href="/searchstd" style="--clr:#ffa117;">
                <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                <span class="text">Manage User</span>  
            </a>
        </li>

        <li class="list">
            <a href="/displayeventlist" style="--clr:#FDD017;">
                <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                <span class="text">Manage Event</span>  
            </a>
        </li>

        <li class="list">
            <a href="/displaystdfeedback" style="--clr:#0fc70f;">
                <span class="icon"><ion-icon name="create-outline"></ion-icon></span>
                <span class="text">Manage Feedback</span>  
            </a>
        </li>

        <li class="list">
            <a href="/viewjobpost" style="---clr:#2196f3;">
                <span class="icon"><ion-icon name="push-outline"></span>
                <span class="text">Manage Job Post</span>  
            </a>
        </li>

        <li class="list">
            <a href="/displayblacklist" style="--clr:#4B0082;">
                <span class="icon"><ion-icon name="close-circle-outline"></span>
                <span class="text">Manage Blacklist</span>  
            </a>
        </li>

        <li class="list">
            <a href="{{ url('/logout') }}" style="--clr:#CD66FF;">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="text">Logout</span>
            </a>
        </li>
        <div class="indicator"></div>
    </ul>
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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>

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