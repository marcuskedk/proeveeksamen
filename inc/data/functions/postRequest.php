<?php

    $status = [];
    $status['error'] = [];

    // SEARCH START
    if (isset($_POST['searchnow']) === true) {
        $search = mysqli_real_escape_string($con, $_POST['search']);
        header('Location: ' . $URL_E . '/?search=' . $search . '#travels');
    }
    // SEARCH END

    // LOGIN START
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
                    if ($_POST['type'] === "rating") {
                        header('Location: ./?type=rating&id=' . $_POST['id']);
                    } else {
                        header('Location: ./?page=dashboard');
                    }
                } else {
                    $status['error'] = 'Adgangskoden er forkert!';
                }
            } else {
                $status['error'] = 'Denne email eksistere ikke i databasen!';
            }
        }
    }
    // LOGIN END

    // REGISTER START
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
    // REGISTER END

    // TRAVELS START
    if (isset($_POST['create_travels']) === true) {
        if (!empty($_POST['title'])) {
            $title = mysqli_real_escape_string($con, $_POST['title']);
        }
        if (!empty($_POST['subtitle'])) {
            $subtitle = mysqli_real_escape_string($con, $_POST['subtitle']);
        }
        if (!empty($_POST['content'])) {
            $content = mysqli_real_escape_string($con, $_POST['content']);
        }
        if (!empty($_POST['roomtype'])) {
            $roomtype = mysqli_real_escape_string($con, $_POST['roomtype']);
        }
        if (!empty($_POST['date'])) {
            $date = mysqli_real_escape_string($con, $_POST['date']);
        }
        if (!empty($_POST['duration'])) {
            $duration = mysqli_real_escape_string($con, $_POST['duration']);
        }
        if (!empty($_POST['minprice'])) {
            $minprice = mysqli_real_escape_string($con, $_POST['minprice']);
        }
        if (!empty($_POST['maxprice'])) {
            $maxprice = mysqli_real_escape_string($con, $_POST['maxprice']);
        }
        if (!empty($_POST['rating'])) {
            $rating = mysqli_real_escape_string($con, $_POST['rating']);
        }
        if (!empty($_POST['country'])) {
            $country = mysqli_real_escape_string($con, $_POST['country']);
        }
        $img = $_FILES['img'];
        if (!empty($img['name'])) {
            $image_type = exif_imagetype($img["tmp_name"]);
            if (!$image_type) {
                $status['error'] = "Denne fil er ikke et billede";
            } else {
                $image_extension = image_type_to_extension($image_type, true);
                $image_name = bin2hex(random_bytes(16)) . $image_extension;
                $uploadImage = move_uploaded_file($img["tmp_name"], "../assets/files/img/" . $country . "/" . $image_name);
                if (!$uploadImage) {
                    $status['error'] = "Der opstod en fejl med at uploade billedet. Prøv igen!";
                }
            }
        } else {
            $image_name = "nopicture.png";
        }
        $CheckIfTravelsExistResult = mysqli_query($con, "SELECT * FROM `fta_travels` WHERE `Travels_Title` = '$title'");
        if (!$CheckIfTravelsExistResult->num_rows > 0) {
            $InsertThisTravelsResult = mysqli_query($con, "INSERT INTO `fta_travels` (`Travels_Title`, `Travels_Subtitle`, `Abouts_Content`, `Travels_RoomType`, `Travels_Date`, `Travels_MinPrice`, `Travels_MaxPrice`, `Travels_Ratings`, `Travels_IMG`, `Travels_Country`) VALUES ('$title', '$subtitle', '$content', '$roomtype', '$date', '$duration', '$minprice', '$maxprice', '$rating', '$img', '$country')");
            if ($InsertThisTravelsResult) {
                header('Location: ./?page=manage-travels');
            } else {
                $status['error'] = 'Der opstod en fejl under ændringen!';
            }
        } else {
            $status['error'] = 'Denne om os eksistere ikke!';
        }
    }

    if (isset($_POST['delete_travels']) === true) {

    }
    // TRAVELS END

    // ABOUTS START
    if (isset($_POST['create_abouts']) === true) {
        if (!empty($_POST['title'])) {
            $title = mysqli_real_escape_string($con, $_POST['title']);
        }
        if (!empty($_POST['content'])) {
            $content = mysqli_real_escape_string($con, $_POST['content']);
        }
        $img = $_FILES['img'];
        if (!empty($img['name'])) {
            $image_type = exif_imagetype($img["tmp_name"]);
            if (!$image_type) {
                $status['error'] = "Denne fil er ikke et billede";
            } else {
                $image_extension = image_type_to_extension($image_type, true);
                $image_name = bin2hex(random_bytes(16)) . $image_extension;
                $uploadImage = move_uploaded_file($img["tmp_name"], "../assets/files/img/abouts/" . $image_name);
                if (!$uploadImage) {
                    $status['error'] = "Der opstod en fejl med at uploade billedet. Prøv igen!";
                }
            }
        } else {
            $image_name = "nopicture.png";
        }
        $CheckIfAboutsExistResult = mysqli_query($con, "SELECT * FROM `fta_abouts` WHERE `Abouts_Title` = '$title'");
        if (!$CheckIfAboutsExistResult->num_rows > 0) {
            $InsertThisAboutResult = mysqli_query($con, "INSERT INTO `fta_abouts` (`Abouts_Title`, `Abouts_Content`, `Abouts_IMG`) VALUES ('$title', '$content', '$image_name')");
            if ($InsertThisAboutResult) {
                header('Location: ./?page=manage-abouts');
            } else {
                $status['error'] = 'Der opstod en fejl under ændringen!';
            }
        } else {
            $status['error'] = 'Denne om os eksistere ikke!';
        }
    }

    if (isset($_POST['update_abouts']) === true) {
        if (!empty($_POST['title'])) {
            $title = mysqli_real_escape_string($con, $_POST['title']);
        }
        if (!empty($_POST['content'])) {
            $content = mysqli_real_escape_string($con, $_POST['content']);
        }
        $img = $_FILES['img'];
        if (!empty($img['name'])) {
            $image_type = exif_imagetype($img["tmp_name"]);
            if (!$image_type) {
                $status['error'] = "Denne fil er ikke et billede";
            } else {
                $image_extension = image_type_to_extension($image_type, true);
                $image_name = bin2hex(random_bytes(16)) . $image_extension;
                $uploadImage = move_uploaded_file($img["tmp_name"], "../assets/files/img/abouts/" . $image_name);
                if (!$uploadImage) {
                    $status['error'] = "Der opstod en fejl med at uploade billedet. Prøv igen!";
                }
            }
        } else {
            $image_name = mysqli_real_escape_string($con, $_POST['beforeimg']);
        }
        $CheckIfAboutsExistResult = mysqli_query($con, "SELECT * FROM `fta_abouts` WHERE `Abouts_ID` = '" . $_GET['id'] . "'");
        if ($CheckIfAboutsExistResult) {
            $UpdateThsiAboutResult = mysqli_query($con, "UPDATE `fta_abouts` SET `Abouts_Title` = '$title', `Abouts_Content` = '$content', `Abouts_IMG` = '$image_name' WHERE `Abouts_ID` = '" . $_GET['id'] . "'");
            header('Location: ./?page=manage-abouts');
        } else {
            $status['error'] = 'Der opstod en fejl under ændringen!';
        }
    }
    // ABOUTS END

    // SETTINGS START
    if (isset($_POST['create_settings']) === true) {
        if (!empty($_POST['label'])) {
            $label = mysqli_real_escape_string($con, $_POST['label']);
        }
        if (!empty($_POST['value'])) {
            $value = mysqli_real_escape_string($con, $_POST['value']);
        }
        $CheckIfSettingsExistResult = mysqli_query($con, "SELECT * FROM `fta_settings` WHERE `Settings_Label` = '$label'");
        if (!$CheckIfSettingsExistResult->num_rows > 0) {
            $InsertThisSettingsResult = mysqli_query($con, "INSERT INTO `fta_settings` (`Settings_Label`, `Settings_Value`) VALUES ('$label', '$value')");
            if ($InsertThisSettingsResult) {
                header('Location: ./?page=manage-settings');
            } else {
                $status['error'] = 'Der opstod en fejl under ændringen!';
            }
        } else {
            $status['error'] = 'Denne indstilling eksistere allerede!';
        }
    }

    if (isset($_POST['update_settings']) === true) {
        if (!empty($_POST['label'])) {
            $label = mysqli_real_escape_string($con, $_POST['label']);
        }
        if (!empty($_POST['value'])) {
            $value = mysqli_real_escape_string($con, $_POST['value']);
        }
        $CheckIfSettingsExistResult = mysqli_query($con, "SELECT * FROM `fta_settings` WHERE `Settings_ID` = '" . $_GET['id'] . "'");
        if ($CheckIfSettingsExistResult) {
            $UpdateThsiSettingsResult = mysqli_query($con, "UPDATE `fta_settings` SET `Settings_Label` = '$label', `Settings_Value` = '$value' WHERE `Settings_ID` = '" . $_GET['id'] . "'");
            if ($UpdateThsiSettingsResult) {
                header('Location: ./?page=manage-settings');
            } else {
                $status['error'] = 'Der opstod en fejl under ændringen!';
            }
        } else {
            $status['error'] = 'Denne indstilling eksistere ikke!';
        }
    }
    // SETTINGS END

    if (isset($_POST['delete_this']) === true) {
        $type = mysqli_real_escape_string($con, $_POST['type']);
        if (mysqli_query($con, "DELETE FROM `fta_$type` WHERE `" . ucfirst($type) . "_ID` = '" . $_POST['delete_this'] . "'")) {
            header('Location: ./?page=manage-' . $type);
        } else {
            $status['error'] = "Der opstod en fejl under sletningen, prøv igen!";
        }
    }

?>