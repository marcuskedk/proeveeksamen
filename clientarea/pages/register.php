<div class="col-lg-8">
    <div class="card rounded-1">
        <form method="POST" class="card-body row g-3 needs-validation" novalidate>
            <div class="col-12">
                <h1>Opret en konto</h1>
            </div>
            <?php if ($status['error']) { ?>
                <div class="col-12">
                    <?php foreach ($status as $error) { ?>
                        <div class="alert alert-danger rounded-1 py-1 px-2 mt-0 mb-0" role="alert"><?=$error?></div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="col-lg-6">
                <input type="name" name="name" id="name-validate" value="<?=(isset($_POST['name'])) ? $_POST['name'] : '';?>" placeholder="Navn" pattern="[a-zA-Z ÆØÅæøå]+" class="form-control rounded-1" required>
                <div class="valid-feedback">
                    Ser godt ud!
                </div>
                <div class="invalid-feedback">
                    Enten er feltet tomt eller må det kun indholde bogstaver og mellemrum!
                </div>
            </div>
            <div class="col-lg-6">
                <input type="email" name="email" id="email-validate" value="<?=(isset($_POST['email'])) ? $_POST['email'] : '';?>" placeholder="Email" class="form-control rounded-1" required>
                <div class="valid-feedback">
                    Ser godt ud!
                </div>
                <div class="invalid-feedback">
                    Enten er feltet tomt eller så indeholder det ikke @ og mangler en f.eks .dk eller .com!
                </div>
            </div>
            <div class="col-lg-6">
                <input type="password" name="password" id="password-validate" value="<?=(isset($_POST['password'])) ? $_POST['password'] : '';?>" pattern=".{8,}$" placeholder="Adgangskode" class="form-control rounded-1" required>
                <div class="valid-feedback">
                    Ser godt ud!
                </div>
                <div class="invalid-feedback">
                    Enten er feltet tomt eller så skal adgangskoden skal minimun være 8 lang!
                </div>
            </div>
            <div class="col-lg-6">
                <input type="password" name="rpassword" id="rpassword-validate" value="<?=(isset($_POST['rpassword'])) ? $_POST['rpassword'] : '';?>" pattern=".{8,}$" placeholder="Gentag adgangskode" class="form-control rounded-1" required>
                <div class="valid-feedback">
                    Ser godt ud!
                </div>
                <div class="invalid-feedback">
                    Enten er feltet tomt eller så skal adgangskoden skal minimun være 8 lang!
                </div>
            </div>
            <div class="col-12">
                <p class="mb-2">Har du allerede en konto? <a href="">Klik her</a></p>
                <button type="submit" class="btn btn-danger rounded-1" name="register">Opret</button>
            </div>
        </form>
    </div>
</div>