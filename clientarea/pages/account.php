<div class="col-lg-5">
    <div class="card rounded-1">
        <div class="card-header">
            <h5 class="mb-0">Sletning af konto</h5>
        </div>
        <form class="card-body row g-3" method="POST">
            <div class="col-12">
                <button type="submit" class="btn btn-danger rounded-1" name="delete_accounts">Slet konto</button>
            </div>
        </form>
    </div>
    <div class="card rounded-1 mt-3">
        <div class="card-header">
            <h5 class="mb-0">Nyhedsbrev</h5>
        </div>
        <form class="card-body row g-3" method="POST">
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"<?=($newssubscription == 1) ? ' checked' : ''?>>
                    <label class="form-check-label" for="flexSwitchCheckDefault"><b>Ja tak</b> til nyhedsbrev, og ...</label>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="col-lg-7">
    <div class="card rounded-1">
        <div class="card-header">
            <h5 class="mb-0">Kontooplysninger</h5>
        </div>
        <form class="card-body row g-3" method="POST">
            <div class="col-12">
                <label for="name-validate" class="form-label">Navn</label>
                <input type="text" name="name" value="<?=(isset($name)) ? $name : ''?>" id="name-validate" class="form-control rounded-1" placeholder="Navn" required>
            </div>
            <div class="col-12">
                <label for="email-validate" class="form-label">Email</label>
                <input type="email" name="email" value="<?=(isset($email)) ? $email : ''?>" id="email-validate" class="form-control rounded-1" placeholder="Email" required>
            </div>
            <div class="col-12">
                <label for="role-validate" class="form-label">Rolle</label>
                <input type="text" name="role" disabled readonly value="<?=(isset($rolename)) ? $rolename : ''?>" id="role-validate" class="form-control rounded-1" placeholder="Rolle" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-danger rounded-1" name="save_accounts">Gem</button>
            </div>
        </form>
    </div>
</div>