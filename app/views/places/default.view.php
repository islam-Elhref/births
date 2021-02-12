<h1 class="font-weight-bolder title"> <?= isset($Text_header) ? "$Text_header" : '' ?> </h1>


<?php
$this->GetMessage();
?>

<table id="mytable" class="table table-striped table-bordered placestable " style="width:100%">

    <thead>
    <tr>

        <th><?= isset($text_table_username) ? $text_table_username : '' ?></th>
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
    <?php if (isset($places) && !empty($places)) {
        foreach ($places as $place) {
            ?>
            <tr>

                <td><?= $place->getPlaceName() ?></td>
                <?php
                if (isset($ActiveUser) && $ActiveUser->getGroupId() == 1) {
                    ?>
                    <td style="text-align: center">
                        <a class="btn btn-outline-light btn-sm" href="\places\edit\<?= $place->getPlaceId() ?>"> <i
                                    class="fa fa-user-edit"></i> <?= isset($Text_edit) ? $Text_edit : '' ?></a>
                        &nbsp;
                        <a class="btn btn-outline-danger btn-sm delete" href="\places\delete\<?= $place->getPlaceId() ?>">
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
    <a class="btn btn-light btn_add" href="/places/add"><?= isset($text_add_new_user) ? $text_add_new_user : '' ?></a>
    <?php
}
?>
