<?php

    require './Config.php';
    require './inc/data/UserData.php';
    require './inc/data/ControllerData.php';
    require './inc/components/Head.php';
    require './inc/components/Header.php';

?>

<main data-bs-target="#fta-navbar">
    <section class="fta-section fta-about" id="about">
        <div class="container">
            <div class="row justify-content-center g-3 mt-3">
                <div class="col-12">
                    <h2 class="bg-secondary rounded-2 text-white text-center p-3 fs-3">Om os</h2>
                </div>
                <?php all_abouts($con, "", "abouts"); // Alle om os - Findes under inc/data/functions/frontpage.functions.php ?>
            </div>
        </div>
    </section>
    <section class="fta-section fta-travels" id="products">
        <div class="container">
            <div class="row justify-content-center g-3 mt-3">
                <div class="col-12">
                    <h2 class="bg-secondary rounded-2 text-white text-center p-3 fs-3">Rejsemål</h2>
                </div>
                <?php all_travels($con, "ORDER BY `Travels_Timestamp`", "travels"); // Alle rejser - Findes under inc/data/functions/frontpage.functions.php ?>
            </div>
        </div>
    </section>
    <section class="fta-section fta-contact" id="contact">
        <div class="container">
            <div class="row justify-content-center g-3 mt-3">
                <div class="col-12">
                    <h2 class="bg-secondary rounded-2 text-white text-center p-3 fs-3">Kontakt</h2>
                </div>
                <div class="col-lg-6">
                    <h3>Kontakt informationer</h3>
                    <?php all_contacts($con, "ORDER BY `Contacts_Timestamp`", "contacts"); // Alle rejser - Findes under inc/data/functions/frontpage.functions.php ?>
                </div>
                <div class="col-lg-6">
                    <h3>Skriv til os</h3>
                    <form method="POST" class="row g-3">
                        <div class="col-12">
                            <input type="text" class="form-control rounded-1" name="name" id="name-validate" placeholder="Navn" required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control rounded-1" name="company" id="company-validate" placeholder="Firma/Organisation" required>
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control rounded-1" name="email" id="email-validate" placeholder="Email Adresse" required>
                        </div>
                        <div class="col-12">
                            <input type="number" class="form-control rounded-1" name="phonenumber" id="phonenumber-validate" placeholder="Telefon" required>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control rounded-1" name="" id="phonenumber-validate" cols="30" rows="10" placeholder="Telefon" required></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-danger rounded-1" name="send_message">Send</button>
                        </div>
                    </form>
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </section>
</main>

<?php require './inc/components/Footer.php'; ?>