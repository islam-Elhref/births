<div class="container">
    <?php
    if (isset($_SESSION['message'])) {
        if (!isset($_SESSION['error'])) {
            ?>

            <div class="alert alert-success message" id="message"><?= $_SESSION['message'] ?></div>

            <?php
        } else {
            if (is_array($_SESSION['message'])) {
                foreach ($_SESSION['message'] as $message) {
                    ?>
                    <div class="alert alert-danger message" id="message"><?= $message ?></div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-danger message" id="message"><?= $_SESSION['message'] ?></div>
                <?php
            }
        }
            unset($_SESSION['message'] , $_SESSION['error']);
    }
    ?>
    <fieldset class="scheduler-border login" >
        <legend class="scheduler-border"> <?= isset($legend) ? $legend : '' ?> </legend>
        <div class="form">
            <form method="post" enctype="application/x-www-form-urlencoded" class="needs-validation " novalidate>
                <div class="form-group">
                    <label for="name"><?= isset($Text_name) ? $Text_name : '' ?></label>
                    <input type="text" class="form-control box " id="name" required name="name" maxlength="50">
                    <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                    <div class="invalid-feedback"><?= isset($invalid_msg_name) ? $invalid_msg_name : '' ?></div>
                </div>
                <div class="form-group">
                    <label for="password"><?= isset($text_table_password) ? $text_table_password : '' ?></label>
                    <input type="password" class="form-control box" id="password" required name="password" autocomplete="off">
                    <div class="valid-feedback"><?= isset($valid_msg) ? $valid_msg : '' ?> </div>
                    <div class="invalid-feedback"><?= isset($invalid_msg_password) ? $invalid_msg_password : '' ?></div>
                </div>
                <button type="submit" class="btn btn-light save" name="submit" id="submit"><?= isset($Text_login) ? $Text_login : '' ?></button>
            </form>
        </div>
    </fieldset>
    <div class="text-center change_lang">
        <a href="/language"><?= isset($Text_changeLanguage) ? $Text_changeLanguage : '' ?></a>
    </div>
</div>
