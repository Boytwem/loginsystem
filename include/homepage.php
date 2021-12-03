
<?php

if(isset($_COOKIE['userName'])) {
    $user = $_COOKIE['userName'];
    echo "$user";
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homepage</title>
    <link rel="stylesheet" href="../fpstyling.css">
</head>
<body>
    <h1 class="welcome">YOU ARE WELCOME HERE!</h1>
    <form action="logout.inc.php" method="post">
        <button type="submit" class="button-4" name="submitBtn">LOGOUT</button>
    </form>
    
</body>
</html>