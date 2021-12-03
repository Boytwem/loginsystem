<?php

if(isset($_POST['submitBtn'])) {

    session_start();
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();
} else {
    echo "error occured!";
}
