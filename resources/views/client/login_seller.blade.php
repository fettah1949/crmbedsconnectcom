<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Login Bedsconnect</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	
	
	<div class="box">
		
		
		
		<form autocomplete="off" action="{{url('/login_auth_seller')}}" method="POST">
			@csrf
			<h2>Sign in</h2>
			<img class=" rounded-circle logo"  src={{ asset('images/LG.png') }} alt="logo">

			
			
			<div class="inputBox">
				<input type="text" id="email" name="email"  required="required">
				<span>email</span>
				<i></i>
			</div>
			<div class="inputBox">
				<input type="password"  id="password" name="password" required="required">
				<span>Password</span>
				<i></i>
			</div>
			<!--<div class="links">-->
			<!--	<a href="#">Forgot Password ?</a>-->
			<!--	<a href="#">Signup</a>-->
			<!--</div>-->
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*
{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body 
{
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	flex-direction: column;
	background: #23242a;
}
.box 
{
	position: relative;
	width: 380px;
	height: 420px;
	background: #1c1c1c;
	border-radius: 8px;
	overflow: hidden;
}
.box::before 
{
	content: '';
	z-index: 1;
	position: absolute;
	top: -50%;
	left: -50%;
	width: 380px;
	height: 420px;
	transform-origin: bottom right;
	background: linear-gradient(0deg,transparent,#c70158,#c70158);
	animation: animate 6s linear infinite;
}
.box::after 
{
	content: '';
	z-index: 1;
	position: absolute;
	top: -50%;
	left: -50%;
	width: 380px;
	height: 420px;  
	transform-origin: bottom right;
	background: linear-gradient(0deg,transparent,#a9aeb3,#a9aeb3);
	animation: animate 6s linear infinite;
	animation-delay: -3s;
}
@keyframes animate 
{
	0%
	{
		transform: rotate(0deg);
	}
	100%
	{
		transform: rotate(360deg);
	}
}
form 
{
	position: absolute;
	inset: 2px;
	background: #28292d;
	padding: 100px 40px;
	border-radius: 8px;
	z-index: 2;
	display: flex;
	flex-direction: column;
}
h2 
{
	color: #a9aeb3;
	font-weight: 500;
	text-align: center;
	letter-spacing: 0.1em;
}
.inputBox 
{
	position: relative;
	width: 300px;
	margin-top: 35px;
}
.inputBox input 
{
	position: relative;
	width: 100%;
	padding: 20px 10px 10px;
	background: transparent;
	outline: none;
	box-shadow: none;
	border: none;
	color: #23242a;
	font-size: 1em;
	letter-spacing: 0.05em;
	transition: 0.5s;
	z-index: 10;
}
.inputBox span 
{
	position: absolute;
	left: 0;
	padding: 20px 0px 10px;
	pointer-events: none;
	font-size: 1em;
	color: #8f8f8f;
	letter-spacing: 0.05em;
	transition: 0.5s;
}
.inputBox input:valid ~ span,
.inputBox input:focus ~ span 
{
	color: #a9aeb3;
	transform: translateX(0px) translateY(-34px);
	font-size: 0.75em;
}
.inputBox i 
{
	position: absolute;
	left: 0;
	bottom: 0;
	width: 100%;
	height: 2px;
	background: #a9aeb3;
	border-radius: 4px;
	overflow: hidden;
	transition: 0.5s;
	pointer-events: none;
	z-index: 9;
}
.inputBox input:valid ~ i,
.inputBox input:focus ~ i 
{
	height: 44px;
}
.links 
{
	display: flex;
	justify-content: space-between;
}
.links a 
{
	margin: 10px 0;
	font-size: 0.75em;
	color: #8f8f8f;
	text-decoration: beige;
}
.links a:hover, 
.links a:nth-child(2)
{
	color: #c70158;
}
input[type="submit"]
{
	border: none;
	outline: none;
	padding: 11px 25px;
	background: #c70158;
	cursor: pointer;
	border-radius: 4px;
	font-weight: 600;
	width: 100px;
	margin-top: 10px;
}
input[type="submit"]:active 
{
	opacity: 0.8;
}

.logo{
	width: 117px;
    height: 104px;
    position: absolute;
   
	z-index: 12;
    top: 0%;
	left: 125px;


}
/* @media(min-height: 300px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top: 70px;


}
}
@media(max-height: 2500px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top: 80px;


}
}
@media(min-width: 726px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top:277px;


}
}
@media(max-width: 761px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top: 210px;


}
}
@media(min-width: 728px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top:148px;


}
}
@media(min-width: 442px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
	z-index: 12;
    top:677px;


}
}
@media(min-width: 589px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top:445px;


}
}
@media(min-width: 940px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top:164px;


}
}
@media(min-width: 1694px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top:139px;


}
}
@media(min-width: 1803px) {
    .logo{
	width: 157px;
    height: 140px;
    position: absolute;
  
	z-index: 12;
    top:139px;


}
} */
</style>