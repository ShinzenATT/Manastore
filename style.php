<?php 
header("Content-type: text/css"); //makes this file act as a .css file
   session_start();
    require 'phpLibrary/Color.php'; // A library for changing colors

    $dbc = mysqli_connect("localhost","root","","manastore");
    // checks if there is a color variable
    if(isset($_SESSION['color'])){
        $temp = $_SESSION['color'];
        $color = new Color($temp);
    }
    else{
        $color = new Color('#6928BA');
    }
    $hsl = $color->getHSL();

?>

*,
*:after,
*:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    
}


body {
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    background-color: #1E1939;
    transition: 0.6s ease;
}

h1, h2, h3, label {
    font-family:'Ubuntu', sans-serif;
}

h4, h5, p {
    font-family: 'Raleway', sans-serif;
}


header{

    height: 68px;
    position: fixed;
    width: 100%;
    background: hsla(<?php echo $hsl['H'] . ",65%, 44%,0.97" ?>);
    top: 0;
    z-index: 50;
    left: 0;
    border-radius: 0 0 15px 15px;
}

header {
    text-align: center;
    margin: auto;
    overflow: hidden;
}

img {
    margin: auto;

}
 /* navbar */
header div a img {
    height: 4em;
    margin-top: 0.2em;
}

#navContainer {
    margin: auto;
    width: 70%;
    display: flex;
    justify-content: space-between;
    overflow: hidden;
    
}

a  {
    margin: 0;
    padding: 0;
    color: #fff;
    text-decoration: none;
    overflow: hidden;
    transition: 0.6s ease;
   
}

#navContainer div {
    display: flex;
    justify-content: space-between;
}
nav {
    padding-left: 10px;
    padding-right: 10px;
    font-family: 'Raleway bold', sans-serif;
    z-index: 1;
    
}
#navContainer a:hover:not(#cartCount) {
    background-color: #ffffffaa;
    color: hsl(<?php echo $hsl['H'] . ", 85%, 34%"; ?>);
    
}



 /*
material icon font
*/
nav i , .material {
    font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 2em;  /* Preferred icon size */
  display: inline-block;
  line-height: 1;
  text-transform: none;
  letter-spacing: normal;
  word-wrap: normal;
  white-space: nowrap;
  direction: ltr;
  text-align: center;
    margin-top: 0.6em;
    
    

  /* Support for all WebKit browsers. */
  -webkit-font-smoothing: antialiased;
  /* Support for Safari and Chrome. */
  text-rendering: optimizeLegibility;

  /* Support for Firefox. */
  -moz-osx-font-smoothing: grayscale;

  /* Support for IE. */
  font-feature-settings: 'liga'; 
}
 /* Cart icon in navbar */
#cartCount {
    background: hsl(<?php echo $hsl['H'] . ", 60%, 63%" ?>);
    border-radius: 100%;
    height: 20px;
    width: 20px;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: space-around;
    position: relative;
    display: inline-block;
    z-index: 2;
    top: 12px;
    right: -17px;
}

#cartCount p {
    position: relative;
    font-size: 0.9em;
    text-align: center;
    left: 18%;
    top: -6%;
}

#cart {
    position: relative;
    top: -19px;
}

/* hidden search bar */

#navSearch form .material {
    font-size: 1em;
    margin: 0;
    border-radius: 0 15px 15px 0
}

#navSearch form {
    display: flex;
    align-items: center;
    justify-content: space-around;
    position: relative;
    margin-top: 17px;
    width: 5vw;
}

#navSearch form input {
    margin: 0;
    height: 30px;
    border-radius: 15px 0 0 15px;
    position: relative;
    width: 30vw;
}

 #navSearch {
    display: flex;
    align-items: center;
    align-content: center;
    position: relative;
     transition: opacity 1s;
     right: 60px;
}

#accountMenu {
    width: 26vw;
    height: 12vw;
    box-sizing: border-box;
    background-color: #fffe;
    position: fixed;
    right: 15%;
    top: 68px;
    z-index: 49;
    padding: 1vw;
    border-radius: 10px;
}

#accountMenuContent {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#accountMenuContent div {
    display: inline-block;
}

#accountMenuContent div button{
    border: none;
    width: 100%;
    box-sizing: border-box;
    padding: 0.2vw;
    margin-top: 1px;
    border-radius: 20px;
    transition: 0.3s ease;
}

#accountMenuContent div h3, #accountMenuContent div h4{
    margin: 0.7vw;
}

#accountMenuContent div button:hover {
    background-color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    color: white;
}

#accountMenu img {
    width: 10vw;
    height: 10vw;
    
}

.pfp{
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 10vw;
    min-width: 1vw;
    min-height: 1vw;
    display: inline-block;
    margin: 0;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
    border: none;
}

/* Modal Content/Box */
.modal-content {
  background-color: #9B69D9;
  margin: 5px auto; /* 15% from the top and centered */
  border: none;
  width: 80%; /* Could be more or less, depending on screen size */
  max-width: 500px;
    z-index: 10;
    border-radius: 10px;
}

/* The Close Button */
.close {
  /* Position it in the top right corner outside of the modal */
  position: absolute;
  right: 25px;
  top: 0; 
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Bordered form */
#id01 form {
  border: none;
    color: #fff;
}

/* Full-width inputs */
 .container input[type=email], .container input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #2B2642;
  box-sizing: border-box;
     border-radius: 20px;
     background-color: #44405E;
     color: #fff;
}

/* Set a style for all buttons */
.container div button {
  background-color: #605B7C;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 48%;
    display: inline-block;
    border-radius: 12px;
    transition: 0.6s ease;
}

/* Add a hover effect for buttons */
.container div button:hover {
  opacity: 0.7;
}

.container div {
    display: flex;
    justify-content: space-between;
    align-content: center;
}

/* Extra style for the cancel button (red) */
#cancelbtn {
  width: 100%;
  padding: 10px 18px;
    border: none;
    color: #f44336;
    background-color: #605B7C;
    border-radius: 12px;
    transition: 0.6s ease;
}

#cancelbtn:hover {
    color: white;
    background-color: #f44336;
}

#close {
    background-color: #BC97EA;
}

/* Add padding to containers */
.container {
  padding: 16px;
    
    border-radius: 10px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  #cancelbtn {
    width: 100%;
  }
}

/* Slideshow container */
.slideshow-container {
  width: 100%;
  position: relative;
  margin: auto;
    box-sizing: border-box;
    margin-bottom: 0;
    border-color: #00000000;
    overflow:hidden;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

.mySlides img {
    height: 55vh;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-origin: border-box;
    z-index: -2;
    width: 100%;
    position: relative;
}

.mySlides img::before {
    background-image: url(https://png.pngtree.com/element_pic/16/12/25/abfda2d1b6f786267d65b1034c44c9c5.jpg);
    background-position: center;
    background-size: contain;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 4vh;
  width: auto;
  margin-top: -22px;
  padding: 25.4vh 7vw;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
    color: #fff;
    background-color: #0003;

    
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
    box-shadow: -0.2vw 0 7px #0003;
}

.next:hover {
    box-shadow: -1vw 0 5px #fff5;
}

.prev {
    left: 0;
    box-shadow: 0.2vw 0 5px #0003;
}

.prev:hover {
    box-shadow: 1vw 0 7px #fff5;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover{
  background-color: #fff5;
  color: <?php echo "hsl(" . $hsl['H'] . ", 65%, 44%)"; ?>;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  text-align: left;
    left: 15vw;
    width: 40vw;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 10px;
  width: 10px;
  margin: 0 2px;
  background-color: #eee;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.3s ease;
    border: 1px solid #000000aa;
    opacity: 20%;
}

#dotContainer {
    position: absolute;
    margin: auto;
    top: 52vh;
    right: 16vw;
    
}

.active, .dot:hover {
  background-color: hsl(<?php echo $hsl['H'] . ", 55%, 53%"; ?>);
}
.highlightButton {
    display: inline-block;
    width: 10vw;
    position: absolute;
    top: 45.7vh;
    right: 20vw;
    background: hsla(<?php echo $hsl['H'] . ", 65%, 44%, 0.9"; ?>);
    border-radius: 20px;
    display:flex;
    justify-content: center;
    align-items: center;
    height: 3vw;
    font-size: 1vw;
    border: 2px solid hsl(<?php echo $hsl['H'] . ", 85%, 34%"; ?>);
    transition: 0.6s ease;
}

.highlightButton:hover {
    font-size: 1.2vw;
    background-color: #fffd;
    color: hsl(<?php echo $hsl['H'] . ", 85%, 34%"; ?>);
    
}

.highlightButton h3 {
    padding: 0;
    margin: 0;
}

#shadow {
    background-color: #0000;
    height: 20vh;
    width: 100%;
    box-shadow: 0 -11vh 50px #0009;
    z-index: -1;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 55vh;
    left: 0;
}

/* Fading animation 
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
*/


#Discover {
    width: 70vw;
    margin: auto;
    background-color: #2B2642;
    margin-top: 1vh;
    border-radius: 10px;
    color: #fff;
    padding-top: 1px;
   
}

.productContainer {
     display: flex;
    justify-content: space-between;
    align-content: center;
    flex-wrap: wrap;
}

#Discover h2 {
    margin: 0.7vw;
    margin-left: 1vw;
    width: 100%;
}

.product{
    width: 9vw;
    min-width: 180px;
    margin: 0.5vw;
    background-color: #44405E;
    border-radius: 10px;
    color: #fff;
    border: 1px solid hsl( <?php echo $hsl["H"] . ", 60%, 63%"; ?>);
    display: inline-block;
}

.product h3 {
    margin: 5px;
    margin-top: 0;
    color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
}

.productTitle {
    font-size: 0.8em;
    height: 3em;
    font-size-adjust: auto;
}

.product img{
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 13vh;
    border-radius: 10px 10px 0 0;
    border-color: none;
    margin: 0;
    border: 1px solid hsl( <?php echo $hsl["H"] . ", 60%, 63%"; ?>);
}

.platformsA {
    display: flex;
    overflow: hidden;
    align-items: center;
    justify-content: flex-start;
    cursor: all-scroll;
    margin-bottom: 5px;
    
}

.platformsA::-webkit-scrollbar {
    height: 10px;
}

.platformsA::-webkit-scrollbar-thumb{
    background-color: hsl(<?php echo $hsl['H'] . ", 60%, 63%" ?>);
    border-radius: 7px;
}

.platformsA::-webkit-scrollbar-track-piece {
    background-color: #605B7C;
    height: 5px;
    border-radius: 30px;
}

.platformsA span {
    display: flex;
    border-radius: 10px;
    background-color: #605B7C;
    margin-left: 3px;
}

#platformHighlight {
    background-color: hsl(<?php echo $hsl['H'] . ",66%, 75%" ?>);
    margin: 0;
}



.platformsA img {
    height: 2vh;
    min-height: 10px;
    width: auto;
    margin: 0;
    margin: 0.5vh;
    border-radius: 0;
    border: 0 none;
    
}

.platformsA:hover {
    overflow-x: auto;
    margin-bottom: 0;
}

.pricePreview{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: hsl( <?php echo $hsl["H"] . ", 60%, 63%"; ?>);
    border-radius: 0 0 10px 10px;
}

.pricePreview * {
    margin: 5px;
    font-family: 'Ubuntu', sans-serif;
}

.pricePreview p {
    font-size: 0.9em;
    margin-top: 0;
    display: inline;
    margin: 20px 8px;
    font-weight: 600;
}

.pricePreview span span:not(.highlightPrice) {
    border-radius: 10px 0 0 10px;
    background-color: #605B7C;
    padding-right: 0;
    margin-right: 8px;
    position: relative;
    z-index: 1;
    margin-right: 0;
    text-align: center;
}

.highlightPrice {
    background-color: hsl(<?php echo $hsl['H'] . ",66%, 75%" ?>) ;
    border:  1px solid hsl(<?php echo $hsl['H'] . ",66%, 75%" ?>);
    border-radius: 0 10px 10px 0;
    margin: 0;
    transition: 0.6s ease;
    z-index: 2;
    margin-left: 0;
    text-align: center;
}

.product:hover  .pricePreview .highlightPrice {
    background-color: #fff;
    color: hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
    border:  1px solid hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
}

.saleA {
    background-color: #fff;
    border:  1px solid hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
    color: hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
    border-radius: 10px;
    padding: 2px 5px;
    margin-right: 0;
    
    
}

#menu1 {
    position: fixed;
    background-color: #2B2642;
    padding: 1vw;
    display: inline-block;
    bottom: 1vw;
    left: 0.5vw;
    color: white;
}

#register {
    width: 70vw;
    background-color: #2B2642;
    top: 100px;
    margin: auto;
    position: relative;
}

#error {
    width: 100%;
    color: #fff;
    background-color: red;
    padding: 0.2vw;
}

#userFeed {
    background-color: #2B2642;
    padding-bottom: 1vh;
    top: 100px;
    margin: auto;
    position: relative;
    width: 70vw;
    box-sizing: border-box;
    color: #fff;
    border-radius: 10px;
}

#userInfo {
    background-color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    padding: 1vw;
    box-sizing: border-box;
    display: flex;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 1vw;
    border-radius: 10px;
    flex-wrap: nowrap;
}

#userInfo .pfp {
    width: 15vw;
    height: 15vw;
}

#userInfo div {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 75%;
    font-size: 1.4em;
}

#userInfo div span form button{
    border: none;
    width: 9vw;
    box-sizing: border-box;
    padding: 0.2vw;
    margin-top: 1px;
    border-radius: 20px;
    border: 1px #fff0 solid;
    transition: 0.3s ease;
    
}

#userInfo div span form button:hover {
    background-color: hsl(<?php echo $hsl['H'] . ", 65%, 44%"; ?>);
    color: white;
    border: 1px #fff solid;
}

.profileEdit input, .profileEdit button{
    margin: 0.2vw;
    width: 12vw;
    border-radius: 15px;
    display: inline;
}


.profileEdit {
    padding: 0.5vw;
    
}

.profileEdit, .profileEdit .adress{
    display: inline-block;
}

.adress {
    background-color: #44405E;
    border-radius: 20px;
    padding: 0.5vw;
    padding-top: 0;
}

.adress h5 {
    display: inline;
}