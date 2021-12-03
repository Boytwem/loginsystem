<?php
if (isset($_POST['loginButton'])) {

    require 'db.inc.php';

    $emailUser = $_POST['userName'];
    $password = $_POST['password'];

    if (empty($emailUser)|| empty($password)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else {
    $sql = "SELECT * FROM login WHERE USERNAME=? OR EMAIL=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=sqlerror");
            exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "ss", $emailUser, $emailUser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            $checkPassword = password_verify($password, $row['PASSWORD']);
            if ($checkPassword === false) {
                header("Location: ../login.php?error=wrongpassword");
                exit();
            }
            else if ($checkPassword === true) {
                session_start(); 

                $_SESSION['idUser'] = $row['id'];
                $_SESSION['usernameUser'] = $row['username'];

                header("Location: homepage.php?login=successful");
                exit();
            }
        }
    }
}
}