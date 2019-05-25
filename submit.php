<?php
    $action = null;
    if(isset($_POST['action'])){
        $action = $_POST['action'];
    }
    require_once("connect.php");
    

if(isset($_SESSION['status']) && $action != "logout"){
    if($_SESSION['status'] == 'afterReg' && $action == null){ 
     ?>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title>Add an adress</title>
    <?php require('navbar.php'); ?>
</head>

<body>
    <div id="register">
       <?php
            if(isset($_SESSION['error'])){?>
        <div id="error">
            <h2><?php echo $_SESSION['error']; ?></h2>
        </div>
        <?php unset($_SESSION['error']);
                                      }
    ?>
        <form method="post" action="submit.php">
            <input required type="adress" name="adress" placeholder="Enter adress here..">
            <input required type="number" name="postCode" placeholder="Postal Code">
            <input required type="text" name="City" placeholder="City">
            <input required type="text" name="Country" placeholder="Country">
            <button type="submit" name="action" value="addAdress">Add Adress</button>
            <a href="index.php">
                <button type="button">skip</button>
            </a>
        </form>

    </div>
</body>

</html>
<?php }

else if($action="addAdress" && isset($_POST['adress']) && isset($_POST['postCode']) && isset($_POST['City']) && isset($_POST['Country']) && isset($_SESSION['user']) ){
     $adress = $_POST['adress'];
     $post = $_POST['postCode'];
     $city = $_POST['City'];
     $country = $_POST['Country'];
    $id = $_SESSION['user'];
    mysqli_query($dbc, "INSERT INTO adress VALUES($id, '$adress', '$city' , '$post', '$country');");
    if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM adress WHERE userID = $id AND adress = '$adress' AND postcode = $post AND city = '$city'")) > 0){
        unset($_SESSION['status']);
        unset($_POST['action']);
        header("location: index.php");
    }
    
    else{
        $_SESSION['error'] = "Error saving the adress";
    }
    
}
    else{
        unset($_SESSION['status']);
        header("location: submit.php");
    }
    
}

else{
    if(($action == null || $action == "register") ){
    ?>
<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <title>Register account</title>
    <script>


    </script>
    <?php require('navbar.php'); ?>
</head>

<body>

    <div id="register">
        <?php
            if(isset($_SESSION['error'])){?>
        <div id="error">
            <h2><?php echo $_SESSION['error']; ?></h2>
        </div>
        <?php unset($_SESSION['error']);
                                      }
    ?>
        <form method="post" action="submit.php">
            <input required type="text" placeholder="Fyll i Email" name="email" <?php if(isset($_POST['email'])){ ?> value="<?php echo $_POST['email'] ?>" <?php } ?>>
            <input required type="text" placeholder="Fyll i fullständig namn" name="name">
            <input required type="date" name="birthdate" placeholder="Födelsedag">
            <input required type="password" placeholder="Lösenord" name="password" <?php if(isset($_POST['password'])){ ?> value="<?php echo $_POST['password'] ?>" <?php } ?>>
            <input required type="password" placeholder="Repetera Lösenord" name="repeat">
            <input required type="color" value="#8046C9" name="color">
            <button type="submit" name="action" value="regPost">Registrera</button>
        </form>
    </div>
</body>

</html>
<?php }
else if($action == "login"  && isset($_POST['email']) && isset($_POST['password']) ){
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $query = mysqli_query($dbc, "SELECT * FROM users WHERE email = '$email' AND password = '$pass';");
    if(mysqli_num_rows($query) == 1){
        $user = mysqli_fetch_array($query);
        $_SESSION['color'] = $user['color'];
        $_SESSION['user'] = $user['id'];
        $_SESSION['status'] = "loggedin";
        $logins = ++$user['logins'];
        $id = $user['id'];
        mysqli_query($dbc, "UPDATE users SET logins = $logins WHERE id = $id;");
        
    }
    else{
        $_SESSION['logError'] = "Email and/or password may be wrong";
    }
    header("location: index.php");
    
}



else if($action == "regPost" && isset($_POST['email']) && isset($_POST['name']) && isset($_POST['birthdate']) && isset($_POST['password']) && isset($_POST['color']) && isset($_POST['repeat']) ){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $birth = $_POST['birthdate'];
    $pass = $_POST['password'];
    $color = $_POST['color'];
    $md5 = md5($pass);
    
    
    
    $checkMail = mysqli_query($dbc,"SELECT email FROM users WHERE email = '$email';");
    $checkPass = mysqli_query($dbc, "SELECT password FROM users WHERE password = '$md5';");
    
    if($_POST['password'] != $_POST['repeat']){
        $_SESSION['error'] = "password missmatch";
    }
    else if(mysqli_num_rows($checkMail) == 1){
        $_SESSION['error'] = "E-mail is already in use by another account";
    }
    
    else if(mysqli_num_rows($checkPass) > 5){
        $_SESSION['error'] = "Password is too weak";
    }
    else{
        $time = date("Y-m-d H:i:s");
        mysqli_query($dbc,"INSERT INTO users (name, birthdate, email,password,color, creation) VALUES('$name','$birth','$email','$md5','$color','$time');");
        
        if(mysqli_num_rows(mysqli_query($dbc,"SELECT id FROM users WHERE email = '$email' AND password = '$md5';")) == 1){
            $_SESSION['status'] = "afterReg";
            $info = mysqli_fetch_array(mysqli_query($dbc,"SELECT id FROM users WHERE email = '$email' AND password = '$md5';"));
            $_SESSION['user'] = $info['id'];
        }
        else{
            $_SESSION['error'] = "nay";
        }
    }
    
    
    
    
   header("location: submit.php");
}
    else if($action = "logout"){
        if(isset($_SESSION['color'])){
            unset($_SESSION['color']);
        }
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        if(isset($_SESSION['status'])){
            unset($_SESSION['status']);
        }
        header("location: index.php");
    }
    
    else{
        header("location: index.php");
    }
}



?>
