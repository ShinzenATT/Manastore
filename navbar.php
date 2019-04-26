<?php 
 $dbc = mysqli_connect("localhost","root","","manastore");
 session_start();
$status = null;
if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.php">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Raleway|Ubuntu" rel="stylesheet">

    <script>
        function displaySearch() {

            if (document.getElementById("navSearch").style.display == "none") {
                document.getElementById("navSearch").style.display = "block";
                document.getElementById("navSearch").style.opacity = "1";
                document.getElementById("SIcon").innerHTML = "close";
            } else {
                document.getElementById("navSearch").style.opacity = "0";
                document.getElementById("navSearch").style.display = "none";
                document.getElementById("SIcon").innerHTML = "search";
            }
        }

        function modal() {
            var display = document.getElementById('id01').style.display;
            if (display == "none") {
                document.getElementById('id01').style.display = 'block';
            } else {
                document.getElementById('id01').style.display = 'none';
            }

        }

        function account() {
            var show = document.getElementById('accountMenu').style;
            if (show.display == 'none') {
                show.display = "block";
            } else {
                show.display = "none";
            }
        }

    </script>
</head>

<body>
    <header>
        <div id="navContainer">
            <!-- Left side of the navbar -->
            <div><a href="index.php"><img src="img/Resurs%201.svg"></a>
                <a href="">
                    <nav>
                        <h2>Butik</h2>
                    </nav>
                </a>
                <a href="">
                    <nav>
                        <h2>Utforska</h2>
                    </nav>
                </a>
                <a href="">
                    <nav>
                        <h2>Blog</h2>
                    </nav>
                </a>
                <a href="">
                    <nav>
                        <h2>Om oss</h2>
                    </nav>
                </a>
            </div>
            <!-- Right side of the navbar. Note: the i tags have the material icon font on them -->
            <div>
                <!-- Search bar. It's usally hidden until the search icon is clicked. -->
                <nav id="navSearch" style="display: none; opacity: 0;">
                    <form method="get">
                        <input type="search" placeholder="Type to search..." name="search" value="<?php if(isset($_GET['search'])){
    echo $_GET['search'];
} ?>">
                        <input class="material" type="submit" value="search">
                    </form>
                </nav>
                <!-- Icons -->
                <a style="cursor: alias;" onclick="displaySearch()">
                    <nav><i id="SIcon">search</i></nav>
                </a>
                <a href="">
                    <nav>
                        <div id="cartCount">
                            <p>13</p>
                        </div><i id="cart">shopping_cart</i>
                    </nav>
                </a>
                <a onclick="<?php
                                if($status != "loggedin"){
                                    echo "modal()";
                                }
                                else{
                                    echo "account()";
                                }
                                 ?>" style="cursor: alias;">
                    <nav><i>account_circle</i></nav>
                </a>
            </div>
        </div>
    </header>
    <?php if($status == "loggedin" ){ 
                    if(isset($_SESSION['user'])){
                        $id = $_SESSION['user'];
                        $user = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE id = $id;"));
                        
                    
    ?>
    <div id="accountMenu" style="display: none">
        <div id="accountMenuContent">
            <img style="background-image: url(
                       <?php
                              if(false){
                                  echo "nop";
                              }   
                                 
                            else{
                                echo "img/missing.png";
                            }     
                                 ?>
                       )">
            <div>
                <h3>Hello <?php echo $user['name']; ?> </h3>
                <h4><?php echo $user['email']; ?></h4>
                <?php } ?>
                <a href=""><button>Se Order</button></a>
                <a href=""><button>Önskelista</button></a>
                <a href=""><button>Visa Profil</button></a>
                <form action="submit.php" method="post">
                   
                    <button type="submit" name="action" value="logout">Logga ut</button>
                </form>
            </div>
        </div>

    </div> <?php } ?>
    <?php if($status != "loggedin"){
 ?>
    <!-- The Modal -->
    <div id="id01" class="modal" style=" <?php
    if(isset($_SESSION['logError'])){
        echo "display: block";
    }
    else{
        echo "display: none";
    }
 
 ?>" onclick="">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="submit.php" method="post" onclick="">

            <div class="container">
                <?php
            if(isset($_SESSION['logError'])){?>
                <div id="error">
                    <h2><?php echo $_SESSION['logError']; ?></h2>
                </div>
                <?php unset($_SESSION['logError']);
                                      }
    ?>
                <label for="uname"><b>E-Mail</b></label>
                <input type="email" placeholder="Enter E-Mail" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <div>
                    <button type="submit" value="login" name="action">Login</button>
                    <button type="submit" value="register" name="action" style="color: #BC97EA">Register</button>
                </div>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" id="close" style="">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" id="cancelbtn">Cancel</button>
            </div>
        </form>
    </div> <?php } ?>


</body>

</html>
