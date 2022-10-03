<?php if (isset($_GET['id'])) { ?>
    <?php $AllUsersFetch = all_users($con, "WHERE `Users_ID` = '" . $_GET['id'] . "'", "manageUsersByID"); ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere <?=$AllUsersFetch['Users_Name'];?> <a href="./?page=manage-users" class="float-end">Tilbage</a></h5>
            </div>
            <form method="POST" class="card-body row g-3 needs-validation" novalidate enctype="multipart/form-data">
                <?php if ($status['error']) { ?>
                    <div class="col-12">
                        <?php foreach ($status as $error) { ?>
                            <div class="alert alert-danger rounded-1 py-1 px-2 mt-0 mb-0" role="alert"><?=$error?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="col-12">
                    <label for="name-validate" class="form-label">Navn</label>
                    <input type="text" name="name" id="name-validate" value="<?=(isset($AllUsersFetch['Users_Name'])) ? $AllUsersFetch['Users_Name'] : $_POST['name'];?>" placeholder="Navn" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Navn kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="email-validate" class="form-label">Email</label>
                    <input type="email" name="email" id="email-validate" value="<?=(isset($AllUsersFetch['Users_Email'])) ? $AllUsersFetch['Users_Email'] : $_POST['email'];?>" placeholder="Email" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Email kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="update_users">Gem ændringerne</button>
                </div>
            </form>
        </div>
    </div>
<?php } else if ($_GET['page'] == "create-users") { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Opret en konto <a href="./?page=manage-users" class="float-end">Tilbage</a></h5>
            </div>
            <form method="POST" class="card-body row g-3 needs-validation" novalidate enctype="multipart/form-data">
                <?php if ($status['error']) { ?>
                    <div class="col-12">
                        <?php foreach ($status as $error) { ?>
                            <div class="alert alert-danger rounded-1 py-1 px-2 mt-0 mb-0" role="alert"><?=$error?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="col-12">
                    <label for="title-validate" class="form-label">Navn</label>
                    <input type="text" name="title" id="title-validate" value="<?=(isset($_POST['title'])) ? $_POST['title'] : '';?>" placeholder="Title" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="subtitle-validate" class="form-label">Email</label>
                    <input type="text" name="subtitle" id="subtitle-validate" value="<?=(isset($_POST['subtitle'])) ? $_POST['subtitle'] : '';?>" placeholder="Subtitle" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="subtitle-validate" class="form-label">Rolle</label>
                    <input type="text" name="subtitle" id="subtitle-validate" value="<?=(isset($_POST['subtitle'])) ? $_POST['subtitle'] : '';?>" placeholder="Subtitle" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="create_users">Opret</button>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere kontoer</h5>
            </div>
            <table class="table table-sm mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Navn</th>
                        <th>Email</th>
                        <th>Dato</th>
                        <th class="text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php all_users($con, "", "manageTableUsers"); ?>
                </tbody>
                <caption class="p-2"><a href="./?page=create-users" class="btn btn-danger btn-sm rounded-1">Opret ny konto</a></caption>
            </table>
        </div>
    </div>
<?php } ?>