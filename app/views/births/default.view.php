<h1 class="font-weight-bolder title"> <?= isset($Text_header) ? "$Text_header" : '' ?> </h1>

<?php
$this->GetMessage();
?>

<table id="mytable" class="table table-striped table-bordered" style="width:100%">

    <thead>
    <tr>
        <th><?= isset($text_table_name) ? $text_table_name : '' ?></th>
        <th><?= isset($text_table_const) ? $text_table_const : '' ?></th>
        <th><?= isset($text_table_dob) ? $text_table_dob : '' ?></th>
        <th><?= isset($text_table_live_in) ? $text_table_live_in : '' ?></th>
        <th><?= isset($text_table_address) ? $text_table_address : '' ?></th>
        <th><?= isset($text_table_control) ? $text_table_control : '' ?></th>
    </tr>
    </thead>

    <tbody style="vertical-align: middle ;">
    <?php if (isset($children) && !empty($children)) {
        foreach ($children as $child) {
            ?>
            <tr>
                <td class="use_title"><?= $child->getname() ?></td>
                <td><?= $child->getconst() ?></td>
                <td><?= $child->getdob() ?></td>
                <td><?= $child->getPlaceName() ?></td>
                <td><?= $child->getAddress() ?></td>
                <!-- control edit and delete  -->
                <td style="text-align: center">
                    <a class="btn btn-outline-light btn-sm" href="\privileges\edit\<?= $child->getChildId() ?>"> <i
                                class="fa fa-user-edit"></i> <?= isset($Text_edit) ? $Text_edit : '' ?>
                    </a>
                    &nbsp;
                    <a class="btn btn-outline-danger btn-sm delete" title="<?= isset($text_delete_title) ? $text_delete_title : '' ?>"
                       href="\privileges\delete\<?= $child->getChildId() ?>">
                        <i class="fa fa-user-times"></i> <?= isset($Text_delete) ? $Text_delete : '' ?>
                    </a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>

</table>

<a class="btn btn-light btn_add" href="/births/add"><?= isset($text_add_new) ? $text_add_new : '' ?></a>
