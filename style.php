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

#beta{
    
    margin: 0;
    padding: 0;
    transition: 0.6s ease;
}

#beta div{
    background-color: hsl(<?php echo $hsl['H'] . ", 55%, 53%"; ?>);
    position: fixed;
    bottom: 0%;
    right: 3%;
    padding:  0.5em 1em;
    border-radius: 20px 20px 0  0;
    
}

#beta div h3{
    margin: 0;
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
    transition: 0.6s ease;
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
    margin: auto;
    font-size: 0.7em;
    text-align: center;
    font-weight: 600;
    
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
    margin: auto;
}

#navSearch form input {
    margin: 0;
    height: 30px;
    border-radius: 15px 0 0 15px;
    position: relative;
    width: 30vw;
}

 #navSearch {
    display: inline-block;
     background-color: hsla(<?php echo $hsl['H'] . ", 60%, 63%, 0.85"; ?>);
    align-items: center;
    align-content: center;
    position: fixed;
     transition: opacity 1s;
     right: 20%;
     top: 68px;
     width: 250px;
     padding: 10px;
     border-radius: 20px;
     transition: width 0.6s ease;
}

#navMenu {
    display: none;
    
}


#accountMenu {
    width: 450px;
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
    padding: 3px;
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
    width: 200px;
    height: 200px;;
    
}

.pfp{
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 200px;
    min-width: 180px;
    min-height: 180px;
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
  margin: 15px auto; /* 15% from the top and centered */
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

.mySlides img, .mySlides iframe {
    height: 55vh;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-origin: border-box;
    width: 100%;
    position: relative;
}

.ytp-cued-thumbnail-overlay-image{
    background-attachment: fixed;
}

.mySlides img{
    z-index: -2;
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
    background-color: #0000;

    
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
   /* box-shadow: -0.2vw 0 7px #0003;*/
}

.next:hover {
    box-shadow: -1vw 0 5px #fff5;
}

.prev {
    left: 0;
   /* box-shadow: 0.2vw 0 5px #0003;*/
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
    width: 170px;
    position: absolute;
    top: 82%;
    right: 20vw;
    background: hsla(<?php echo $hsl['H'] . ", 65%, 44%, 0.9"; ?>);
    border-radius: 20px;
    display:flex;
    justify-content: center;
    align-items: center;
    min-height:  50px;
    font-size: 1em;
    border: 2px solid hsl(<?php echo $hsl['H'] . ", 85%, 34%"; ?>);
    transition: 0.6s ease;
}

.highlightButton:hover {
    font-size: 1.2em;
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
    overflow-y: hidden;
    align-items: center;
    justify-content: flex-start;
    cursor: all-scroll;
    margin-bottom: 5px;
    overflow-x: auto;
    scrollbar-width: none;
}

.platformsA:hover{
      scrollbar-color: hsl(<?php echo $hsl['H'] . ", 60%, 63%" ?>) #605B7C;
    scrollbar-width: thin;
}

.platformsA::-webkit-scrollbar{
    height: 0px;
}

.platformsA:hover::-webkit-scrollbar {
    height: 10px;
    margin-top: 1px;
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

.product:hover .platformsA {
    overflow-x: auto;
    /* margin-bottom: 0; */
}

.pricePreview{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: hsl( <?php echo $hsl["H"] . ", 60%, 63%"; ?>);
    border-radius: 0 0 10px 10px;
}

.pricePreview * {
    margin: 4px;
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
    border-radius: 20x;
}

#register input, #register button {
    width: 100%;
    margin: 5px;
    height: 30px;
    border-radius: 20px;
    padding: 2px;
}

#register form {
    width: 45%;
    margin: 25px auto;
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
    font-size: 0.8em;
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
    font-size: 1.2em;
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
    width: 250px;
    height: 25px;
    padding: 2px;
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
    text-align: center;
    margin: 3px;
    margin: auto;
}

.adress button {
    height: 35px;
    width: 200px;
}

.adress h5 {
    display: inline;
}

.productSlideshow #dotContainer {
    text-align:center; 
    left: 16vw; 
    right: auto;
}

#productOverview {
    background-color: #44405Eea;
    color: #fff;
    width: 18vw;
    display: inline-block;
    position: absolute;
    top: 42vh;
    right: 16vw;
    padding: 1vw;
    border-radius: 20px;
}

#productOverview span{
    display: flex;
    justify-content: space-between;
    margin: 0;
    padding: 0;
}

#productOverview span h5 {
    margin: 5px;
    padding: 0;
}

#productOverview h2 {
    color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    margin-bottom: 0.5vh;
}

.tag {
    display: inline-block;
    box-sizing: border-box;
    padding: 0.1vw 0.3vw;
    background-color: hsl(<?php echo $hsl['H'] . ", 66%, 75%" ?>);
    color: hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
    border: 1px hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>) solid;
    border-radius: 10px;
    transition: 0.6s ease;
    max-height: 2.5em;
    overflow-x: auto;
}

.tag:hover {
    background-color: hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
    color: #fff;
    border-color: hsl(<?php echo $hsl['H'] . ", 66%, 75%" ?>);
}

.tag p {
    margin: 0;
}

#purchase {
    position: relative;
    left: 15vw;
    width: 48vw;
}

.purchase {
    background-color: #44405E;
    display:inline-block;
    border-radius: 20px;
    padding: 0.5vw;
    width: 100%;
    color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    margin: 10px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-left: 0;
}

.purchase h2 {
    margin: auto 1vh;
    width: 100%;
}

.pButton1{
    color: #fff;
    font-size: 20px;
    background-color: hsl(<?php echo $hsl['H'] . ", 66%, 75%" ?>);
    border-radius: 20px 0 0 20px;
    padding:0px;
    box-sizing: border-box;
    display: inline-block;
    transition: 0.6s ease;
}

.pButton2 {
    background-color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    border-radius: 20px;
    margin: 0;
    padding: 0px;
    display: inline-block;
    
}

.pButton2 i {
    font-size: 18px;
    margin: 3px 5px 5px 3px;
    color: #fff;
}

.pButton1 p {
    display: inline-block;
    margin: 3px 10px;
}

.purchase:hover button .pButton2 .pButton1 {
    color: hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
}

.purchase button {
    background-color: #0000;
    border: none;
    border-radius: 20px;
}

#description {
    background-color: #44405E;
    position: relative;
    left: 15vw;
    display: inline-block;
    color: white;
    width: 48vw;
    margin 10px;
    box-sizing: border-box;
    border-radius: 20px;
    max-height: 50vh;
    overflow: hidden;
}

#description span {
   display: inline-block;
    margin: 0 0.7vw;
}

.expand {
    width: 100%;
    background-color:  hsla(<?php echo $hsl['H'] . ", 55%, 53%, 0.9" ?>);
    position: absolute;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 20px;
}

#productInfo {
    position: absolute;
    right: 16vw;
    width: 18vw;
    top: 78vh;
    display: flex;
    align-content: space-between;
    flex-wrap: wrap;
}

.pInfoPart {
    background-color: #44405E;
    border-radius: 20px;
    padding: 15px;
    box-sizing: border-box;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
    width: 100%;
    margin-bottom: 1vh;
}

.pInfoPart img {
    height: 120px;
    margin: 0;
}

.pInfoPart span {
    display: block;
    flex-wrap: nowrap;
    margin: 0;
    font-size: 0.9em;
}

.pInfoPart span h2, .pInfoPart span h1 {
    margin: 0;
    font-size: 1.1em;
    color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
}

.cartProduct {
    background-color: #44405E;
    box-sizing: border-box;
    padding: 1vw;
    margin: 1vw;
    border-radius: 20px;
    display: flex;
    justify-content: flex-start;
}

.cartProduct img {
    width: 11vw;
    height: 6vw;
    background-size: cover;
    background-position: center;
    margin: 0;
    border-radius: 20px;
    background-color: red;
    border: none;
}

.cartProduct div:not(.priceO), .cartProduct div span {
    height: 100%;
    display: flex;
    flex-wrap: nowrap;
    margin: 0.5vw;
    align-content: space-between;
    height: 100%;
    justify-content: space-between;
    width: 100%;
}

.cartProduct div span {
    width: 40%;
}

.cartProduct div h2 {
    display: inline-block;
    margin: 0;
    word-wrap: break-word;
    width: 60%;
}

.saleText {
    color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    font-weight: 600;
}

.priceO {
    display: inline-block;
    width: auto;
}

.cartProduct div span form button, #cartActions button {
    border-radius: 20px;
    border: 1px #0000 solid;
    margin: 1em auto;
    margin-bottom: auto;
    transition: 0.6s ease;
}

.cartProduct div span form button:hover, #cartActions button:hover {
    background-color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
    color: #fff;
    border-color: hsl(<?php echo $hsl['H'] . ", 65%, 44%" ?>);
}

#cartActions {
    margin: 1vw;
    
}

#payContainer {
    background-color: #2B2642;
    padding: 1vh;
    top: 100px;
    margin: auto;
    position: relative;
    width: 30vw;
    box-sizing: border-box;
    color: #fff;
    border-radius: 10px;
}

#payContainer button {
    border: none;
    background: #0000;
    width: 100%;
    color: #fff;
}

#payContainer div img {
    height: 50px;
    margin: 10px;
    border-radius: 10px;
}

#payContainer div {
    display: flex;
    justify-content: flex-start;
    margin: auto;
    width: 90%;
    background-color: #44405E;
    border-radius: 20px;
    margin: 10px;
    align-items: center;
}

#payContainer div select {
    width: 100%;
    border-radius: 20px;
    height: 30px;
}

#aboutusContainer{
    background-color: #44405E;
    border-radius: 20px;
    position: absolute;
    top: 10vh;
    padding: 1vw;
    margin: auto;
    text-align: center;
    width: 60%;
    left: 20%;
    color: #fff;
    min-width: 608px;
}

#menu {
    display: none;
}

@media screen and (max-width: 900px){
    #navLeft nav {
        display: none;
    }
    
    #navMenu {
        display: inline-block;
    }
    
    #beta div {
        transform: rotate(-90deg);
        right: -20px;
        bottom: 200px;
        opacity: 0.8;
        z-index: 2;
    }
    
    #accountMenuContent div a button, #accountMenuContent div form button {
        padding: 10px 3px;
    }
    
    #menu {
        background-color: hsla(<?php echo $hsl['H'] . ", 85%, 34%, 0.9"; ?>);
        display: inline-block;
        position: fixed;
        top: 68px;
        width: 100%;
        z-index: 2;
        border-radius: 20px;
        overflow: hidden;
        padding: 0;
    }
    
    #menu nav {
        display: inline-block;
        width: 24.52%;
        box-sizing: border-box;
        text-align: center;
        transition: 0.6s ease;
    }
    
    #menu nav:hover {
        background-color: #fffa;
        color: hsl(<?php echo $hsl['H'] . ", 85%, 34%"; ?>);
    }
    
    .highlightButton {
        top: 62%;
    }
    
    .text {
        width: 65.6%
    }
    
    #shadow {
        box-shadow: 0 -14vh 60px #000b;
    }
    
    #productOverview {
        right: 5%;
        left: 5%;
        margin: auto;
        width: 90%;
        top: -8vh;
        position: relative;
        margin-bottom: 0;
    }
    
    #purchase{
        width: 90%;
        left: 5%;
        margin-top: 0vh;
        top: -6vh;
    }
    
    #description {
        width: 90%;
        left: 5%;
        top: -6vh;
    }
    
    #productInfo {
        position: relative;
        top: 0;
        width: 90%;
        right: 5%;
        left: 5%;
        top: -6vh;
    }
    
    .productSlideshow #shadow {
        top: 55vh;
    }
    
    #userFeed {
        width: 80%;
    }
    
    .cartProduct div{
        flex-wrap: wrap !important;
    }
    
    .cartProduct img {
        height: 12vw;
        width: 17vw
    }
    
    .cartProduct div span {
        width: 100%;
    }
    
    .cartProduct div h2{
        width: 100%;
        font-size: 1.2em;
    }
    
    #userInfo div span {
        display: inline-block;
        width: 100%;
        flex-wrap: nowrap;
        justify-content: center space-between;
    }
    
    #userInfo div span * {
        display: inline-block;
        margin: 10px;
    }
    
    #userInfo div {
        flex-wrap: wrap;
    }
    
    #userInfo div span form button {
        padding: 10px;
        width: auto;
    }
    
    #payContainer {
        width: 75%;
    }
    
    .profileEdit{
        width: 50%;
        box-sizing: border-box;
        padding: 1vw;
    }
    
    .profileEdit input, .profileEdit button {
        width: 100%;
    }
    
    .adress button {
        width: 200px;
    }
    
    .adress{
        margin: 3px;
    }
    
    #register form {
        width: 99%;
    }
    
    #aboutusContainer{
        min-width: 0;
        width: 80%;
        left: 10%;
        right: 10%;
    }
    
    #imgConsole{
        display: none;
    }
    }

@media screen and (max-width: 640px){
    
    #beta{
        font-size: 0.8em;
        border-radius: 10px;
    }
    
    #navContainer{
        width: 90%;
    }
    
    #navSearch{
        width: 100%;
        left: 0;
        top: 0;
        height: 116px;
        border-radius:  0 0 20px 20px;
        margin: auto;
        z-index: 2;
    }
    
    #navSearch form{
        margin-top: 68px;
    }
    
    #navSearch form input[type=search]{
        width: 50vw;
    }
    
    #accountMenu {
        width: 100%;
        right: 0;
    }
    
    #accountMenu img {
        width: 35vw;
        height: 35vw;
    }
    
    #accountMenuContent div a button, #accountMenuContent div form button {
       padding: 10px 3vw;
    }
    
    #menu nav {
        width: 100%;
    }
    
    .highlightButton {
        top: auto;
        bottom: 0;
        right: 0;
        border-radius: 20px 20px 0 0 ;
        width: 100%;
        z-index: 1;
    }
    
    .text {
        top: auto;
        bottom: 50
    }
    #dotContainer{
        top: 70px;
        right: 45%
    }
    
    #shadow {
        top: 50vh
    }
    
    #Discover{
        width: 98%
    }
    
    #userFeed {
        width: 90%;
    }
    
    .cartProduct img {
        height: 19vw;
        width: 27vw;
    }
    
    #userInfo div span *:not(form button) {
        width: 100%;
    }
    
    #userInfo {
        display: flex;
        flex-wrap: wrap;
    }
    
    #userInfo .pfp {
        width: 300px;
        height: 300px;
        margin: auto;
    }
    
    .profileEdit {
        width: 100%;
        margin-bottom: 15px;
    }
    
    .adress {
        width: 48%;
        box-sizing: border-box;
        margin: 1px;
        margin-bottom: 5px;
        font-size: 3vw;
    }
    
    .adress button {
        width: 100%;
    }
    
    #register {
        width: 90%;
    }
    
}