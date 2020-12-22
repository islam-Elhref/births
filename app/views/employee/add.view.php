<div class="form">
    <form method="post" enctype="application/x-www-form-urlencoded">
        <div class="form-group">
            <label for="name"><?= isset($Text_name) ? $Text_name : '' ?></label>
            <input type="text" class="form-control box" id="name" required name="name">
        </div>
        <div class="form-group">
            <label for="address"><?= isset($Text_address) ? $Text_address : '' ?></label>
            <input type="text" class="form-control box" id="address" name="address" required>
        </div>
        <div class="row">
            <div class="form-group col-4">
                <label for="age"><?= isset($Text_age) ? $Text_age : '' ?></label>
                <input type="number" class="form-control box" id="age" name="age" required min="12" max="60">
            </div>
            <div class="form-group col-4">
                <label for="salary"><?= isset($Text_salary) ? $Text_salary : '' ?></label>
                <input type="number" class="form-control box" id="salary" name="salary" min="1300" max="9000" required>
            </div>
            <div class="form-group col-4">
                <label for="tax"><?= isset($Text_tax) ? $Text_tax : '' ?></label>
                <input type="number" class="form-control box" id="tax" name="tax" min="0" max="5" step="0.01" required>
            </div>
        </div>
        <button type="submit" class="btn btn-light save" name="submit" id="submit"><?= isset($Text_add_employee) ? $Text_add_employee : '' ?></button>
    </form>
</div>
