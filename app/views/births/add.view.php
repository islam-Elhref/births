<fieldset class="scheduler-border">
    <legend class="scheduler-border"> <?= isset($legend) ? $legend : '' ?> </legend>
    <div class="form">
        <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="name" class="active"><?= isset($Text_name) ? $Text_name : '' ?></label>
                <input type="text" class="form-control box" id="name" required name="name" autofocus >
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_name) ? $invalid_msg_name : '' ?></div>
            </div> <!-- name -->
            <div class="form-group">
                <label for="password"><?= isset($Text_const) ? $Text_const : '' ?></label>
                <input type="number" class="form-control box" id="const" required name="const" autocomplete="off">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_const) ? $invalid_msg_const : '' ?></div>
            </div> <!-- password -->

            <div class="form-group" id="sandbox-container">
                <label for="dob" class="active"><?= isset($Text_dob) ? $Text_dob : '' ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                    <input type="text" data-date="date" class="form-control box" id="dob" required name="dob">
                    <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                    <div class="invalid-feedback"><?= isset($invalid_msg_dob) ? $invalid_msg_dob : '' ?></div>
                </div>
            </div> <!-- input date -->

            <div class="form-group">
                <label for="phone"><?= isset($Text_phone) ? $Text_phone : '' ?></label>
                <input type="tel" class="form-control box" id="phone" required name="phone" maxlength="11" pattern="0[0-9]{10}">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_phone) ? $invalid_msg_phone : '' ?></div>
            </div> <!-- phone -->
            <div class="form-group select_box">
                <select name="born_in" id="born_in" class="custom-select" required>
                    <option value="" disabled selected > <?= isset($Text_born_in) ? $Text_born_in : '' ?> </option>
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
                <div class="invalid-feedback"><?= isset($invalid_msg_born_in) ? $invalid_msg_born_in : '' ?></div>
            </div> <!-- select places -->
            <div class="form-group">
                <label for="address"><?= isset($Text_address) ? $Text_address : '' ?></label>
                <input type="text" class="form-control box" id="address" required name="address">
                <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                <div class="invalid-feedback"><?= isset($invalid_msg_address) ? $invalid_msg_address : '' ?></div>
            </div> <!-- address -->


            <button type="submit" class="btn btn-light save" name="submit"
                    id="submit"><?= isset($Text_add_new) ? $Text_add_new : '' ?></button>
        </form>
    </div>
</fieldset>