<?php

    require './Config.php';
    require './inc/data/UserData.php';
    require './inc/data/ControllerData.php';
    require './inc/components/Head.php';
    require './inc/components/Header.php';

?>

    <section class="fta-section fta-about">
        <div class="container">
            <div class="row justify-content-center g-3">
                <div class="col-12">
                    <h4 class="bg-secondary rounded-2 text-white text-center p-3 fs-3">Om os</h4>
                </div>
                <div class="col-lg-6">
                    <p></p>
                </div>
                <div class="col-lg-6">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="fta-section fta-travels">
        <div class="container">
            <div class="row justify-content-center g-3">
                <div class="col-12">
                    <h4 class="bg-secondary rounded-2 text-white text-center p-3 fs-3">Rejsemål</h4>
                </div>
                <?php all_travels($con, "ORDER BY `Travels_Timestamp`", "travels"); ?>
            </div>
        </div>
    </section>
    <section class="fta-section fta-contact">
        <div class="container">
            <div class="row justify-content-center g-3">
                <div class="col-12">
                    <h4 class="bg-secondary rounded-2 text-white text-center p-3 fs-3">Kontakt</h4>
                </div>
                <div class="col-lg-6">
                    <p></p>
                </div>
                <div class="col-lg-6">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>

<?php require './inc/components/Footer.php'; ?>