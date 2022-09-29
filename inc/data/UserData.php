<?php

    if (isset($_SESSION['loggedin']) === true) {
        $email = $_SESSION['email'];
        $UsersResult = mysqli_query($con, "SELECT * FROM `fta_users` WHERE `Users_Email` = '$email'");
        if ($UsersResult->num_rows > 0) {
            $UsersFetch = mysqli_fetch_assoc($UsersResult);
            $name = $UsersFetch['Users_Name'];
            $role = $UsersFetch['Users_Role'];
            $timestamp = $UsersFetch['Users_Timestamp'];
        }
    }

?>