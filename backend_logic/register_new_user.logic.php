<?php

// ukljucujemo fajl za konekciju sa bazon
include "../connection/connection.logic.php";

// prikazuje greske ukoliko ih ima
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// iz forme na register php hvatamo sta je korisnik uneo preko name-a u input polja
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birth = $_POST['birth'];
$personal_index = $_POST['personal_index'];
$jmbg = $_POST['jmbg'];
$gender = $_POST['gender'];

$description = $_POST['description'];
$motto = $_POST['motto'];
$address = $_POST['address'];
$mail = $_POST['mail'];

$chosen_feeling = $_POST['chosen_feeling'];

// dodajemo vrednos koja je danasnji datum
$register_date = date("Y-m-d");

$username = $_POST['username'];
$password = $_POST['password'];

//*!radimo hash passworda
//*!vise pogledaj ovde https://www.php.net/manual/en/function.password-hash.php
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$imgAlt = $firstname . "_" . $lastname . "_profile_image";

// name of the input file for the image
$file = $_FILES['profile_img_logo'];

// promenljive koje name trebaju da bi sliku dodali
$fileName = $file["name"];
$fileType = $file["type"];
$fileTempName = $file["tmp_name"];
$fileError = $file["error"];
$fileSize = $file["size"];

// koja je vrsta extenzija slike jpg png itd
$fileExtension = explode(".", $fileName);
$fileActualExtension = strtolower(end($fileExtension));

// koje su sve extenzije dozvoljene
$allowed = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");

//?radimo prepared statement
//?vise vidi ovde https://www.w3schools.com/php/php_mysql_prepared_statements.asp
$stmt = mysqli_stmt_init($conn);

//*!ukoliko je pritisnuto dugme desava se sledeci deo koda
if (isset($_POST['btn_register'])) {
    //*!gledamo da li je extenzija slike u nizu koji smo gore definisali
    if (in_array($fileActualExtension, $allowed)) {
        //*!gledamo da li imamo neke greske pri dodavanju slike, ukoliko ih ima nije 0; === znaci da se faj poklapa i po vrednosti i po tipu
        if ($fileError === 0) {
            //*!definisemo koja je najveca velicina za sliku oko 25MB 
            if ($fileSize < 209715200) {

                //*!dodajmo ime za sliku koje ce da bude ime_prezime_profile_image_random broj. extenzija
                $imageNameHQ = $imgAlt . "_" . uniqid("", true) . "." . $fileActualExtension;
                $imageNameLQ = "LQ_" . $imageNameHQ;

                //*!imamo dve verzije slike jedna je kompresovana a druga je original, 
                //*!kompresovanu korisitmo kada ocesmo da vidimo npr listu od vise slika a original kada se udje na neku odredjenu sliku
                $imageNameHQDestination = "../img/profile_images/HQ_img/" . $imageNameHQ;
                $imageNameLQDestination = "../img/profile_images/LQ_img/" . $imageNameLQ;

                compressedImage($fileTempName, $imageNameLQDestination, 20);

                //*!na osnovu jbga odredjue da li je student ili profesor ovo je MAX LOSE OVAKO, ali radi za sada 
                //*!TREBA DA SE POPRAVI
                //jmbg 1707995999999
                $jmbgVerifikacija = substr("$jmbg", 4, 1) * 1;
                if ($jmbgVerifikacija == 0) {
                    $access_role = 1; //student
                } else {
                    $access_role = 2; //professor 
                }

                if ($firstname != "" && $lastname != "" && $jmbg != "" && $username != "" && $password != "") {
                    //*!ukoliko polja u if-u nisu prazna izvrsava se naredba za unos polja u bazu
                    $sql = "INSERT INTO user(userid, first_name, last_name, birth_date, personal_id_number, jmbg, 
                    gender, user_description, profile_image_lq, profile_image_hq, user_address, email, username, 
                    user_password, motto, feeling_status_fk, register_date, role_id_fk) 
                    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "SQL statment failed";
                    } else {
                        $stmt->bind_param(
                            "sssssssssssssssss",
                            $firstname,
                            $lastname,
                            $birth,
                            $personal_index,
                            $jmbg,
                            $gender,
                            $description,
                            $imageNameLQ,
                            $imageNameHQ,
                            $address,
                            $mail,
                            $username,
                            $hashed_password,
                            $motto,
                            $chosen_feeling,
                            $register_date,
                            $access_role
                        );
                        mysqli_stmt_execute($stmt);

                        move_uploaded_file($fileTempName, $imageNameHQDestination);
                        move_uploaded_file($fileTempName, $imageNameLQDestination);
                        //*!nakon uspesnog unosa prebacujemo korisnika na login stranicu
                        header('Location: ../login.php');
                    }
                }
            } else {
                echo "File size is too big";
                exit();
            }
        } else {
            echo "You have an error";
            exit();
        }
    } else {
        echo "You need to upload a proper file type";
        exit();
    }
}


//*!funkcija za kompresovanje slike, pozivamo je u redu 75
function compressedImage($source, $path, $quality)
{

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $path, $quality);
}
