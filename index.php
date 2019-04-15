<?php
    require("navbar.php");
    
    if(isset($_GET['color'])){
        $_SESSION['color'] = $_GET['color'];
    }
    if(isset($_GET['reset'])){
        unset($_GET['reset']);
        unset($_GET['color']);
        unset($_SESSION['color']);
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mana Store Startpage</title>

</head>

<body>

    <!-- Slideshow container -->
    <div class="slideshow-container" onload="currentSlide(1);">

        <!-- Full-width images with number and caption text -->
        <a href="">
            <div class="mySlides fade" style="display:block;">
                <img onload="currentSlide(1)" src="" style="background-image: url(https://images.theabcdn.com/i/28145092.jpg)">
                <div class="text">
                    <h3>Lorem Ipsum</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut beatae eveniet maiores quas vitae rem corporis nemo, quos neque harum.</p>
                </div>
            </div>
        </a>

        <div class="mySlides fade">
            <img src="" style="background-image: url(https://www.nintendo.se/images/gallery/sw_switch_splatoon_2/__gallery/002__OCTO_Expansion/Splatoon2_Octo_ss_vs_00.jpg)">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <img src="" style="background-image: url(https://s3.dexerto.com/thumbnails/_thumbnailLarge/nintendo-switch-super-smash-bros-ultimate-dlc-characters-leaked-surprising-nintendo-direct.jpg)">
            <div class="text">Caption Three</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <!-- Button -->
        <a href="">
            <div id="highlightButton">
                <h3>450kr</h3>
            </div>
        </a>
        <!-- The dots/circles -->
        <div id="dotContainer" style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <div id="shadow"></div>
    </div>
    <div id="menu1">
        <form action="index.php" method="get">
            <input type="color" value="<?php if(isset($_GET['color'])){ echo $_GET['color']; } ?>" name="color">
            <input type="submit" value="Change Color">
            <input type="submit" value="Reset" name="reset">
        </form>
    </div>
    <div id="Discover">
        <div class="product"><img style="background-image: url(https://gematsu.com/wp-content/uploads/2017/08/Yakuza-Kiwami-2-Announce_08-26-17.jpg)">
            <h3>Yakuza Kiwami 2</h3>
            <div class="platformsA horizontalScroll">
               <span>
               
                <img src="img/Papirus-Team-Papirus-Apps-Steam.svg" alt="">
                <img src="img/icons8-uplay-filled.svg" alt="">
                <img src="img/icons8-origin.svg" alt="">
                <span id="platformHighlight">
                <img src="img/icons8-windows8.svg" alt="">
                <img src="img/icons8-apple-logo.svg" alt="">
                <img src="img/linux-logo.svg" alt="">
                </span>
                </span>
                <img src="img/icons8-nintendo-wii-u.svg" alt="">
                <img src="img/icons8-playstation.svg" alt="">
                <img src="img/icons8-xbox.svg" alt="">
                <img src="img/Nintendo-3DS-01%20%5BKonvert%5D.svg" alt="">
                
            </div>
            <div class="pricePreview"><div class="saleA">10%</div> <p>240kr</p></div>
        </div>
    </div>
    <script>
        var slideIndex = 1;
        showSlides(1);


        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";

        }
        
   

    </script>



</body>

</html>
