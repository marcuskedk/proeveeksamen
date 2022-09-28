<div class="col-lg-8">
    <div class="card rounded-1">
        <form method="POST" class="card-body row g-3">
            <div class="col-12">
                <h1>Opret en konto</h1>
            </div>
            <div class="col-lg-6">
                <input type="name" name="name" id="name-validate" value="<?=(isset($_POST['name'])) ? $_POST['name'] : '';?>" placeholder="Navn" class="form-control rounded-1" required>
            </div>
            <div class="col-lg-6">
                <input type="email" name="email" id="email-validate" value="<?=(isset($_POST['email'])) ? $_POST['email'] : '';?>" placeholder="Email" class="form-control rounded-1" required>
            </div>
            <div class="col-lg-6">
                <input type="password" name="password" id="password-validate" value="<?=(isset($_POST['password'])) ? $_POST['password'] : '';?>" placeholder="Adgangskode" class="form-control rounded-1" required>
            </div>
            <div class="col-lg-6">
                <input type="password" name="rpassword" id="rpassword-validate" value="<?=(isset($_POST['rpassword'])) ? $_POST['rpassword'] : '';?>" placeholder="Gentag adgangskode" class="form-control rounded-1" required>
            </div>
            <div class="col-12">
                <p class="mb-2">Har du allerede en konto? <a href="">Klik her</a></p>
                <button type="submit" class="btn btn-danger rounded-1" name="register">Opret</button>
            </div>
        </form>
    </div>
</div>