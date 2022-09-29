<?php if (isset($_GET['id'])) { ?>
    <?php $AllAboutsFetch = all_abouts($con, "WHERE `Abouts_ID` = '" . $_GET['id'] . "'", "manageAboutsByID"); ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere <?=$AllAboutsFetch['Abouts_Title'];?> <a href="./?page=manage-abouts" class="float-end">Tilbage</a></h5>
            </div>
            <form method="POST" class="card-body row g-3 needs-validation" novalidate>
                <?php if ($status['error']) { ?>
                    <div class="col-12">
                        <?php foreach ($status as $error) { ?>
                            <div class="alert alert-danger rounded-1 py-1 px-2 mt-0 mb-0" role="alert"><?=$error?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="col-12">
                    <input type="text" name="title" id="title-validate" value="<?=(isset($AllAboutsFetch['Abouts_Title'])) ? $AllAboutsFetch['Abouts_Title'] : $_POST['title'];?>" placeholder="Title" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <textarea name="content" id="content-validate" cols="30" rows="5" placeholder="Beskrivelse" class="form-control rounded-1" required><?=(isset($AllAboutsFetch['Abouts_Content'])) ? $AllAboutsFetch['Abouts_Content'] : $_POST['content'];?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="beforeimg" id="beforeimg-validate" value="<?=(isset($AllAboutsFetch['Abouts_IMG'])) ? $AllAboutsFetch['Abouts_IMG'] : $_POST['img'];?>">
                    <input type="file" name="img" id="img-validate" value="<?=(isset($_POST['img'])) ? $_POST['img'] : '';?>" placeholder="Billede" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <img src="../assets/files/img/abouts/<?=$AllAboutsFetch['Abouts_IMG'];?>" width="100%" alt="">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="update_abouts">Gem ændringerne</button>
                </div>
            </form>
        </div>
    </div>
<?php } else if ($_GET['page'] == "create-abouts") { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Opret en ny om os <a href="./?page=manage-abouts" class="float-end">Tilbage</a></h5>
            </div>
            <form method="POST" class="card-body row g-3 needs-validation" novalidate>
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
                    <input type="file" name="img" id="img-validate" value="<?=(isset($_POST['img'])) ? $_POST['img'] : '';?>" placeholder="Title" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Title kan ikke være tom!
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere om os</h5>
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
                    <?php all_abouts($con, "", "manageTableAbouts"); ?>
                </tbody>
                <caption class="p-2"><a href="./?page=create-abouts" class="btn btn-danger btn-sm rounded-1">Opret ny om os</a></caption>
            </table>
        </div>
    </div>
<?php } ?>