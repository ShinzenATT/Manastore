<?php 
 require_once("connect.php");
setlocale(LC_ALL, "sv_SE");
$status = null;
if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];
}
?>

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
            var icon = document.getElementById('aIcon');
            if (show.display == 'none') {
                show.display = "block";
                icon.innerHTML = 'account_box'
            } else {
                show.display = "none";
                icon.innerHTML = 'account_circle';
            }
        }
        function linkMenu() {
            var menu = document.getElementById('menu');
            var icon = document.getElementById('mIcon');
            if(menu.style.display == 'none'){
                menu.style.display = "";
                console.log("menu show");
                icon.innerHTML = "arrow_upward";
            }
            else {
                menu.style.display = 'none';
                console.log("menu hide");
                icon.innerHTML = 'menu';
            }
        }

    </script>
</head>

<body>
    <header>
        <div id="navContainer">
            <!-- Left side of the navbar -->
            <div id="navLeft"><a href="index.php"><img src="img/Resurs%201.svg"></a>
                <a href="">
                    <nav>
                        <h2>Butik</h2>
                    </nav>
                </a>
                <a href="index.php">
                    <nav>
                        <h2>Utforska</h2>
                    </nav>
                </a>
                <a href="">
                    <nav>
                        <h2>Blog</h2>
                    </nav>
                </a>
                <a href="about_us.php">
                    <nav>
                        <h2>Om oss</h2>
                    </nav>
                </a>
            </div>
            <!-- Right side of the navbar. Note: the i tags have the material icon font on them -->
            <div id="navRight">

                <!-- Icons -->
                <a style="cursor: alias;" onclick="displaySearch()">
                    <nav><i id="SIcon">search</i></nav>
                </a>
                <a href="cart.php">
                    <nav>
                        <?php
                        
                        ?>
                        <div id="cartCount">
                            <p>
                                <?php
                                if(isset($_SESSION['cart']) && ($count = count(json_decode($_SESSION['cart'], true)))) {
                                echo $count;
                                }
                                else {
                                    echo '0';
                                }
                                ?>
                            </p>
                        </div>
                        <?php  ?>
                        <i id="cart">shopping_cart</i>
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
                    <nav><i id="aIcon">account_circle</i></nav>
                </a>
                <a id="navMenu" onclick="linkMenu()">
                    <nav><i id="mIcon">menu</i></nav>
                </a>
            </div>
        </div>
    </header>
    <!-- Search bar. It's usally hidden until the search icon is clicked. -->
    <nav id="navSearch" style="display: none; opacity: 0;">
        <form method="get">
            <input type="search" placeholder="Type to search..." name="search" value="<?php if(isset($_GET['search'])){
    echo $_GET['search'];
} ?>">
            <input class="material" type="submit" value="search">
        </form>
    </nav>
    <div id="menu" style="display:none;">
        <a href="">
                    <nav>
                        <h2>Butik</h2>
                    </nav>
                </a>
                <a href="index.php">
                    <nav>
                        <h2>Utforska</h2>
                    </nav>
                </a>
                <a href="">
                    <nav>
                        <h2>Blog</h2>
                    </nav>
                </a>
                <a href="about_us.php">
                    <nav>
                        <h2>Om oss</h2>
                    </nav>
                </a>
    </div>
    <?php if($status == "loggedin" ){ 
                    if(isset($_SESSION['user'])){
                        $id = $_SESSION['user'];
                        $user = mysqli_fetch_array(mysqli_query($dbc,"SELECT * FROM users WHERE id = $id;"));
                        
                    
    ?>
    <div id="accountMenu" style="display: none">
        <div id="accountMenuContent">
            <img class="pfp" style="background-image: url(
                       <?php
                            $filepath = "content/userPF/$id";
                              if(file_exists($filepath . ".jpg")){
                                  echo $filepath . '.jpg';
                              }
                            else if(file_exists($filepath . '.png')){
                                echo $filepath . '.png';
                            }
                                 
                            else{
                                echo "img/missing.png";
                            }     
                                 ?>
                       )">
            <div>
                <h3>Hej <?php echo $user['name']; ?> </h3>
                <h4><?php echo $user['email']; ?></h4>
                <?php } ?>
                <a href=""><button>Se Order</button></a>
                <a href=""><button>Önskelista</button></a>
                <a href="profile.php"><button>Visa Profil</button></a>
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
                <input type="email" placeholder="Fyll i Email" name="email" required>

                <label for="psw"><b>Lösenord</b></label>
                <input type="password" placeholder="Fyll i lösenord" name="password" required>
                <div>
                    <button type="submit" value="login" name="action">Logga in</button>
                    <button type="submit" value="register" name="action" style="color: #BC97EA">Registrera</button>
                </div>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Kom ihåg mig
                </label>
            </div>

            <div class="container" id="close" style="">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" id="cancelbtn">Avbryt</button>
            </div>
        </form>
    </div> <?php } ?>
    <a id="beta" href="https://github.com/ShinzenATT/Wes-och-Weu-Slutprojekt" target="_blank">
        <div>
            <h3>Beta</h3>
        </div>
    </a>
</body>
