<?php 
 $dbc = mysqli_connect("localhost","root","","manastore");
 session_start();
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

        function displaySearch(){
            
            if(document.getElementById("navSearch").style.display == "none"){
                document.getElementById("navSearch").style.display = "block";
                document.getElementById("navSearch").style.opacity = "1";
                document.getElementById("SIcon").innerHTML = "close";
            }
            else{
                document.getElementById("navSearch").style.opacity = "0";
                document.getElementById("navSearch").style.display = "none";
                document.getElementById("SIcon").innerHTML = "search";
            }
        }
    </script>
</head>

<body>
        <header>
            <div id="navContainer">
               <!-- Left side of the navbar -->
                <div><a href=""><img src="img/Resurs%201.svg"></a>
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
                    <a href="#" onclick="displaySearch()">
                        <nav><i id="SIcon">search</i></nav>
                    </a>
                    <a href="">
                        <nav>
                            <div id="cartCount">
                                <p>13</p>
                            </div><i id="cart">shopping_cart</i>
                        </nav>
                    </a>
                    <a href="">
                        <nav><i>account_circle</i></nav>
                    </a>
                </div>
            </div>
        </header>

</body>

</html>
