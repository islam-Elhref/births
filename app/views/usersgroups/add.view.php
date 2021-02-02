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
            <div class="checkbtn">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        ادمن
                    </label>
                </div>
            </div>
            <div class="checkbtn">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        ادمن
                    </label>
                </div>
            </div>
            <div class="checkbtn">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                    <label class="form-check-label" for="flexCheckDefault2">
                        ادمن
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-light save" name="submit" id="submit"><?= isset($Text_add_new) ? $Text_add_new : '' ?></button>
        </form>
    </div>
</fieldset>