<?php

    if (isset($_SESSION['loggedin']) === true) {
        $email = $_SESSION['email'];
        $AccountResult = mysqli_query($con, "SELECT * FROM `fta_accounts` WHERE `Accounts_Email` = '$email'");
        if ($AccountResult->num_rows > 0) {
            $AccountFetch = mysqli_fetch_assoc($AccountResult);
            $firstname = $AccountFetch['Accounts_Firstname'];
            $lastname = $AccountFetch['Accounts_Lastname'];
            $role = $AccountFetch['Accounts_Role'];
            $timestamp = $AccountFetch['Accounts_Timestamp'];
        }
    }

?>