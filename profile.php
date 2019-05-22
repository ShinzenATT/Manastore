<?php 
    require_once("connect.php");
    $allow = isset($_SESSION['user']) && $_SESSION['status'] == "loggedin";
    if(!$allow){
        header("location: index.php");
    }
    $action = null;
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    else if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    
    
        $id = $_SESSION['user'];
        $user = mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM users WHERE id = $id"));
    
    
    
?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <title>
        <?php
        if($action == "edit"){
            echo "Redigera konto";
        }
        else if($action == 'change'){
            echo "Ändrar...";
        }
        else{
            echo $user['name'] . "s profil";
        }
        ?>
    </title>
    <script>
        function check() {
            var object = document.getElementById("id02");
            if (object.style.display == "none") {
                object.style.display = "block";
            } else {
                object.style.display = "none";
            }

        }

    </script>
</head>

<body>
    <?php
    if(isset($_POST['delete'])){
        $delete = $_POST['delete'];
        mysqli_query($dbc, "DELETE FROM adress WHERE userID = $id AND adress = '$delete';");
    }
    
    if($action == "change"){
        
        $id = $_SESSION['user'];
        $check = md5($_POST['pass']);
        if(mysqli_num_rows(mysqli_query($dbc,"SELECT password FROM users WHERE id = $id AND password = '$check';")) == 1){
            
            for($i = 0; $i < 5; $i++){
                if(isset($_POST['name']) && $i == 0 && $_POST['name'] != ""){
                    $name = $_POST['name'];
                    $query = "name = '$name'";
                }
                    else if ($i == 1 && isset($_POST['newPassword']) && isset($_POST['repeat']) && $_POST['newPassword'] != ""){
                        if($_POST['newPassword'] == $_POST['repeat']){
                            $pass = $_POST['newPassword'];
                            $query = "password = '$pass'";
                            
                        }
                        else{
                            $_SESSION['errorC'] = "Passwords did not match so they weren't saved. Other changes may have been saved.";
                        }
                    }
                     else if($i == 2 && $_POST['color'] && $_POST['color'] != ""){
                        $color = $_POST['color'];
                        $query = "color = '$color'";
                        $_SESSION['color'] = $color;
                    } 
                    
                    else if($i == 3 && isset($_POST['email']) && $_POST['email'] != ""){
                        $email = $_POST['email'];
                        $query = "email = '$email'";
                    }
                    else if($i == 4 && isset($_FILES['pfpForm'])){
                        $target_dir = "content/userPF/";
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($_FILES["pfpForm"]["name"],PATHINFO_EXTENSION));
                        $target_file = $target_dir . $id . "." . $imageFileType;
                        if($imageFileType != null && $imageFileType != ""){
                        
                        // Check if image file is a actual image or fake image
                        
                            $check = getimagesize($_FILES["pfpForm"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                $_SESSION['errorC'] = "File is not an image.";
                                $uploadOk = 0;
                            }
                            if($imageFileType != "jpg" && $imageFileType != "png") {
                                    $_SESSION['errorC'] = "Sorry, only JPG & PNG files are allowed.";
                                    $uploadOk = 0;
                                }
                            
                        
                        else if ($_FILES["pfpForm"]["size"] > 500000) {
                        $_SESSION['errorC'] = "Sorry, your file is too large.";
                        $uploadOk = 0;
                    }
                        
                        
                        
                        else if ($uploadOk == 0) {
                        $_SESSION['errorC'] = "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                            if(file_exists($target_dir . $id . '.jpg')){
                            unlink($target_dir . $id . '.jpg');
                            
                        }
                        if(file_exists($target_dir . $id . '.png')){
                            unlink($target_dir . $id . '.png');
                        }
                        if (move_uploaded_file($_FILES["pfpForm"]["tmp_name"], $target_file)) {
                            echo "The file ". basename( $_FILES["pfpForm"]["name"]). " has been uploaded.";
                        } else {
                           // $_SESSION['errorC'] = "Sorry, there was an error uploading your file.";
                        }
                    }
                        }
                    }

        
        
        if(isset($query)){
            $Tquery = "UPDATE users SET $query WHERE id = $id ;";
            mysqli_query($dbc,$Tquery);
            $Tquery = "SELECT * FROM users WHERE id = $id AND $query ;";
            $result = mysqli_query($dbc,$Tquery);
            if(mysqli_num_rows($result) > 0){
                $_SESSION['notification'] = "The changes has been saved! They will take full effect upon next logon.";
            }
            else{
                $_SESSION['errorC'] = "Changes have not been saved properly. Maybe you wrote in the wrong format or to much in on of the fields. '$query' & '$Tquery'";
            }
            unset($query);
        }
        }
            
        }
        else{
            $_SESSION['errorC'] = "Incorrect password";
        }
        unset($_POST['action']);
        header("location: profile.php?action=edit");
        
    }
    
    
        
    else if($action == "edit"){
    require('navbar.php');
    ?>
    <div id="userFeed">
        <?php
            if(isset($_SESSION['errorC'])){?>
        <div id="error">
            <h2><?php echo $_SESSION['errorC']; ?></h2>
        </div>
        <?php unset($_SESSION['errorC']);
                                      }
    ?>
        <form class="profileEdit" method="post" action="profile.php" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Visnings namn"><br>
            <input type="email" name="email" placeholder="e-mail"><br>
            <input type="password" placeholder="Nytt Lösenord" name="newPassword"><br>
            <input type="password" placeholder="Repetera lösenord" name="repeat"><br>
            <input type="color" value="<?php echo $user['color']; ?>" name="color"><br>
            <span>
                <label>Profil Bild</label> <br>
                <input type="file" name="pfpForm" id="pfpForm">
            </span><br> <br>
            <input type="password" name="pass" placeholder="Bekräfta Nuvarande Lösenord" required> <br>
            <button type="submit" name="action" value="change">Ändra</button><br>
            <a href="profile.php"><button type="button">Avbryt</button></a>
        </form>
        
        <form class="profileEdit" method="post" action="profile.php">
            <input required type="adress" name="adress" placeholder="Enter adress here.."> <br>
            <input required type="number" name="postCode" placeholder="Postal Code"> <br>
            <input required type="text" name="City" placeholder="City"> <br>
            <input required type="text" name="Country" placeholder="Country"> <br>
            <button type="submit" name="action" value="addAdress">Add Adress</button>
        </form>
        <form class="profileEdit" method="post" action="">
        <?php 
        $result = mysqli_query($dbc, "SELECT * FROM adress WHERE userID = $id ORDER BY adress;");
        
        while($adress = mysqli_fetch_array($result)){ ?>
        <div class="adress">
          
           <button name="delete" type="submit" value="<?php echo $adress['adress']; ?>">
            <i class="material-icons">
                delete_forever
            </i>
            </button>
            <h3><?php echo $adress['adress'] ?></h3>
            <h5><?php echo $adress['postcode'] ?></h5>
            <h5><?php echo $adress['city'] ?></h5>
            <h5><?php echo $adress['country'] ?></h5>
        </div>
        <?php } ?>
        </form>
    <?php  }
    else if($action="addAdress" && isset($_POST['adress']) && isset($_POST['postCode']) && isset($_POST['City']) && isset($_POST['Country']) && isset($_SESSION['user']) ){
     $adress = $_POST['adress'];
     $post = $_POST['postCode'];
     $city = $_POST['City'];
     $country = $_POST['Country'];
    $id = $_SESSION['user'];
    mysqli_query($dbc, "INSERT INTO adress VALUES($id, '$adress', '$city' , '$post', '$country');");
    if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM adress WHERE userID = $id AND adress = '$adress' AND postcode = $post AND city = '$city'")) > 0){
        unset($_POST['action']);
        header("location: profile.php?action=edit");
    }
    }
    else{
        require('navbar.php');
    ?>
    <div id="userFeed">
        <div id="userInfo">
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
                <span>
                    <h1><?php echo $user['name']; ?></h1>
                    <h2><?php echo $user['email']; ?></h2>
                    <h4>Du har varit regristrerad i <br>
                        <?php 
                        $creation = date_create($user['creation']);
                        $diff = date_diff($creation, date_create(date("Y-m-d")));
                        echo $diff->format("%y år, %m månader och %d dagar");
                        
                    ?>

                    </h4>
                </span>
                <span>
                    <h4>Födelsedag: <?php
                           
                           echo strftime('%d %B', strtotime($user['birthdate']));
                           ?></h4>
                    <h4>Antal inloggningar: <?php echo $user['logins']; ?></h4>
                    <h4>Pengar spenderat: <?php echo $user['spent']; ?>kr</h4>
                </span>
                <span style="align-self: flex-end;">
                    <form method="get" action="profile.php">
                        <button type="submit" name="action" value="edit">Redigera Konto</button>
                    </form>
                    <form action="submit.php" method="post">
                        <button type="submit" name="action" value="logout">Logga ut</button>
                    </form>
                </span>
            </div>

        </div>
        <h2>Det finns inget att visa</h2>
    </div>
    <?php 
    }
    ?>
</body>

</html>
