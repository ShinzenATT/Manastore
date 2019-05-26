<?php 
require_once("connect.php");
if(isset($_GET['product']) && $_GET['product'] != ""){
    $identifier = $_GET['product'];
    $result = mysqli_query($dbc, "SELECT * FROM product WHERE identifier = '$identifier';");
    if(mysqli_num_rows($result) == 1){
        $product = mysqli_fetch_array($result);
        
    }
    else{
       header("location: index.php");
    }
}
else{
   header("location: index.php");
}
$sale = 1;
if($saleCheck = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM sale WHERE product = ". $product['id'] .";"))){
    $sale = (100 - $saleCheck['discount'])/100;
}
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?></title>
    <?php require("navbar.php"); ?>
</head>

<body>
    <!-- Slideshow container -->
    <div class="slideshow-container productSlideshow" onload="currentSlide(1);">

        <!-- Full-width images with number and caption text -->

        <?php 
            $first = true;
            $i = 0;
            $a = 0;
            $exist = true;
            $result =mysqli_query($dbc, "SELECT * FROM ytEmbed WHERE product = " . $product['id'] . " ;");
            while($embed = mysqli_fetch_array($result)){ 
            $a++;
        ?>
        <div class="mySlides fade" style="">

            <iframe src="https://www.youtube-nocookie.com/embed/<?php echo $embed['embedCode']; ?>?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </div>
        <?php }
            while($exist){
                $identifier = $product['identifier'];
                $target_dir = "content/products/$identifier/slide_";
                if(file_exists($target_dir . "$i.jpg")){
                $target_file = $target_dir . "$i.jpg";
                }
                else if(file_exists($target_dir . "$i.png")){
                $target_file = $target_dir . "$i.png";
                }
                
            ?>
        <div class="mySlides fade" style="
               ">
            <img src="" style="background-image: url(
                <?php 
                echo $target_file;
                
                ?>
                ); ">


        </div>
        <?php
                $temp = $i + 1;
            $target_file = $target_dir . $temp;
            $exist = file_exists($target_file . ".png") || file_exists($target_file . ".jpg");  
            $i++; ?>
        <!-- <?php echo "bool: " . $exist . "   " . $target_file ; ?> -->
        <?php }
        $a += $i;
        ?>
        <!-- <?php echo $target_file; ?> ->

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <!-- The dots/circles -->
        <div id="dotContainer" style="">
            <?php
            
                for($j= 1 ; $j <= $a; $j++){ 
            
            ?>
            <span class="dot" onclick="currentSlide(<?php echo $j; ?>)"></span>
            <?php }  ?>
        </div>
        <!-- <?php echo "i =" . $i; ?> -->
        <div id="shadow"></div>
    </div>

    <div id="productOverview">
        <h2><?php echo $product['name']; ?></h2>
        <br>
        <span>
            <h5>Utgivare: </h5>
            <h5><?php echo $product['publisher'] ?></h5>
        </span>
        <span>
            <h5>Utvecklare: </h5>
            <h5><?php echo $product['developer'] ?></h5>
        </span><br>
        <?php 
            $release = date_create($product['releaseDate']);
        ?>
        <span>
            <h5>Utsläppt: </h5>
            <h5><?php echo strftime('%d %B %G', strtotime($product['releaseDate'])); ?></h5>
        </span>
        <span>
            <h5>Medelbetyg: </h5>
            <h5>⭐⭐⭐⭐⭐</h5>
        </span><br>
        <div class="platformsA" id="platformsB">
            <?php 
                    $platforms = array();
                    $platformQuery = mysqli_query($dbc, "SELECT * FROM platforms WHERE product = " .  $product['id'] .";");
                    while($plat = mysqli_fetch_array($platformQuery)){
                        array_push($platforms, $plat['platform']);
                    }
                    
                    ?>
            <span>
                <?php if(in_array("steam", $platforms)) { ?>
                <img src="img/Papirus-Team-Papirus-Apps-Steam.svg" alt="">
                <?php } ?>
                <?php if(in_array("uplay", $platforms)) { ?>
                <img src="img/icons8-uplay-filled.svg" alt="">
                <?php } ?>
                <?php if(in_array("origin", $platforms)) { ?>
                <img src="img/icons8-origin.svg" alt="">
                <?php } ?>
                <span id="platformHighlight">
                    <?php if(in_array("windows", $platforms)) { ?>
                    <img src="img/icons8-windows8.svg" alt="">
                    <?php } ?>
                    <?php if(in_array("mac", $platforms)) { ?>
                    <img src="img/icons8-apple-logo.svg" alt="">
                    <?php } ?>
                    <?php if(in_array("linux", $platforms)) { ?>
                    <img src="img/linux-logo.svg" alt="">
                    <?php } ?>
                </span>
            </span>
            <?php if(in_array("switch", $platforms)) { ?>
            <img src="img/nintendo_switch_red.svg">
            <?php } ?>
            <?php if(in_array("wiiu", $platforms)) { ?>
            <img src="img/icons8-nintendo-wii-u.svg" alt="">
            <?php } ?>
            <span>
                <?php if(in_array("ps3", $platforms)) { ?>
                <img src="img/ps3.png">
                <?php } ?>
                <?php if(in_array("ps4", $platforms)) { ?>
                <img src="img/ps4.png">
                <?php } ?>
                <span id="platformHighlight">
                    <?php if(in_array("ps3", $platforms) || in_array("ps4", $platforms)) { ?>
                    <img src="img/icons8-playstation.svg" alt="">
                    <?php } ?>
                </span>
            </span>
            <span>
                <?php if(in_array("x360", $platforms)) { ?>
                <img src="img/360.png">
                <?php } ?>
                <?php if(in_array("xone", $platforms)) { ?>
                <img src="img/one.png">
                <?php } ?>
                <span id="platformHighlight">
                    <?php if(in_array("x360", $platforms) || in_array("xone", $platforms)) { ?>
                    <img src="img/icons8-xbox.svg" alt="">
                    <?php } ?>
                </span>
            </span>
            <?php if(in_array("3ds", $platforms)) { ?>
            <img src="img/Nintendo-3DS-01%20%5BKonvert%5D.svg" alt="">
            <?php } ?>
        </div>
        <div id="tagContainer">
            <?php
                    $tags = mysqli_query($dbc, "SELECT * FROM tagProduct JOIN tags ON tag = id WHERE product = " . $product['id'] . " ORDER BY name;");
                    while($tag = mysqli_fetch_array($tags)){ ?>
            <a href="">
                <div class="tag">
                    <p><?php echo $tag['name']; ?></p>
                </div>
            </a>
            <?php  }
                    ?>
        </div>
    </div>
    <div id="purchase">
        <form action="cart.php" method="post">
            <?php 
            if(isset($product['digitalPrice'])){ ?>
            <div class="purchase">
                <h2>Köp digital kopia av <?php echo $product['name']; ?></h2>
                <div class="saleA" style="
                       <?php   if(isset($saleCheck['discount'])){
                                
                                    }
                                                else{
                                                   echo "visibility: hidden;";
                                                       
                                                }
                     ?>
                    ">
                    <?php               if(isset($saleCheck['discount'])){
                                                echo $saleCheck['discount'] . '%'; 
                     } ?>
                </div>
                <button name="digital" value="<?php echo $product['id']; ?>" type="submit">
                    <span><span class="pButton2"><span class="pButton1">
                                <p><?php echo  (int)($product['digitalPrice'] * $sale) . "kr"; ?></p>
                            </span><i class="material-icons">
                                add_shopping_cart
                            </i></span></span>
                </button>
            </div>
            <?php }
        if(isset($product['physicalPrice'])){ ?>
            <div class="purchase">
                <h2>Köp fysisk kopia av <?php echo $product['name']; ?></h2>
                <div class="saleA" style="
                       <?php   if(isset($saleCheck['discount'])){
                                
                                    }
                                                else{
                                                   echo "visibility: hidden;";
                                                       
                                                }
                     ?>
                    ">
                    <?php               if(isset($saleCheck['discount'])){
                                                echo $saleCheck['discount'] . '%'; 
                     } ?>
                </div>
                <button name="physical" value="<?php echo $product['id']; ?>">
                    <span><span class="pButton2"><span class="pButton1">
                                <p><?php echo  (int)($product['physicalPrice'] * $sale) . "kr"; ?></p>
                            </span><i class="material-icons">
                                add_shopping_cart
                            </i></span></span> </button>
                <?php } ?>

            </div>
        </form>
    </div>
    <?php 
    $target_file = "content/products/$identifier/description.html";
    if(file_exists($target_file)){ ?>
    <div id="description">
        <span>
            <?php
                    include("$target_file");              
                                  ?>
        </span>
        <div class="expand" onclick="description()">
            <i class="material-icons expandArrow">
                keyboard_arrow_down
            </i>
            <p id="expandButton">Klicka för att expandera</p>
            <i class="material-icons expandArrow">
                keyboard_arrow_down
            </i>
        </div>
    </div>
    <?php } ?>
    <div id="productInfo">
        <?php if(isset($product['ageRating'])){ ?>
        <div class="pInfoPart">
            <img src="<?php
                switch($product['ageRating']){
                    case 1:
                        echo "img/age-3.jpg";
                        break;
                    case 2:
                        echo "img/age-7.jpg";
                        break;
                    case 3:
                        echo "img/age-12.jpg";
                        break;
                    case 4:
                        echo "img/age-16.jpg";
                        break;
                    case 5:
                        echo "img/age-18.jpg";
                        break;
                        
                }
            ?>">
            <?php
        $target_file = "content/products/" . $product['identifier'] . "/violence.txt";
        if(file_exists($target_file)){ ?>
            <p><?php include($target_file); ?></p>
            <?php } ?>
        </div>
        <?php } ?>
        <?php
            $target_file = "content/products/" . $product['identifier'] . "/requirements.html";
            if(file_exists($target_file)){?>
        <div class="pInfoPart">
            <span>
                <p><?php include($target_file); ?></p>
            </span>
        </div>
        <?php }
        ?>
    </div>

    <script>
        function description() {
            var expand = document.getElementById("description");
            var button = document.getElementById('expandButton');
            var arrow = document.getElementsByClassName('expandArrow');
            console.log("expand run");
            if (expand.style.maxHeight == "100%") {
                expand.style.maxHeight = "";
                button.innerHTML = "Klicka för att expandera";
                for (var i = 0; i < arrow.length; i++) {
                    arrow[i].innerHTML = "keyboard_arrow_down";
                }
                console.log("a");
            } else {
                expand.style.maxHeight = "100%";
                console.log("b");
                for (var i = 0; i < arrow.length; i++) {
                    arrow[i].innerHTML = "keyboard_arrow_up";
                }
                button.innerHTML = "Klicka för att minimera";

            }
        }

    </script>

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
