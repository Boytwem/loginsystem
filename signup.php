<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div>
        <img src="images (10).jpeg" alt="" class="img-1">
            <div class="container">
                <h2>BOYTWEM-TECH</h2>
                <h2>Sign Up</h2>
                <?php
                    if(isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyfields") {
                            echo '<p class="error">Fill in all fields</p>';
                         }
                        elseif($_GET["error"] == "invalidmailuserid") {
                            echo'<p class="error">Invalid username & e-mail!</p>';
                        }
                        
                        elseif($_GET["error"]== "emptyfields&userId") {
                            echo '<p class="error">Invalid e-mail!</p>';
                        }
                        
                        elseif($_GET["error"]== "emptyfields") {
                            echo '<p class="error">E-mail is required!</p>';
                        }
                        
                        elseif($_GET['error']== "usernametaken") {
                            echo '<p class="error">Username already exist!</p>';
                        }
                        
                        elseif($_GET["error"]== "incorrectpassword") {
                            echo '<p class="error">Password does not macth!</p>';
                        }
                        
                        elseif($_GET["error"]== "successful") {
                            echo '<p class="error">Signup successful!</p>';
                        }
                    } 
                ?>

                <form action="include/signup.inc.php" method="POST">
                    <b>Username</b><br>
                    <input type="text" name="userId" class="username" placeholder="Username..."><br><br>
                    <b>Email Address</b><br>
                    <input type="text" name="mail" class="password" placeholder="Email..."><br><br>
                    <b>Password</b><br>
                    <input type="password" name="pwd" class="password" placeholder="Password..."><br><br>
                    <b>Confirm Password</b><br>
                    <input type="password" name=repeatPwd class="password" placeholder="Confirm password..."><br><br>
                    <button type="submit" name="sign-button" class="button-1">Sign Up</button>
                    <p class="link-login">Already have an account?  <a href="login.php">Login</a></p>        
                </form>
            </div>
    </div>
</body>