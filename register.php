<?php

include "connection/connection.logic.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>

    <!-- css register style -->
    <link rel="stylesheet" type="text/css" href="style/style.regster.css">
</head>

<body>

    <!-- podaci koje imamo za registraicju -->
    <!-- ime, prezime, datum rodjenja, identifikacija, jmbg, pol, opis neki, slika, adresa, email, username, password, moto, rola korisnika -->

    <form action="backend_logic/register_new_user.logic.php" method="POST" enctype="multipart/form-data">

        <div class="style_div_row_reg">
            <label for="firstname">First name</label>
            <input type="text" id="firstname" name="firstname" required />
        </div>
        <div class="style_div_row_reg">
            <label for="lastname">Last name</label>
            <input type="text" id="lastname" name="lastname" required />
        </div>
        <div class="style_div_row_reg">
            <label for="birth">Date of birth</label>
            <input type="date" id="birth" name="birth" required />
        </div>
        <div class="style_div_row_reg">
            <label for="personal_index">Personal ID number (index)</label>
            <input type="text" id="personal_index" name="personal_index" required />
        </div>
        <div class="style_div_row_reg">
            <label for="jmbg">JMBG</label>
            <input type="text" maxlength="13" id="jmbg" name="jmbg" equired />
        </div>
        <div class="style_div_row_reg">
            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" required />
        </div>
        <div class="style_div_row_reg">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" required />
        </div>
        <div class="style_div_row_reg">
            <label for="logo">Profile image</label>
            <input type="file" name="profile_img_logo" required>
        </div>
        <div class="style_div_row_reg">
            <label for="address"> Address </label>
            <input type="text" id="address" name="address" required />
        </div>
        <div class="style_div_row_reg">
            <label for="mail">E-mail</label>
            <input type="text" id="mail" name="mail" required />
        </div>
        <div class="style_div_row_reg">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required />
        </div>
        <div class="style_div_row_reg">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required />
        </div>

        <div class="style_div_row_reg">
            <label for="chosen_feeling">Choose your feeling</label>
            <select id="chosen_feeling" name="chosen_feeling">
                <?php
                $sql = "SELECT * FROM feeling_status ORDER BY status_description ASC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value='" . $row['status_id'] . "'>" . "I feel " . $row['status_description'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="style_div_row_reg">
            <label for="motto">moto</label>
            <input type="text" name="motto" id="motto" required />
        </div>

        <br>
        <hr>
        <br><br>

        <input type="submit" name="btn_register" id="btn_register" value="Register" />


    </form>


</body>

</html>