<?php header("Content-type: text/css");
   
    require 'phpLibrary/Color.php';

    $dbc = mysqli_connect("localhost","root","","manastore");
    if(isset($_SESSION['color'])){
        $temp = $_SESSION['color'];
        $color = new Color("$temp");
    }
    else{
        $color = new Color('#6928BA');
        $hsl = $color->getHSL();
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
}

header,
.blurheader {

    height: 68px;
    position: fixed;
    width: 100%;
    background: hsla(<?php echo $hsl['H'] . ",65%, 44%,0.87" ?>);
    top: 0;
    z-index: 0;
    left: 0;
    border-radius: 0 0 15px 15px;
}

header {
    text-align: center;
    display: none;
    margin: auto;
    overflow: hidden;
}

.blurheader {
    background: transparent;
    overflow: hidden;
    z-index: -1;
    left: 0;
    top: 0;

}

section {
    height: 100%;
    position: relative;
    display: block;
    max-width: 1024px;
    margin: 0 auto;

}

#canvas {
    opacity: 1;
    z-index: -2;
    position: absolute;
    display: block;
    top: 3px;
}

img {
    margin: auto;

}

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
    transition: background 0.5s;
   
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
#navContainer a:hover {
    background-color: #ffffff88;
}

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
    left: 9%;
}

#cart {
    position: relative;
    top: -19px;
}

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

