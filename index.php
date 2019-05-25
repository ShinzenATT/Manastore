
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <title>Mana Store Startpage</title>
    <?php
    require("navbar.php");
?>
</head>

<body>

    <!-- Slideshow container -->
    <div class="slideshow-container" onload="currentSlide(1);">

        <!-- Full-width images with number and caption text -->

        <?php 
            $query = "SELECT * FROM highlights ORDER BY id DESC;";
            $result = mysqli_query($dbc, $query);
            $first = true;
            while($highlight = mysqli_fetch_array($result)){
            ?>
        <a href="
            <?php switch($highlight['type']){
                case "link":
                    echo $highlight['target'];
                    break;
                case "product":
                    echo "#";
                    break;
                case "blog":
                    echo "#";
                    break;
            }    
            ?>
            ">
            <div class="mySlides fade" style="
               <?php if($first){
                $first = false; ?>
               display:block; 
               <?php } ?>
               ">
                <img src="" style="background-image: url(
                <?php 
                $identifier = $highlight['identifier'];
                $target_file = "content/highlights/$identifier.jpg";
                $imgCheck = file_exists($target_file);
                if($imgCheck){
                echo $target_file;
                }
                else {
                    echo "img/error.png";
                } 
                ?>
                ); background-position: <?php if($imgCheck){
                    echo $highlight['picAdjustment'];
                }
                else{
                    echo "bottom";
                }
                ?>">
                <div class="text">
                    <h3><?php echo $highlight['title']; ?></h3>
                    <p><?php echo $highlight['description']; ?></p>
                </div>
                <!-- Button -->
                <div class="highlightButton">
                    <h3><?php switch($highlight['type']){
                case "link":
                    echo "Go to page";
                    break;
                case "blog":
                    echo "Go to article";
                    break;
                case "product":
                    echo "TBA";
                    break;       
            }
                    ?></h3>
                </div>
            </div>
        </a>
        <?php } ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        <!-- The dots/circles -->
        <div id="dotContainer" style="text-align:center">
            <?php
            $result = mysqli_query($dbc, "SELECT COUNT(id) AS count FROM highlights;");
            $count = mysqli_fetch_array($result);
                for($i= 1 ; $i <= $count['count'] ; $i++){ ?>
            <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
            <?php } ?>
        </div>
        <div id="shadow"></div>
    </div>
    
    <div id="Discover">
      
       <!-- Products -->
        <h2>Nya produkter</h2>
        <div class="productContainer">
        
        <?php
            $query = "SELECT id,name,identifier,digitalPrice,physicalPrice FROM product ORDER BY releaseDate DESC;";
            $result = mysqli_query($dbc, $query);
            
            while($product = mysqli_fetch_array($result)){
                $id = $product['id'];
                for($i = 0;$i<6;$i++){
        ?>
        <a draggable="false" href="<?php echo "product.php?product=" . $product['identifier']; ?>">
            <div class="product"><img style="background-image: url(<?php 
                $identifier = $product['identifier'];
                $filePath = "content/products/$identifier/preview.jpg";
                if(file_exists($filePath)){
                    echo $filePath;
                }
                else{
                    echo "img/error.png";
                }
                ?>)">
                <div class="productTitle">
                    <h3><?php echo $product['name']; ?></h3>
                </div>
                <div class="platformsA">
                   <?php 
                    $platforms = array();
                    $platformQuery = mysqli_query($dbc, "SELECT * FROM platforms WHERE product = $id;");
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
                <div class="pricePreview">
                    <div class="saleA" <?php 
                                            
                                            $saleCheck = mysqli_query($dbc, "SELECT * FROM sale WHERE product = $id;");
                                            $discount;
                                            $precent = 1;
                                           if($sale = mysqli_fetch_array($saleCheck)){
                                               
                                               $discount = $sale['discount'];
                                               $precent = (100 - $discount)/100;
                                               
                                           }
                                            else {
                                                echo 'style="visibility: hidden;"';
                                            }
                                           ?>>
                        <?php
                    if(isset($discount)){
                        echo $discount . '%';
                    }
                else {
                    echo '0%';
                }
                ?>
                    </div> <span><span>
                        <p><?php echo (int)($product['physicalPrice'] * $precent) . 'kr'; ?></p> </span>
                           <!-- <?php echo $product['physicalPrice'] ?> -->
                           <span class="highlightPrice">
                            <p><?php echo (int)($product['digitalPrice'] * $precent) . 'kr'; ?></p>
                            <!-- <?php echo $product['digitalPrice'] ?> -->
                        </span>
                    </span>
                </div>
            </div>
        </a>
        <?php }} ?>
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
