<?php

session_start();
include "connection/connection.logic.php";

if (!isset($_SESSION["current_userID"]) && !isset($_SESSION["current_username"])) {
    header('Location: login.php');
}

//TODO ukoliko student pokusa da udje na stranicu za koju nema rolu ovo cemo da koristimo
//TODO unistavamo mu sesiju i vracamo ga nazad
// if (($_SESSION["current_role"]) != 4) {
//     session_unset();
//     session_destroy();
//     header('Location: ../patient/patient_login.php');
// }

$username = $_SESSION["current_username"];
$userID = $_SESSION["current_userID"];
// $accessRole = $_SESSION["current_role"];

$sql = "SELECT * FROM user WHERE userid = $userID";
$resultProfPic = mysqli_query($conn, $sql);
$rowData = $resultProfPic->fetch_assoc();
$NameSurname = $rowData['first_name'] . " " . $rowData['last_name'];
$ProfilePic = $rowData['profile_image_hq'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username ?></title>
</head>

<body>

    <h1><?php echo $NameSurname ?></h1>

    <img src="img/profile_images/HQ_img/<?php echo $ProfilePic ?>" alt="" width="20%">

    <br><br><br>
    <form class="nav-link" method="POST" action="backend_logic/logout.logic.php">
        <button type="submit" id="btn_logout" name="btn_logout" style="background-color: transparent; border:none; font-weight:600; outline: none !important;">
            <span>Logout</span>
        </button>
    </form>

</body>

</html>