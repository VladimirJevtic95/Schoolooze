<?php

session_start();

include "connection/connection.logic.php";

if (isset($_POST['btn_logout'])) {
    session_unset();
    session_destroy();
    header('Location: ../login.php');
}
