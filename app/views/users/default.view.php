<h1 class="font-weight-bolder title"> <?= isset($Text_header) ? "$Text_header" : '' ?> </h1>


<?php
$this->GetMessage();
?>

<table id="mytable" class="table table-striped table-bordered" style="width:100%">

    <thead>
    <tr>
        <th><?= isset($text_table_username) ? $text_table_username : '' ?></th>
        <th><?= isset($text_table_phone) ? $text_table_phone : '' ?></th>
        <th><?= isset($text_table_group) ? $text_table_group : '' ?></th>
        <th><?= isset($text_table_work_in) ? $text_table_work_in : '' ?></th>
        <?php
        if (isset($ActiveUser) && $ActiveUser->getGroupId() == 1) {
            ?>
            <th><?= isset($text_table_control) ? $text_table_control : '' ?></th>
            <?php
        }
        ?>
    </tr>
    </thead>
    <tbody style="vertical-align: middle ;">
    <?php if (isset($users) && !empty($users)) {
        foreach ($users as $user) {
            ?>
            <tr>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getPhone() ?></td>
                <td><?= $user->getGroupName() ?></td>
                <td><?= $user->getPlaceName() ?></td>
                <?php
                if (isset($ActiveUser) && $ActiveUser->getGroupId() == 1) {
                    ?>
                    <td style="text-align: center">
                        <a class="btn btn-outline-light btn-sm" href="\users\edit\<?= $user->getUserId() ?>"> <i
                                    class="fa fa-user-edit"></i> <?= isset($Text_edit) ? $Text_edit : '' ?></a>
                        &nbsp;
                        <a class="btn btn-outline-danger btn-sm delete" href="\users\delete\<?= $user->getUserId() ?>">
                            <i class="fa fa-user-times"></i> <?= isset($Text_delete) ? $Text_delete : '' ?></a>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>

</table>

<?php
if (isset($ActiveUser) && $ActiveUser->getGroupId() == 1) {
    ?>
    <a class="btn btn-light btn_add" href="/users/add"><?= isset($text_add_new_user) ? $text_add_new_user : '' ?></a>
    <?php
}
?>
