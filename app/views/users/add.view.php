<fieldset class="scheduler-border">
    <legend class="scheduler-border"> <?= isset($legend) ? $legend : '' ?> </legend>
    <div class="form">
        <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation " novalidate>
            <div class="form-group">
                <label for="name"><?= isset($Text_name) ? $Text_name : '' ?></label>
                <input type="text" class="form-control box" id="name" required name="name">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_name) ? $invalid_msg_name : '' ?></div>
            </div>
            <div class="form-group">
                <label for="password"><?= isset($Text_password) ? $Text_password : '' ?></label>
                <input type="password" class="form-control box" id="password" required name="password" autocomplete="off">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_password) ? $invalid_msg_password : '' ?></div>
            </div>
            <div class="form-group">
                <label for="phone"><?= isset($Text_phone) ? $Text_phone : '' ?></label>
                <input type="tel" class="form-control box" id="phone" required name="phone" maxlength="11" pattern="0[0-9]{10}">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_phone) ? $invalid_msg_phone : '' ?></div>
            </div>
            <div class="form-group select_box">
                <select name="work_in" id="work_in" class="custom-select" required>
                    <option value="" disabled selected > <?= isset($Text_work_in) ? $Text_work_in : '' ?> </option>
                    <?php
                        if (isset($places) && !empty($places)){
                            foreach ($places as $place ){
                    ?>
                        <option value="<?= $place->getPlaceId() ?>"> <?= $place->getPlaceName() ?> </option>
                    <?php
                            }
                        }
                    ?>
                </select>
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_work_in) ? $invalid_msg_work_in : '' ?></div>
            </div>

            <div class="form-group select_box" >
                <select name="group" id="group" class="custom-select" required>
                    <option value="0" selected > <?= isset($Text_member) ? $Text_member : '' ?> </option>
                    <option value="1" > <?= isset($Text_admin) ? $Text_admin : '' ?> </option>
                </select>
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_group) ? $invalid_msg_group : '' ?></div>
            </div>


            <button type="submit" class="btn btn-light save" name="submit"
                    id="submit"><?= isset($Text_add_new) ? $Text_add_new : '' ?></button>
        </form>
    </div>
</fieldset>