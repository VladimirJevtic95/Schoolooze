<?php

//*!pokrecemo sesiju
session_start();
include "connection/connection.logic.php";

if (isset($_POST['btn_login'])) {

    //uzimamo vrednosti koje je korisnik uneo
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    // proveravamo da li neko sa tim korisnickim imenom postoji vec u bazi
    // ovo i nije ovako bas sceure postop moze da ima vise istih username e sada mozemo da stavimo da username bude uniqe 
    // ili da preko user i passa gledamo neko polje koje je vec unique ili da gledamo vise parametara odjenom
    if ($username != "" && $password != "") {
        $sql_queryCount = "SELECT COUNT(*) AS countUser FROM user WHERE username ='" . $username . "'";
        $resultCount = mysqli_query($conn, $sql_queryCount);
        $rowCount = mysqli_fetch_array($resultCount);
        $count = $rowCount['countUser'];


        // ukoluko neko postoji sada proveravamo njegov password da li se poklapa sa passwordom koji je hashovan u bazi
        // hash za neki rec je uvek isti ma koliko se puna ponovio. npr hash za //!flash ce uvek biti !$2y$10$n/Jdx0MaEnW.Vttc4Nf/XeLqEeNpH3u.B6G3iPQ4ZRDe3cTnsTOY.
        if ($count > 0) {

            $sql_query_hash = "SELECT user_password FROM user WHERE username ='" . $username . "'";
            $result_hash = mysqli_query($conn, $sql_query_hash);
            $row_hash = mysqli_fetch_array($result_hash);
            $password_hash = $row_hash['user_password'];

            if (password_verify($password, $password_hash)) {

                $sql_query_rola = "SELECT role_id_fk  FROM user WHERE username='" . $username . "'";
                $result_rola = mysqli_query($conn, $sql_query_rola);
                $row_rola = mysqli_fetch_array($result_rola);
                $rolaID = $row_rola['role_id_fk'];

                $sql_query_ID = "SELECT userid FROM user WHERE username='" . $username . "'";
                $result_ID = mysqli_query($conn, $sql_query_ID);
                $row_ID = mysqli_fetch_array($result_ID);
                $userID = $row_ID['userid'];


                // dodeljujemo sesije koje su vezane za korisnicko ime, user id i za rolu korisnika
                $_SESSION["current_username"] = $username;
                $_SESSION["current_userID"] = $userID;
                $_SESSION["current_role"] = $rolaID;

                header('Location: index.php');
            } else {
                header('Location: ?Invalid_username_or_password');
            }
        } else {
            header("Location: ?NoSuchUser");
        }
    } else {
        header("Location: ?NotAllDataFilled");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Schoolooze</title>

    <!-- css login style -->
    <link rel="stylesheet" type="text/css" href="login.css">


</head>

<body>

    <div class="login_space">

        <form action="#" method="POST" class="form">

            <img src="img/Schoolooze1000.png" alt="">
            <h2>Login</h2>

            <div class="input">
                <input type="username" name="login_username" id="login_username" placeholder="username" required>
                <label for="login_username">Username or Email</label>
            </div>

            <div class="input">
                <input type="password" name="login_password" id="login_password" placeholder="password" required>
                <label for="login_password">Password</label>
            </div>

            <input type="submit" value="Login" name="btn_login" class="click_submit">

            <a href="register.php" style="color: white;text-decoration: none;font-weight: 600;float: right;">Register</a>

        </form>

        <!-- //*! nepotrebno za sada -->
        <!-- <div id="forgot_password">
            <form action="" class="form">
                <a href="#" class="close">&times;</a>
                <h2>Restore Password</h2>
                <div class="input">
                    <input type="email" name="forgot_email" id="forgot_email" required>
                    <label for="forgot_email">Email</label>
                </div>
                <input type="submit" value="Submit" class="click_submit">
            </form>
        </div> -->

    </div>

</body>

</html>