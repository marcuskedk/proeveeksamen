<?php

    require '../../../Config.php';
    require '../../../inc/data/UserData.php';
    require '../../../inc/data/ControllerData.php';

    if ($_GET['checked'] == 1) {
        mysqli_query($con, "INSERT INTO `fta_newssubscription` (`Newssubscription_Name`, `Newssubscription_Email`) VALUES ('$name', '$email')");
    } else {
        mysqli_query($con, "DELETE FROM `fta_newssubscription` WHERE `Newssubscription_Email` = '$email'");
    }

?>