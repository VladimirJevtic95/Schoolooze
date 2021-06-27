<?php

include "connection/connection.logic.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nesto</title>
</head>

<body>

    <div>
        <?php
        $sql = "SELECT * FROM user WHERE role_id = 1";
        if ($rezultat = mysqli_query($conn, $sql))
            while ($row = mysqli_fetch_object($rezultat)) {
        ?>

            <ul>
                <li>
                    <p><?php echo $row->first_name ?>, <?php echo $row->surname ?> - <?php echo $row->birthdate ?><br>
                        <?php echo $row->jmbg ?> , <?php echo $row->id_number ?><br>
                        <?php echo $row->username ?>, <?php echo $row->email ?> </p>
                </li>
            </ul>

        <?php
            } ?>

</body>

</html>