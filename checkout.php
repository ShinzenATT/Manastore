<?php
    $pay = false;
    if(isset($_GET['pay'])){
        $pay = $_GET['pay'];
    }
    require_once("connect.php");
    
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <title>Betalning</title>
    <?php
    if(!$pay){
    require("navbar.php"); 
    }
    if($pay){
        $_SESSION['payed'] = true;
        if(isset($_POST['adress'])){
            if($_POST['adress'] == '!add!'){
                header('location: profile.php?action=edit');
            }
            $_SESSION['adress'] = $_POST['adress'];
        }
?>
   
    <script>
        
        var load = document.getElementById('redirect');
        
        
            function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        
       window.onload = async function redirect() {
            var r = document.getElementById('redirect');
            console.log("sleeping...")
            await sleep(800);
            r.style.display = 'block';
            console.log("redirect attempt");
            location.href = 'checkout.php';
        }

        

    </script>
    <?php } ?>
</head>

<body>
    <?php
    if($pay){
        ?>
    <p>Redirecting to payment site...</p>
    <a href="checkout.php" style="display:none;" id="redirect"><p>Click here if you are not redirected.</p></a>
    <?php }
    else if(isset($_SESSION['payed']) && isset($_SESSION['cart']) && isset($_SESSION['cartType']) && $_SESSION['payed'] && count($cart = json_decode($_SESSION['cart'], true)) != 0 && count($type = json_decode($_SESSION['cartType'], true)) != 0){
        unset($_SESSION['payed']);
        $adress = "";
        $adress2 = "";
        if(isset($_SESSION['adress'])){
            $adress = ", '" . $_SESSION['adress'] . "'";
            $adress2 = ", adress";
        } 
        $date = date("Y-m-d H:i:s");
    ?>
       <div id="payContainer">
        <?php if(mysqli_query($dbc, "INSERT INTO orders (userID, orderDate, status $adress2 ) VALUES (". $_SESSION['user'] .", '" . $date . "', 'payed' $adress );")){ 
           $order = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM orders WHERE orderDate = '$date' AND userID = " . $_SESSION['user'] . ";"));
            for($i = 0; $i < count($cart); $i++){
                $physical = "";
                if($type[$i]){
                    $physical = 'physical';
                }
                else {
                    $physical = 'digital';
                }
                mysqli_query($dbc, "INSERT INTO orderproduct VALUES(" . $order['orderNR'] . ", " . $cart[$i] . " , 1, '$physical')");
                
            }
            unset($_SESSION['cart']);
            unset($_SESSION['cartType']);
           ?>
            
                <h2>Tack för att du beställde!</h2>
                <p>Du får en order bekräftelse och nycklar via mejl. Din order nummer är <?php echo $order['orderNR']; ?></p>
            
      <?php  }
        ?>
        </div>
        
   <?php }
    else{
        unset($_SESSION['payed']);
    ?>
    <div id="payContainer">
          <form action="checkout.php?pay=true" method="post">
          <?php
            if(in_array(true,json_decode($_SESSION['cartType'], true))){
        ?>
           <div>
              <select name="adress">
                 <?php
                $result = mysqli_query($dbc, "SELECT * FROM adress WHERE userID =" . $_SESSION['user'] . ";");
                while($adress = mysqli_fetch_array($result)){?>
                    <option value="<?php echo $adress['adress']; ?>"><?php echo $adress['adress'] . ', ' . $adress['city']; ?></option>
              <?php  }
                
                ?>
                <hr>
                 <option value="!add!">Add Adress</option>
                  
              </select>
           </div>
           <?php
            }
                ?>
      <button>
            <div>
                <img src="https://www.quickpay.net/images/payment-methods/cards/klarnapaynow.png" alt="">
                <h2>Klarna Betalning</h2>
            </div>
        </button>
        <button>
            <div>
                <img src="img/slice_it.png" alt="">
                <h2>Klarna Delbetalning</h2>
            </div>
        </button>
        <button>
            <div>
                <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png" alt="">
                <h2>Paypal</h2>
            </div>
        </button>
        <button>
            <div>
                <img src="https://mikeladano.files.wordpress.com/2018/03/visa.png?w=640" alt="">
                <h2>Banköverföring</h2>
            </div>
        </button>
        </form>
    </div>
    <?php } ?>
</body>

</html>
