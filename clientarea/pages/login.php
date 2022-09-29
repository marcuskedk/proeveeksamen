<div class="col-lg-8">
    <div class="card rounded-1">
        <form method="POST" class="card-body row g-3 needs-validation" novalidate>
            <div class="col-12">
                <h1>Log ind</h1>
            </div>
            <?php if ($status['error']) { ?>
                <div class="col-12">
                    <?php foreach ($status as $error) { ?>
                        <div class="alert alert-danger rounded-1 py-1 px-2 mt-0 mb-0" role="alert"><?=$error?></div>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="col-12">
                <input type="email" name="email" id="email-validate" value="<?=(isset($_POST['email'])) ? $_POST['email'] : '';?>" placeholder="Email" class="form-control rounded-1" required>
                <div class="valid-feedback">
                    Ser godt ud!
                </div>
                <div class="invalid-feedback">
                    Enten er feltet tomt eller så indeholder det ikke @ og mangler en f.eks .dk eller .com!
                </div>
            </div>
            <div class="col-12">
                <input type="password" name="password" id="password-validate" value="<?=(isset($_POST['password'])) ? $_POST['password'] : '';?>" pattern=".{8,}$" placeholder="Adgangskode" class="form-control rounded-1" required>
                <div class="valid-feedback">
                    Ser godt ud!
                </div>
                <div class="invalid-feedback">
                    Enten er feltet tomt eller så skal adgangskoden skal minimun være 8 lang!
                </div>
            </div>
            <div class="col-12">
                <p class="mb-1">Har du glemt din adgangskode? <a href="">Klik her</a></p>
                <p class="mb-2">Har du ikke en konto? <a href="">Klik her</a></p>
                <button type="submit" class="btn btn-danger rounded-1" name="login">Log ind</button>
            </div>
        </form>
    </div>
</div>