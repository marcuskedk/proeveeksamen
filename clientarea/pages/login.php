<div class="col-lg-8">
    <div class="card rounded-1">
        <form method="POST" class="card-body row g-3">
            <div class="col-12">
                <h1>Log ind</h1>
            </div>
            <div class="col-12">
                <input type="email" name="email" id="email-validate" value="<?=(isset($_POST['email'])) ? $_POST['email'] : '';?>" placeholder="Email" class="form-control rounded-1" required>
            </div>
            <div class="col-12">
                <input type="password" name="password" id="password-validate" value="<?=(isset($_POST['password'])) ? $_POST['password'] : '';?>" placeholder="Adgangskode" class="form-control rounded-1" required>
            </div>
            <div class="col-12">
                <p class="mb-1">Har du glemt din adgangskode? <a href="">Klik her</a></p>
                <p class="mb-2">Har du ikke en konto? <a href="">Klik her</a></p>
                <button type="submit" class="btn btn-danger rounded-1" name="login">Log ind</button>
            </div>
        </form>
    </div>
</div>