<?php 
header("Content-type: text/css"); //makes this file act as a .css file
   session_start();
    require 'phpLibrary/Color.php'; // A library for changing colors

    $dbc = mysqli_connect("localhost","root","","manastore");
    // checks if there is a color variable
    if(isset($_SESSION['color'])){
        $temp = $_SESSION['color'];
        $color = new Color("$temp");
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

h1, h2, h3 {
    font-family:'Ubuntu', sans-serif;
}

h4, h5, p {
    font-family: 'Raleway', sans-serif;
}

/* for blur effect in the navbar */
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
#highlightButton {
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

#highlightButton:hover {
    font-size: 1.2vw;
    background-color: #fffd;
    color: hsl(<?php echo $hsl['H'] . ", 85%, 34%"; ?>);
    
}

#highlightButton h3 {
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

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
/*
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
    height: 100vh;
    background-color: #2B2642;
    margin-top: 1vh;
}

.product{
    max-width: 10vw;
    min-width: 180px;
    margin: 1vw;
    background-color: #44405E;
    border-radius: 10px;
    color: #fff;
}

.product h3 {
    margin: 5px;
    margin-top: 0;
    color: hsl(<?php echo $hsl['H'] . ", 60%, 63%"; ?>);
}

.product img{
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 13vh;
    border-radius: 10px 10px 0 0;
    border-color: none;
    margin: 0;
}

.platformsA {
    display: flex;
    overflow: hidden;
    align-items: center;
    justify-content: flex-start;
    cursor: all-scroll;
    margin-bottom: 5px;
}

.platformsA span {
    display: flex;
    border-radius: 10px;
    background-color: #605B7C;
}

#platformHighlight {
    background-color: hsl(<?php echo $hsl['H'] . ",66%, 75%" ?>);
    margin: 0;
}

.platformsA img {
    height: 2.5vh;
    min-height: 10px;
    width: auto;
    margin: 0;
    margin: 0.5vh;
    border-radius: 0;
    
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