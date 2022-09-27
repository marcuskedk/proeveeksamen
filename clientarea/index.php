<?php

    require './components/Start.php';

    if (!$_GET['page'] && $_GET['type']) {
        if ($_GET['type'] == "login") {
            require './pages/register.php';
        } else if ($_GET['type'] == "register") {
            require './pages/register.php';
        } else if ($_GET['type'] == "logout") {
            session_unset();
            session_destroy();
        }
    }

    if (!$_GET['type'] && $_GET['page']) {
        if ($_GET['page'] == "dashboard") {
            require './pages/dashboard.php';
        }
    }

    require './components/End.php';

?>