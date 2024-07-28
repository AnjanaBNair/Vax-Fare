<!DOCTYPE html>
<html lang="en">
 <head>
    <title> VAX-FARE</title>
	<link rel="icon" href="vax.png" />	
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple HTML HomePage</title>

  <style>
@import url("https://fonts.googleapis.com/css2?family=Sriracha&display=swap");

body {
  margin: 0;
  box-sizing: border-box;
}

/* CSS for header */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #0A2558;
  height:75px;
}



.nav-items {
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: #f5f5f5;
  margin-right: 20px;
}

.nav-items a {
  text-decoration: none;
 color: #fff;
 font-size: 20px;
  font-weight: 500;
  padding: 20px 20px;
  background:#0A2558;
}

/* CSS for main element */
.intro {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 520px;
  background:url('home.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

.intro h1 {
  font-family: sans-serif;
  font-size: 60px;
  color: #fff;
  font-weight: bold;
  text-transform: uppercase;
  margin: 0;
}

.intro p {
  font-size: 20px;
  color: #d1d1d1;
  text-transform: uppercase;
  margin: 20px 0;
}

.intro button {
  background-color: #5edaf0;
  color: #000;
  padding: 10px 25px;
  border: none;
  border-radius: 5px;
  font-size: 20px;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
}



.about-me {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 80px;
 background: #0A2558;
 color: white;
 
  font-family: 'Poppins', sans-serif;
  border-top: 2px solid #eeeeee;
}
li{
font-size:17px;
}
.about-me img {
  width: 500px;
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.about-me-text h2 {
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  margin: 0;
}
.logo_name{
  color: #fff;
  font-size: 24px;
  font-weight: 500;
}
.about-me-text p {
  font-size: 15px;
  font-family: 'Poppins', sans-serif;
  color: white;
  margin: 10px 0;
}

/* CSS for footer */
.footer {
	margin-top:30px;
	height:200px;
  display: flex;
   color: #fff;
  justify-content: space-between;
  align-items: center;
   background: #0A2558;
  padding: 40px 80px;
}

.footer .copy {
  color: #fff;
}

.bottom-links {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px 0;
}

.bottom-links .links {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
  
}

.bottom-links .links span {
  font-size: 17px;
  color: #fff;
  text-transform: uppercase;
  margin: 10px 0;
}

.bottom-links .links  {
  text-decoration: none;
  color: #a1a1a1;
  padding: 10px 70px;
}

.header .logo-details{
  height: 30px;
  display: flex;
  align-items: center;
}
.header.logo-details i{
  font-size: 58px;
  font-weight: 500;
  color: #fff;
  min-width: 40px;
  text-align: center
}

.header .logo-details i{
 color: #fff;
  font-size: 24px;
  font-weight: 500;
}


.s1
{
  margin-bottom:0;
  font-family:Times New Roman;
  padding-top:100px;	
}
.column {
	float:left;
  width: 30%;
  margin:20px;
}
.row 
{
margin: 20 20px;
}

.card {
	margin-top:-30px;
	margin-bottom:30px;
  box-shadow: 8px 8px 20px 5px rgba(213, 184, 255);
  padding: 30px;
  text-align: center;
  border-radius:10px;
  font-size:20px;
  color:black;
  background-color: white;
}
.card:hover{
    box-shadow: 8px 8px 8px black;
    transform:scale(1.1);
}
.colour
{
	margin-top:20px;
color:#F8F9F9;
	 border-radius:10px;
	background:#4CBDCF;
}
.step
{
	margin-left:130px;
    color:#F8F9F9;
	width:100px;
	border-radius:10px;
	background:#4CBDCF;
}

.home{
 margin-right:-30px;	
 margin-left:20px;
}
marquee
{
     font-family: 'Courier New', monospace;
	color:red;
	font-size: 20px;
  font-weight: 500;
  
}
</style>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
</head>

<body>

  <header class="header">
   <div class="logo-details">
      &nbsp &nbsp <span class="logo_name"><img src="vax.png" height="50" width="50"/></span>  &nbsp &nbsp &nbsp 
      <i>VaX-FarE</i>
    </div> 
    <nav class="nav-items">
      <a href="reg1.php">Register</a>
      <a href="log1.php">Login</a>
    </nav>
  </header>
  <main>
    <div class="intro">
    </div>
	
    <div>
	
       <div class="s1">
	<div class="row">
 
	 <div class="column">
		<div class="card">
		<div class="step">
		STEP-1
		</div>
		<img src="step1.png" height="200"  width="200"/><br>
		<div class="colour">
		Book<br> an appointment on <br>VaX-FarE<br>
		</div>
		</div>	
    </div>
	
	<div class="column">
		<div class="card">
		<div class="step">
		STEP-2
		</div>
		<img src="step2.png" height="200"  width="200"/><br>
		
		<div class="colour">
		Get your <br>vaccination safetly <br>at the time of your Appointment<br>
		</div>
		</div>	
    </div>
	
	<div class="column">
		<div class="card">
		<div class="step">
		STEP-3
		</div>
		<img src="step3.png" height="200"  width="240"/><br>
		
		<div class="colour">
		Download<br> your vaccination from <br>VaX-FarE and wait for Dose #2<br>
		</div>
		</div>	
    </div>
</div>

</div>
    </div><br>
    <div class="about-me">
      <div class="about-me-text">
        <h2>Tips to follow before vaccination</h2><br>
        <p>Once you have registered yourself and got an appointment for vaccination, here are some simple and valuable tips for you:
<br>
<ul>
<li> Do not take the vaccine on an empty stomach. Eat well before you go for your vaccine dose.</li>
<li>Drink plenty of water and stay hydrated. </li>
<li> Get good, peaceful sleep at night. The role of a good night’s sleep in boosting immunity is scientifically proven.</li>
<li> Avoid excess alcohol intake as it may dehydrate you.</li>
<li>Be prepared to take any vaccine available at the centre at the given time. Remember, all vaccines have been proven safe and effective. </li>
<li>Wear a sleeveless or short-sleeved shirt or dress to facilitate getting the injection on your arm. </li>
<li> Cancel your appointment if you notice any Covid-like symptoms.</li>
</ul>
Carry the ID you used for registration. Visit the centre wearing a double mask and maintain physical distance. Note the type of vaccine you received, as it would serve as a guide to book an appointment for the second dose.</p>
      </div>
      <img src="home.png"  class="home" alt="me">
    </div>
  </main>
  <div><br>
   <marquee scrollamount="12"><b>Book Your Vaccine Now....!!!!</b></marquee>

  </div>
 <div  class="footer">
  <footer>
    <div class="bottom-links">
      <div class="links">
        <span>Vaccination Services</span><br>
        Register Members<br><br>
		Choose Vaccination Centre<br><br>
		Book Vaccination Slots<br><br>
		Download Certificate<br>
      </div>
	  <div class="links">
        <span>Resources</span><br>
        How to get Vaccinated<br><br>
		Tips consider before Vaccination<br><br>
      </div>
       <div class="links">
        <span>Contact Us</span><br>
        Helpline &nbsp : &nbsp +91-11-23978046 (Toll Free - 1075 )<br><br>
		Mental Health &nbsp : &nbsp 08046110007<br><BR>
        Technical Helpline &nbsp : &nbsp 0120-4783222<br><br><br>
      </div>
    </div>
  </footer>
  </div>
</body>

</html>