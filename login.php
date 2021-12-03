<?php
if(isset($_SESSION)) {
    session_start();
}
?>

<?php
    if(isset($_POST['checkBox'])) {
        $emailUser = $_POST['userName'];
        $password = $_POST['password'];

        setcookie("userName", $emailUser, time() + 60*60*24*30);
        setcookie("password", $password, time() + 60*60*24*30);

        header("Location: ../homepage.php?login=successful");
        exit();

    } elseif (isset($_COOKIE['userName']) && isset($_COOKIE['password'])) {
        header("Location: ../homepage.php?login=successful");
        exit();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div>
        <img src="images (10).jpeg" alt="" class="img-1">
            <div class="login-container">
                <h2>BOYTWEM-TECH</h2>
                <h3>Sign In</h3>
                <?php if(isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyfields") {
                       echo '<p class="error">Fill in all fields</p>';
                    }
                    elseif ($_GET["error"] == "wrongpassword") {
                        echo '<p class="error">Incorrect Password!</p>';
                     }
                     elseif ($_GET["login"] == "successful") {
                        echo '<p class="error">Login successful!</p>';
                     }
                     
                }

                ?>
                <form action="include/login.inc.php" method="POST">
                    <b>Username</b><br>
                    <input type="text" name="userName" class="username" placeholder="Email/Username.."><br><br>
                    <b>Password</b><br>
                    <input type="password" name="password" class="password" placeholder="Password.."><br><br>
                    <div id="flex-checkbox">
                        <input type="checkbox" name="checkBox" id="checkbox">
                        <h4>Keep Me Logged In</h4>
                    </div>
                    <button type="submit" class="button-1" name="loginButton">LOG IN</button><br><br>        
                    <a href="forgotpassword.php" name="forgotPass" id="forgotp"><b>Forgot Password?</b></a>
                    <a href="signup.php" class="signup" name="signUp"><b>Sign Up</b></a>
                </form>
            
                
            </div>
    </div>
         
</body>
</html>