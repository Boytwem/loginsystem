

<?php
if(isset($_POST['sign-button'])) {

    require 'db.inc.php';
 
    $username = $_POST['userId'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['repeatPwd'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfields&userId=".$username."&mail=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invalidmailuserid");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&userId=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=emptyfields&email=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=incorrectpassword&userId=".$username."&mail=".$email);
        exit();
    }
    else {
        $sql = "SELECT username FROM login WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usernametaken&email=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO login (USERNAME, EMAIL, PASSWORD) VALUE(?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?error=successful");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: ../signup.php?");
}

