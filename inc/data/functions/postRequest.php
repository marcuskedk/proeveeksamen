<?php

    if (isset($_POST['login']) === true) {
        if (!preg_match("/^[a-zA-Z -\/æ-åÆ-Å]*$/", $_POST["name"])) {
            $name_status['error'] = 'Navnet må kun indeholde bogstaver og mellemrum!';
        } else {
            $name = mysqli_real_escape_string($con, $_POST['name']);
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_status['error'] = 'Email er ikke gyldigt!';
        } else if (empty($_POST["email"])) {
            $email_status['error'] = 'Email er påkrævet!';
        } else {
            $email = mysqli_real_escape_string($con, $_POST['email']);
        }
        if (empty($_POST["password"])) {
            $password_status['error'] = 'Adgangskode er påkrævet!';
        } else {
            $password = mysqli_real_escape_string($con, $_POST['password']);
        }
        $CheckIfUserExistResult = mysqli_query($con, "SELECT * FROM `fta_users` WHERE `Users_Email` = '$email'");
        if ($CheckIfUserExistResult->num_rows > 0) {
            $UserDataFetch = mysqli_fetch_assoc($CheckIfUserExistResult);
            if (password_verify($password, $UserDataFetch['password'])) {
                $_SESSION['loggedin'] = 1;
                header('Location: ./');
            } else {
                $status['error'] = 'Adgangskoden er forkert!';
            }
        } else {
            $status['error'] = 'Denne email eksistere ikke i databasen!';
        }
    }

    if (isset($_POST['register']) === true) {
        if (!preg_match("/^[a-zA-Z -\/æ-åÆ-Å]*$/", $_POST["name"])) {
            $name_status['error'] = 'Navnet må kun indeholde bogstaver og mellemrum!';
        } else {
            $name = mysqli_real_escape_string($con, $_POST['name']);
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_status['error'] = 'Email er ikke gyldigt!';
        } else if (empty($_POST["email"])) {
            $email_status['error'] = 'Email er påkrævet!';
        } else {
            $email = mysqli_real_escape_string($con, $_POST['email']);
        }
        if (empty($_POST["password"])) {
            $password_status['error'] = 'Adgangskode er påkrævet!';
        } else {
            $password = mysqli_real_escape_string($con, $_POST['password']);
        }
        if (empty($_POST["rpassword"])) {
            $rpassword_status['error'] = 'Gentag adgangskode er påkrævet!';
        } else {
            $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']);
        }
        $CheckIfUserExistResult = mysqli_query($con, "SELECT * FROM `fta_users` WHERE `Users_Email` = '$email'");
        if ($CheckIfUserExistResult->num_rows > 0) {
            $status['error'] = 'Denne email eksistere allerede i databasen!';
        } else {
            $UserDataFetch = mysqli_fetch_assoc($CheckIfUserExistResult);
            if (password_verify($password, $UserDataFetch['password'])) {
                $_SESSION['loggedin'] = 1;
                header('Location: ./');
            } else {
                $status['error'] = 'Adgangskoden er forkert!';
            }
        }
    }

?>