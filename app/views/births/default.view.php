<h1 class="font-weight-bolder title"> <?= isset($Text_header) ? "$Text_header" : '' ?> </h1>

<?php
$this->GetMessage();
?>
<table id="mytable" class="table table-striped table-bordered" cellspacing="0" style="width:100%">

    <thead>
    <tr>
        <th><?= isset($text_table_name) ? $text_table_name : '' ?></th>
        <th><?= isset($text_table_const) ? $text_table_const : '' ?></th>
        <th><?= isset($text_table_dob) ? $text_table_dob : '' ?></th>
        <th><?= isset($text_table_live_in) ? $text_table_live_in : '' ?></th>
        <th><?= isset($text_table_address) ? $text_table_address : '' ?></th>

        <?php
        if (isset($ActiveUser) && $ActiveUser->getGroupId() == 1) {
            ?>
            <th><?= isset($text_table_const_in) ? $text_table_const_in : '' ?></th>
            <?php
        }
        ?>

        <th id="control"><?= isset($text_table_control) ? $text_table_control : '' ?></th>
    </tr>
    </thead>

    <tbody style="vertical-align: middle ;">
    <?php if (isset($children) && !empty($children)) {
        foreach ($children as $child) {
            ?>
            <tr>
                <td class="use_title"><?= $child->getname() ?></td>
                <td s="20"><?= $child->getconst() ?></td>
                <td><?= $child->getdob() ?></td>
                <td><?= $child->getPlaceName() ?></td>
                <td><?= $child->getAddress() ?></td>

                <?php
                if (isset($ActiveUser) && $ActiveUser->getGroupId() == 1) {
                    ?>
                    <td><?= $child->getConstIn() ?></td>
                    <?php
                }
                ?>

                <!-- control edit and delete  -->
                <?php
                if ($ActiveUser->getUserId() === $child->getCreatedBy() ){
                ?>
                <td style="text-align: center" id="control">
                    <a class="btn btn-outline-light btn-sm" href="\births\edit\<?= $child->getChildId() ?>"> <i
                                class="fa fa-user-edit"></i> <?= isset($Text_edit) ? $Text_edit : '' ?>
                    </a>
                    &nbsp;
                    <a class="btn btn-outline-danger btn-sm delete"
                       title="<?= isset($text_delete_title) ? $text_delete_title : '' ?>"
                       href="\births\delete\<?= $child->getChildId() ?>">
                        <i class="fa fa-user-times"></i> <?= isset($Text_delete) ? $Text_delete : '' ?>
                    </a>
                </td>
                <?php
                }else{
                    ?>
                    <td><?php echo isset($text_table_editor) ? $text_table_editor . $child->getUsername() : ''?></td>
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

<a class="btn btn-light btn_add" href="/births/add"><?= isset($text_add_new) ? $text_add_new : '' ?></a>
