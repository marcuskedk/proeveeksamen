<?php

    if (isset($_SESSION['loggedin']) === true) {
        $email = $_SESSION['email'];
        $UsersResult = mysqli_query($con, "SELECT * FROM `fta_users` WHERE `Users_Email` = '$email'");
        if ($UsersResult->num_rows > 0) {
            $UsersFetch = mysqli_fetch_assoc($UsersResult);
            $name = $UsersFetch['Users_Name'];
            $roleid = $UsersFetch['Users_Role'];
            $timestamp = $UsersFetch['Users_Timestamp'];

            // NYHEDSBREV TJEK START
            $NewsSubscriptionResult = mysqli_query($con, "SELECT * FROM `fta_newssubscription` WHERE `Newssubscription_Email` = '$email'");
            if ($NewsSubscriptionResult->num_rows > 0) {
                $newssubscription = 1;
            } else {
                $newssubscription = 0;
            }
            // NYHEDSBREV TJEK END

            // ROLLE TJEK START
            $RolesResult = mysqli_query($con, "SELECT * FROM `fta_roles` WHERE `Roles_ID` = '" . $roleid . "'");
            if ($RolesResult->num_rows > 0) {
                $RolesFetch = mysqli_fetch_assoc($RolesResult);
                $rolename = $RolesFetch['Roles_Name'];
                $roleperm = $RolesFetch['Roles_Permissions'];
            }
            // ROLLE TJEK END
        }
    }

?>