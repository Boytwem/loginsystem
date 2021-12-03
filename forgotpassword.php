
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgotpassword</title>
    <link rel="stylesheet" href="forgotp.css">
</head>
<body>
    <img src="images (9).jpeg" alt="img" class="img-1">
    <div class="pcontainer">
        <h2 class="reset-p">RESET PASSWORD</h2>
        <form action="include/forgotpassword.inc.php" class="forgotp" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter username..."><br>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter new password..."><br>
            <label for="password">Confirm Password:</label>
            <input type="password" name="confirmPassword" placeholder="Confirm new password..."><br>
            <button class="button-4" type="submit" name="changePwd">CHANGE PASSWORD</button>
        </form>
    </div>
</body>
</html>