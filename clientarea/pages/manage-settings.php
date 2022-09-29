<?php if (isset($_GET['id'])) { ?>
    <?php $AllSettingsFetch = all_settings($con, "WHERE `Settings_ID` = '" . $_GET['id'] . "'", "manageSettingsByID"); ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere <?=$AllSettingsFetch['Settings_Label'];?> <a href="./?page=manage-settings" class="float-end">Tilbage</a></h5>
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
                    <label for="label-validate" class="form-label">Label</label>
                    <input type="text" name="label" id="label-validate" value="<?=(isset($AllSettingsFetch['Settings_Label'])) ? $AllSettingsFetch['Settings_Label'] : $_POST['label'];?>" placeholder="Label" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Label kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="value-validate" class="form-label">Value</label>
                    <textarea name="value" id="value-validate" cols="30" rows="5" placeholder="Value" class="form-control rounded-1" required><?=(isset($AllSettingsFetch['Settings_Value'])) ? $AllSettingsFetch['Settings_Value'] : $_POST['value'];?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Value kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="update_settings">Gem ændringerne</button>
                </div>
            </form>
        </div>
    </div>
<?php } else if ($_GET['page'] == "create-settings") { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Opret en ny indstilling <a href="./?page=manage-settings" class="float-end">Tilbage</a></h5>
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
                    <label for="label-validate" class="form-label">Label</label>
                    <input type="text" name="label" id="label-validate" value="<?=(isset($_POST['label'])) ? $_POST['label'] : '';?>" placeholder="Label" class="form-control rounded-1" required>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Label kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <label for="value-validate" class="form-label">Value</label>
                    <textarea name="value" id="value-validate" cols="30" rows="5" placeholder="Value" class="form-control rounded-1" required><?=(isset($_POST['value'])) ? $_POST['value'] : '';?></textarea>
                    <div class="valid-feedback">
                        Ser godt ud!
                    </div>
                    <div class="invalid-feedback">
                        Value kan ikke være tom!
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-danger rounded-1" name="create_settings">Opret</button>
                </div>
            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="col-12">
        <div class="card rounded-1">
            <div class="card-header">
                <h5 class="mb-0">Administrere indstillinger</h5>
            </div>
            <table class="table table-sm mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Label</th>
                        <th>Value</th>
                        <th>Dato</th>
                        <th class="text-end"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php all_settings($con, "", "manageTableSettings"); ?>
                </tbody>
                <caption class="p-2"><a href="./?page=create-settings" class="btn btn-danger btn-sm rounded-1">Opret ny indstilling</a></caption>
            </table>
        </div>
    </div>
<?php } ?>