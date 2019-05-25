<?php
    require_once("connect.php");
    $cart = array();
    $type = array();
    
     if(isset($_POST['clear']) && $_POST['clear']){
        unset($_SESSION['cart']);
        unset($_SESSION['cartType']);
    }

    if(isset($_SESSION['cart'])){
        $cart = json_decode($_SESSION['cart'], true);
    }

    if(isset($_SESSION['cartType'])){
        $type = json_decode($_SESSION['cartType'], true);
    }

    if(isset($_POST['delete'])){
        array_splice($cart, $_POST['delete'], 1);
        array_splice($type, $_POST['delete'], 1);
    }
    
    
    if(isset($_POST['digital'])){
        array_push($cart, $_POST['digital']);
        array_push($type, false);
        unset($_POST['digital']);
    }
    if(isset($_POST['physical'])){
        array_push($cart, $_POST['physical']);
        array_push($type, true);
        unset($_POST['physical']);
    }

    $_SESSION['cart'] = json_encode($cart);
    $_SESSION['cartType'] = json_encode($type);
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Kundvagn</title>
    <?php require('navbar.php'); ?>
</head>
<body>
   <div id="userFeed">
      <form action="" method="post" id="cartActions">
          <button name="clear" value="true">Rensa</button>
          <a 
          <?php if(isset($_SESSION['user'])){ ?>
          href="checkout.php"
          <?php } 
             else{?>
                onclick="modal()"
            <?php } ?>
          ><button type="button">Mot checkout</button></a>
      </form>
       <?php
       $total = 0;
       for($i = 0; $i < count($cart); $i++){
           $product = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM product WHERE id = " . $cart[$i] . " ;")); 
            $sale = 1;
            if($saleCheck = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM sale WHERE product = ". $product['id'] .";"))){
                
                $sale = (100 - $saleCheck['discount'])/100;
            }
       ?>
           
           <div class="cartProduct">
               <img style="background-image: url(<?php 
                $identifier = $product['identifier'];
                $filePath = "content/products/$identifier/preview.jpg";
                if(file_exists($filePath)){
                    echo $filePath;
                }
                else{
                    echo "img/error.png";
                }
                ?>)">
                <div>
                <h2><?php echo $product['name']; ?></h2>
                <span>
               <?php
                if(isset($type[$i]) && $type[$i]){?>
                    <p>Fysisk version</p>
                <?php }
                else if(isset($type[$i]) && !$type[$i]){?>
                    <p>Digital version</p>
               <?php }
               ?>
               
              
                      
                       <div class="priceO">
                       <p <?php
                        if(isset($saleCheck['discount'])){
                            echo 'class="saleText"';
                        }
                      ?> > <?php
                       if(isset($type[$i]) && $type[$i]){
                           echo (int)($product['physicalPrice'] * $sale);
                           $total += (int)($product['physicalPrice'] * $sale);
                       }
                    else{
                        echo (int) ($product['digitalPrice'] * $sale);
                        $total += (int) ($product['digitalPrice'] * $sale);
                    }
                ?>kr   </p>
                </div>
                <form method="post" action="">
                    <button name="delete" value="<?php echo $i; ?>"><i class="material-icons">
delete
                        </i></button>
                </form>
                </span>
               </div>
               
           </div>
           
      <?php }
       
       if(count($cart) == 0){ ?>
           <h3>Kundvagnen är tom</h3>
      <?php }
       ?>
       
       <div class="cartProduct">
         <div>
          <h3>Total Kostnad:</h3>
           <h3><?php echo $total . "kr"; ?></h3>
           </div>
       </div>
       
   </div>
    
</body>
</html>