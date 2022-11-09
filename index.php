<!DOCTYPE html>
<html class="nice">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Landing Page</title>
	<style>
		
.security
{
 float: left;
 font-size:20px;
 margin-top:60px;
}

.nice
{
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background: #267871;
	overflow: hidden;
}
.hom
{
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  background: #267871;
  overflow: hidden;

}

.cont {
  width: 400px;
  height: 400px;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
.dot {
  position: absolute;
  width: 10px;
  height: 10px;
  background: #fff;
  border-radius: 50px;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

.ring {
  position: absolute;
  width: 200px;
  height: 200px;
  left: 25%;
  top: 25%;
  transform: translate(-50%, -50%);
}
@keyframes inOut-0 {
  0% {
    -webkit-transform: scale(1) rotate(0deg);
    transform: scale(1) rotate(0deg);
  }

  100% {
    -webkit-transform: scale(1) rotate(360deg);
    transform: scale(1) rotate(360deg);
  }
}

@keyframes inOut-1 {
  0% {
    -webkit-transform: scale(0.8571428571) rotate(5deg);
    transform: scale(0.8571428571) rotate(5deg);
  }

  100% {
    -webkit-transform: scale(0.9545454545) rotate(370deg);
    transform: scale(0.9545454545) rotate(370deg);
  }
}
@keyframes inOut-2 {
  0% {
    -webkit-transform: scale(0.7142857143) rotate(10deg);
    transform: scale(0.7142857143) rotate(10deg);
  }

  100% {
    -webkit-transform: scale(0.9090909091) rotate(380deg);
    transform: scale(0.9090909091) rotate(380deg);
  }
}
@keyframes inOut-3 {
  0% {
    -webkit-transform: scale(0.5714285714) rotate(15deg);
    transform: scale(0.5714285714) rotate(15deg);
  }

  100% {
    -webkit-transform: scale(0.8636363636) rotate(390deg);
    transform: scale(0.8636363636) rotate(390deg);
  }
}
@keyframes inOut-4 {
  0% {
    -webkit-transform: scale(0.4285714286) rotate(20deg);
    transform: scale(0.4285714286) rotate(20deg);
  }

  100% {
    -webkit-transform: scale(0.8181818182) rotate(400deg);
    transform: scale(0.8181818182) rotate(400deg);
  }
}
@keyframes inOut-5 {
  0% {
    -webkit-transform: scale(0.2857142857) rotate(25deg);
    transform: scale(0.2857142857) rotate(25deg);
  }

  100% {
    -webkit-transform: scale(0.7727272727) rotate(410deg);
    transform: scale(0.7727272727) rotate(410deg);
  }
}
.header{
	width: 100%;
	height: 120px;
	position: relative;
	background-color: #264645;
	margin-bottom:500px;

}
button{
	float: right;
	margin: 40px 10px 0px 0px;

}
span{
	position: absolute;
	margin: 45px 0px 0px 380px;
    font-size: 30px;
    color: white;
}

@import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200,900');

:root {
  --text-color: hsla(210, 50%, 85%, 1);
  --shadow-color: hsla(210, 40%, 52%, .4);
  --btn-color: hsl(210, 80%, 42%);
  --bg-color: #141218;
}

* {
  box-sizing: border-box;
}

html, body {
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--bg-color);
}

button {
  position:relative;
  padding: 10px 20px;  
  border: none;
  background: none;
  cursor: pointer;
  
  font-family: "Source Code Pro";
  font-weight: 900;
  text-transform: uppercase;
  font-size: 30px;  
  color: var(--text-color);
  
  background-color: var(--btn-color);
  box-shadow: var(--shadow-color) 2px 2px 22px;
  border-radius: 4px; 
  z-index: 0;  
  overflow: hidden;   
}

button:focus {
  outline-color: transparent;
  box-shadow: var(--btn-color) 2px 2px 22px;
}

.right::after, button::after {
  content: var(--content);
  display: block;
  position: absolute;
  white-space: nowrap;
  padding: 40px 40px;
  pointer-events:none;
}

button::after{
  font-weight: 200;
  top: -30px;
  left: -20px;
} 

.right, .left {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
}
.right {
  left: 66%;
}
.left {
  right: 66%;
}
.right::after {
  top: -30px;
  left: calc(-66% - 20px);
  
  background-color: var(--bg-color);
  color:transparent;
  transition: transform .4s ease-out;
  transform: translate(0, -90%) rotate(0deg)
}

button:hover .right::after {
  transform: translate(0, -47%) rotate(0deg)
}

button .right:hover::after {
  transform: translate(0, -50%) rotate(-7deg)
}

button .left:hover ~ .right::after {
  transform: translate(0, -50%) rotate(7deg)
}

/* bubbles */
button::before {
  content: '';
  pointer-events: none;
  opacity: .6;
  background:
    radial-gradient(circle at 20% 35%,  transparent 0,  transparent 2px, var(--text-color) 3px, var(--text-color) 4px, transparent 4px),
    radial-gradient(circle at 75% 44%, transparent 0,  transparent 2px, var(--text-color) 3px, var(--text-color) 4px, transparent 4px),
    radial-gradient(circle at 46% 52%, transparent 0, transparent 4px, var(--text-color) 5px, var(--text-color) 6px, transparent 6px);

  width: 100%;
  height: 300%;
  top: 0;
  left: 0;
  position: absolute;
  animation: bubbles 5s linear infinite both;
}

@keyframes bubbles {
  from {
    transform: translate();
  }
  to {
    transform: translate(0, -66.666%);
  }
}
</style>
</head>
<body class="hom">

<div class="header">
	<img src="Image/logo.png" style=" width: 100px !important;
    height: 100px !important; margin: 13px 0px 0px 24px; float: left;">
    <span>Your security, Our passion.</span>
<button style="--content: 'Login';width:132px;height: 50px;"><a href="login.php">
	
 
  <div class="left"></div>
   
  <div class="right"></div></a>
</button>


   <button style="--content: 'Register';width:180px;height: 50px;"><a href="registration.php">
   	<div class="left"></div>
    <div class="right"></div></a> 
</button>


</div>
<hr style="margin-top: -14px;">


<div class="cont"></div>

<h1 style="text-align:center;margin-top: 305px;position:absolute;">Cyber security</h1>

<script>
	
function circles() {
	let container = document.getElementsByClassName('cont')[0];
	let dot = document.getElementsByClassName('dot');
	const numberOfDots = 12;
	const numberOfRings = 6;
	for (let i = 0; i < numberOfRings; i++) {
		container.innerHTML += '<div class="ring"></div>';
		let ring = document.getElementsByClassName('ring')[i];
		var opacity = i - 1;

		for (let j = 0; j < numberOfDots; j++) {
			let nullbase = j - 1;
			let deg = (nullbase * 30);
			ring.innerHTML += '<div class="dot dot-'+j+'" style="opacity:'+(1 - (opacity / 6))+';"></div>';
			ring.style.cssText = 'animation: inOut-' + i + ' 2s ease-in-out alternate infinite';

		}
	}
	for (let p = 0; p < dot.length; p++) {
		let nullbase = p - 1;
		let angle = 360 / 12;
		let deg = (nullbase * angle);

		dot[p].style.cssText += 'transform: translate3d(0, -100px, 0) rotate(' + deg + 'deg);transform-origin: 0 100px;';
	}

}

//gen keyframes *OPEN CONSOLE*
for (k = 1; k <= 6; k++) {
  let nullbase = k - 1;
  console.log('@keyframes inOut-' + k + '{0%{transform: scale(' + (1 - (nullbase / 7)) + ')rotate(' + (nullbase * 5) + 'deg)}100%{transform: scale(' + (1 - (nullbase / 22)) + ') rotate(' + ((nullbase * 10) + 360) + 'deg)}}');
}

circles()






</script>
</body>
</html>