<?php if (isset($_GET['id'])) { ?>
    <?php $AllTravelsFetch = all_travels($con, "WHERE `Travels_ID` = '" . $_GET['id'] . "'", "manageTravelsByID"); ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere <?=$AllTravelsFetch['Travels_Title'];?> <a href="./?page=manage-travels" class="float-end">Tilbage</a></h5>
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
                    <input type="text" name="title" id="title-validate" value="<?=(isset($AllTravelsFetch['Travels_Title'])) ? $AllTravelsFetch['Travels_Title'] : $_POST['title'];?>" placeholder="Title" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="subtitle-validate" class="form-label">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle-validate" value="<?=(isset($AllTravelsFetch['Travels_Subtitle'])) ? $AllTravelsFetch['Travels_Subtitle'] : $_POST['subtitle'];?>" placeholder="Subtitle" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Subtitlen kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="content-validate" class="form-label">Beskrivelse</label>
                    <textarea name="content" id="content-validate" cols="30" rows="5" placeholder="Beskrivelse" class="form-control rounded-1" required><?=(isset($AllTravelsFetch['Travels_Content'])) ? $AllTravelsFetch['Travels_Content'] : $_POST['content'];?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="beforeimg-validate" class="form-label">Billede</label>
                    <input type="hidden" name="beforeimg" id="beforeimg-validate" value="<?=(isset($AllTravelsFetch['Travels_IMG'])) ? $AllTravelsFetch['Travels_IMG'] : $_POST['img'];?>">
                    <input type="file" name="img" id="img-validate" value="<?=(isset($_POST['img'])) ? $_POST['img'] : '';?>" placeholder="Billede" class="form-control rounded-1">
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="img-validate" class="form-label">Billedevisning</label>
                    <img src="../assets/files/img/travels/<?=$AllTravelsFetch['Travels_Country'];?>/<?=$AllTravelsFetch['Travels_IMG'];?>" width="100%" alt="">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="update_travels">Gem ændringerne</button>
                </div>
            </form>
        </div>
    </div>
<?php } else if ($_GET['page'] == "create-travels") { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Opret en ny om os <a href="./?page=manage-travels" class="float-end">Tilbage</a></h5>
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
                    <input type="text" name="title" id="title-validate" value="<?=(isset($_POST['title'])) ? $_POST['title'] : '';?>" placeholder="Title" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <textarea name="content" id="content-validate" cols="30" rows="5" placeholder="Beskrivelse" class="form-control rounded-1" required><?=(isset($_POST['content'])) ? $_POST['content'] : '';?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <input type="file" name="img" id="img-validate" value="<?=(isset($_POST['img'])) ? $_POST['img'] : '';?>" placeholder="Title" class="form-control rounded-1">
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="create_travels">Opret</button>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere rejsemål</h5>
            </div>
            <table class="table table-sm mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th class="text-end">Dato</th>
                    </tr>
                </thead>
                <tbody>
                    <?php all_travels($con, "", "manageTableTravels"); ?>
                </tbody>
                <caption class="p-2"><a href="./?page=create-travels" class="btn btn-danger btn-sm rounded-1">Opret ny rejsemål</a></caption>
            </table>
        </div>
    </div>
<?php } ?>