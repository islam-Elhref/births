<h1 class="font-weight-bolder text-center title"> <?= isset($Text_title) ? "$Text_title" : '' ?> </h1>
<?php
$this->GetMessage();
?>

<div class="row">
    <div class="col-md-4">
        <div class="dbox dbox--color-1">
            <div class="dbox__icon">
                <i class="glyphicon glyphicon-cloud"></i>
            </div>
            <div class="dbox__body">
                <span class="dbox__count"> <?= isset($countAll) ? $countAll->getcountplaces() : '' ?></span>
                <span class="dbox__title"><?= isset($text_count_places) ? $text_count_places : '' ?></span>
            </div>

            <div class="dbox__action">
                <button class="dbox__action__btn"><a href="/places"><?= isset($text_more_info) ? $text_more_info : '' ?></a></button>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dbox dbox--color-2">
            <div class="dbox__icon">
                <i class="glyphicon glyphicon-cloud"></i>
            </div>
            <div class="dbox__body">
                <span class="dbox__count"><?= isset($countAll) ? $countAll->getcountUsers() : '' ?></span>
                <span class="dbox__title"><?= isset($text_count_users) ? $text_count_users : '' ?></span>
            </div>

            <div class="dbox__action">
                <button class="dbox__action__btn"><a href="/users"><?= isset($text_more_info) ? $text_more_info : '' ?></a></button>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dbox dbox--color-3">
            <div class="dbox__icon">
                <i class="glyphicon glyphicon-cloud"></i>
            </div>
            <div class="dbox__body">
                <span class="dbox__count"><?= isset($countAll) ? $countAll->getcountBirths() : '' ?></span>
                <span class="dbox__title"><?= isset($text_count_births) ? $text_count_births : '' ?></span>
            </div>

            <div class="dbox__action">
                <button class="dbox__action__btn"><a href="/births"><?= isset($text_more_info) ? $text_more_info : '' ?></a></button>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <div class="row">
            <div class="col-6">
                <i class="fas fa-table mr-1"></i>
                <?= isset($text_table_title) ? $text_table_title : '' ?>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="mytable" class="table table-striped table-bordered" style="width:100%">

                <thead>
                <tr>
                    <th><?= isset($text_table_username) ? $text_table_username : '' ?></th>
                    <th><?= isset($text_table_address) ? $text_table_address : '' ?></th>
                    <th><?= isset($text_table_mybirths) ? $text_table_mybirths : '' ?></th>
                    <th><?= isset($text_table_otherbirths) ? $text_table_otherbirths : '' ?></th>
                </tr>
                </thead>
                <tbody style="vertical-align: middle ;">
                <?php if (isset($users) && !empty($users)) {
                    foreach ($users as $user) {
                        ?>
                        <tr>
                            <td><?= $user->getUsername() ?></td>
                            <td><?= $user->getPlaceName() ?></td>
                            <td><?= $user->getMyBirths() ?></td>
                            <td><?= $user->getOtherBirths() ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
</div>


