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
        <th><?= isset($text_table_created_by) ? $text_table_created_by : '' ?></th>
        <th><?= isset($text_table_const_in) ? $text_table_const_in : '' ?></th>
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
                <td><?= $child->getUsername() ?></td>
                <td><?= $child->getPlaceName() ?></td>
            </tr>
            <?php
        }
    }
    ?>
    </tbody>

</table>
