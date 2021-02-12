<fieldset class="scheduler-border">
    <legend class="scheduler-border"> <?= isset($legend) ? $legend : '' ?> </legend>
    <div class="form">
        <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation " novalidate>
            <div class="form-group">
                <label for="name"><?= isset($Text_name) ? $Text_name : '' ?></label>
                <input type="text" class="form-control box" id="name" required name="name">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_group_name) ? $invalid_msg_group_name : '' ?></div>
            </div>

            <?php if (isset($privileges) && !empty($privileges)): foreach ($privileges as $privilege): ?>
                <div class="checkbtn">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked value="<?= $privilege->getPrivilegeId() ?>" name="privilege[]" id="<?= $privilege->getPrivilegeId() ?>">
                        <label class="form-check-label" for="<?= $privilege->getPrivilegeId() ?>">
                            <?= $privilege->getPrivilegeName() ?>
                        </label>
                    </div>
                </div>
            <?php endforeach; endif; ?>

            <button type="submit" class="btn btn-light save" name="submit"
                    id="submit"><?= isset($Text_add_new) ? $Text_add_new : '' ?></button>
        </form>
    </div>
</fieldset>