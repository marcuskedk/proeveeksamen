<?php

    $status = [];
    $status['error'] = [];

    if (isset($_POST['login']) === true) {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $status['error'] = 'Email er ikke gyldigt!';
        } else if (empty($_POST["email"])) {
            $status['error'] = 'Email er påkrævet!';
        } else {
            $email = mysqli_real_escape_string($con, $_POST['email']);
        }
        if (empty($_POST["password"])) {
            $status['error'] = 'Adgangskode er påkrævet!';
        } else {
            $password = mysqli_real_escape_string($con, $_POST['password']);
        }
        if (!$status['error']) {
            $CheckIfUserExistResult = mysqli_query($con, "SELECT * FROM `fta_users` WHERE `Users_Email` = '$email'");
            if ($CheckIfUserExistResult->num_rows > 0) {
                $UserDataFetch = mysqli_fetch_assoc($CheckIfUserExistResult);
                if (password_verify($password, $UserDataFetch['Users_Password'])) {
                    $_SESSION['loggedin'] = 1;
                    $_SESSION['email'] = $email;
                    header('Location: ./?page=dashboard');
                } else {
                    $status['error'] = 'Adgangskoden er forkert!';
                }
            } else {
                $status['error'] = 'Denne email eksistere ikke i databasen!';
            }
        }
    }

    if (isset($_POST['register']) === true) {
        if (!preg_match("/^[a-zA-Z -\/æ-åÆ-Å]*$/", $_POST["name"])) {
            $status['error'] = 'Navnet må kun indeholde bogstaver og mellemrum!';
        } else {
            $name = mysqli_real_escape_string($con, $_POST['name']);
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $status['error'] = 'Email er ikke gyldigt!';
        } else if (empty($_POST["email"])) {
            $status['error'] = 'Email er påkrævet!';
        } else {
            $email = mysqli_real_escape_string($con, $_POST['email']);
        }
        if (empty($_POST["password"])) {
            $status['error'] = 'Adgangskode er påkrævet!';
        } else {
            $password = mysqli_real_escape_string($con, $_POST['password']);
        }
        if (empty($_POST["rpassword"])) {
            $status['error'] = 'Gentag adgangskode er påkrævet!';
        } else {
            $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']);
        }
        if (!$status['error']) {
            $CheckIfUserExistResult = mysqli_query($con, "SELECT * FROM `fta_users` WHERE `Users_Email` = '$email'");
            if ($CheckIfUserExistResult->num_rows > 0) {
                $status['error'] = 'Denne email eksistere allerede i databasen!';
            } else {
                if ($password != $rpassword) {
                    $status['error'] = 'Adgangskoden matcher ikke gentag adgangskode!';
                } else {
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $InsertUserToDatabasenResult = mysqli_query($con, "INSERT INTO `fta_users` (`Users_Name`, `Users_Email`, `Users_Password`) VALUES ('$name', '$email', '$password')");
                    if ($InsertUserToDatabasenResult) {
                        header('Location: ./');
                    } else {
                        $status['error'] = 'Der opstod en fejl!';
                    }
                }
            }
        }
    }

    if (isset($_POST['update_abouts']) === true) {
        if (!empty($_POST['title'])) {
            $title = mysqli_real_escape_string($con, $_POST['title']);
        }
        if (!empty($_POST['content'])) {
            $content = mysqli_real_escape_string($con, $_POST['content']);
        }
        if (!empty($_POST['img'])) {
            $img = mysqli_real_escape_string($con, $_FILES['img']);
        }
        $CheckIfAboutsExistResult = mysqli_query($con, "SELECT * FROM `fta_abouts` WHERE `Abouts_ID` = '" . $_GET['id'] . "'");
        if ($CheckIfAboutsExistResult) {
            $UpdateThsiAboutResult = mysqli_query($con, "UPDATE `fta_abouts` SET `Abouts_Title` = '$title', `Abouts_Content` = '$content', `Abouts_IMG` = '$img' WHERE `Abouts_ID` = '" . $_GET['id'] . "'");
            header('Location: ./?page=manage-abouts');
        } else {
            $status['error'] = 'Der opstod en fejl under ændringen!';
        }
    }

?>