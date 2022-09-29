<?php

    ob_start();
    session_start();
    date_default_timezone_set("Europe/Copenhagen");

    $port = ":4000";

    if ($_SERVER['SERVER_NAME'] == "localhost") {
        $https = "";
    } else {
        $https = "https://";
    }
    $URL = $https . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
    echo $URL;
    if (strpos($https . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'], "inc/data/packs") !== false) {
        $URL_E = '../../..';
        $URL_A = 'notactive';
    } else if (strpos("https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], "clientarea") !== false) {
        $URL_E = '..';
        $URL_A = 'active';
    } else {
        $URL_E = '.';
        $URL_A = 'notactive';
    }

    $DB_HOSTNAME = 'localhost';
    $DB_USERNAME = 'root';
    $DB_PASSWORD = '';
    $DB_DATABASE = 'fta';

    $con = mysqli_connect($DB_HOSTNAME, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    if (!$con) {
        die("Kunne ikke tilslutte til databasen!");
    }

    $SettingsResult = mysqli_query($con, "SELECT * FROM `fta_settings`");
    if ($SettingsResult->num_rows > 0) {
        foreach ($SettingsResult as $Settings_Key => $Settings_Value) {
            if ($Settings_Value['Settings_Label'] === "title") {
                $Settings_Title = $Settings_Value['Settings_Value'];
            } if ($Settings_Value['Settings_Label'] === "description") {
                $Settings_Description = $Settings_Value['Settings_Value'];
            } if ($Settings_Value['Settings_Label'] === "logo-top") {
                $Settings_Logo_Top = $Settings_Value['Settings_Value'];
            } if ($Settings_Value['Settings_Label'] === "logo-bottom") {
                $Settings_Logo_Bottom = $Settings_Value['Settings_Value'];
            } if ($Settings_Value['Settings_Label'] === "footer-text") {
                $Settings_Footer_Text = $Settings_Value['Settings_Value'];
            } if ($Settings_Value['Settings_Label'] === "search-after") {
                $Settings_Search_After = $Settings_Value['Settings_Value'];
            }
        }
    }

?>