<?php
if(isset($_POST['changePwd'])) {

    require_once "db.inc.php";

    $uname = $_POST['username'];
    $pwd = $_POST['password'];
    $repeatPwd = $_POST['confirmPassword'];

    if(isset($uname) && !empty($uname)) {
        if($pwd === $repeatPwd) {
            $sql = "SELECT USERNAME FROM login WHERE USERNAME = '$uname'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1) {
                
                $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
                $sql2 = mysqli_query($conn, "UPDATE login SET PASSWORD = '$hashPwd' WHERE USERNAME = '$uname'");
                header("Location: ../forgotpassword.php");
            } else {
                echo "Email does not exist!";
            }
        } else {
            echo "Password does not match!";
        }
    } else {
        echo "Username is required!";
    }

} else {
    echo "Password changed successfully!"
    header("Location: ../forgotpassword.php");
}
