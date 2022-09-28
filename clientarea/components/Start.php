<?php

    require '../Config.php';
    require '../inc/data/UserData.php';
    require '../inc/data/ControllerData.php';
    require '../inc/components/Head.php';
    require '../inc/components/Header.php'; ?>
    
    <main class="fta-clientarea">
        <div class="container">
            <div class="row justify-content-center g-3">
                <?php if (isset($_SESSION['loggedin']) === true) { ?>
                    <div class="col-lg-3">
                        <?php require './components/Sidebar.php'; ?>
                        <aside></aside>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-3">
                <?php } if (!$_GET['type'] == "register" && !$_GET['type'] == "login" && !$_GET['type'] == "logout") {
                    header('Location: ../clientarea/?type=login');
                } ?>