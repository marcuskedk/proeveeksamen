<?php if (isset($_GET['id'])) { ?>
    <?php $AllContactsFetch = all_contacts($con, "WHERE `Contacts_ID` = '" . $_GET['id'] . "'", "manageContactsByID"); ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere <?=$AllContactsFetch['Contacts_Content'];?> <a href="./?page=manage-contacts" class="float-end">Tilbage</a></h5>
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
                    <label for="content-validate" class="form-label">Beskrivelse</label>
                    <textarea name="content" id="content-validate" cols="30" rows="5" placeholder="Beskrivelse" class="form-control rounded-1" required><?=(isset($AllContactsFetch['Contacts_Content'])) ? $AllContactsFetch['Contacts_Content'] : $_POST['content'];?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="update_contacts">Gem ændringerne</button>
                </div>
            </form>
        </div>
    </div>
<?php } else if ($_GET['page'] == "create-contacts") { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Opret en rejsemål <a href="./?page=manage-contacts" class="float-end">Tilbage</a></h5>
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
                    <label for="title-validate" class="form-label">Title</label>
                    <input type="text" name="title" id="title-validate" value="<?=(isset($_POST['title'])) ? $_POST['title'] : '';?>" placeholder="Title" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="subtitle-validate" class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle-validate" value="<?=(isset($_POST['subtitle'])) ? $_POST['subtitle'] : '';?>" placeholder="Subtitle" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="content-validate" class="form-label">Beskrivelse</label>
                    <textarea name="content" id="content-validate" cols="30" rows="5" placeholder="Beskrivelse" class="form-control rounded-1" required><?=(isset($_POST['content'])) ? $_POST['content'] : '';?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="roomtype-validate" class="form-label">Værelsestype</label>
                    <textarea name="roomtype" id="roomtype-validate" cols="30" rows="5" placeholder="Værelsestype" class="form-control rounded-1" required><?=(isset($_POST['roomtype'])) ? $_POST['roomtype'] : '';?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="date-validate" class="form-label">Dato</label>
                    <input type="date" name="date" id="date-validate" value="<?=(isset($_POST['date'])) ? $_POST['date'] : '';?>" placeholder="Dato" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="duration-validate" class="form-label">Varighed</label>
                    <input type="text" name="duration" id="duration-validate" value="<?=(isset($_POST['duration'])) ? $_POST['duration'] : '';?>" placeholder="Varighed" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="minprice-validate" class="form-label">Min pris</label>
                    <input type="number" name="minprice" id="minprice-validate" value="<?=(isset($_POST['minprice'])) ? $_POST['minprice'] : '';?>" placeholder="Min pris" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="maxprice-validate" class="form-label">Max pris</label>
                    <input type="number" name="maxprice" id="maxprice-validate" value="<?=(isset($_POST['maxprice'])) ? $_POST['maxprice'] : '';?>" placeholder="Max pris" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="rating-validate" class="form-label">Anmeldelser</label>
                    <input type="text" name="rating" id="rating-validate" value="<?=(isset($_POST['rating'])) ? $_POST['rating'] : '';?>" placeholder="Anmeldelser" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="country-validate" class="form-label">Land</label>
                    <input type="text" name="country" id="country-validate" value="<?=(isset($_POST['country'])) ? $_POST['country'] : '';?>" placeholder="Land" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="img-validate" class="form-label">Billede</label>
                    <input type="file" name="img" id="img-validate" value="<?=(isset($_POST['img'])) ? $_POST['img'] : '';?>" placeholder="Title" class="form-control rounded-1">
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="create_contacts">Opret</button>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere kontakt oplysninger</h5>
            </div>
            <table class="table table-sm mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Content</th>
                        <th>Dato</th>
                        <th class="text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php all_contacts($con, "", "manageTableContacts"); ?>
                </tbody>
                <caption class="p-2"><a href="./?page=create-contacts" class="btn btn-danger btn-sm rounded-1">Opret ny kontakt text</a></caption>
            </table>
        </div>
    </div>
<?php } ?>