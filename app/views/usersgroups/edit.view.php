<fieldset>
    <legend><?= isset($legend) ? $legend : '' ?></legend>

    <div class="form">
        <form method="post" enctype="application/x-www-form-urlencoded" novalidate class="needs-validation was-validated">

                <div class="form-group">
                    <label for="name"><?= isset($Text_name) ? $Text_name : '' ?></label>
                    <input type="text" class="form-control box" id="name" name="name" required
                           value="<?= isset($usergroup) ? $usergroup->getGroupName() : '' ?>">
                    <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                    <div class="invalid-feedback"><?= isset($invalid_msg_group_name) ? $invalid_msg_group_name : '' ?></div>
                </div>

            <button type="submit" class="btn btn-light save" name="submit" id="submit"><?= isset($Text_add_new) ? $Text_add_new : '' ?></button>
        </form>
    </div>
    

</fieldset>