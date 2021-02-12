<div class="navbar">

    <div class="navbar-info">
        <img src="../img/1.jpg" alt="">
        <h3>app admin</h3>
    </div>
    <ul class="list-unstyled links">

        <li class="parent_link <?= $this->checkurl('/')== true ? 'active' : '' ?>" > <!-- dashboard ling -->
            <a href="/"  title="<?= isset($Text_home) ? $Text_home : '' ?>" data-toggletool="tooltip" data-placement="right">
                <i class="fa fa-chart-line "></i>
                <span><?= isset($Text_home) ? $Text_home : '' ?> </span>
            </a>
        </li> <!-- dashboard link -->

        <li class="parent_link <?= $this->checkurl('/births')== true ? 'active' : '' ?>" >
            <a href="/births" title="<?= isset($Text_children) ? $Text_children : '' ?>" data-toggletool="tooltip" data-placement="right">
                <i class="fa fa-baby fa-fw"></i>
                <span> <?= isset($Text_children) ? $Text_children : '' ?> </span>
            </a>
        </li>

        <li class="parent_link <?= $this->checkurl('/arrival')== true ? 'active' : '' ?>" >
            <a href="/arrival" title="<?= isset($Text_arrival) ? $Text_arrival : '' ?>" data-toggletool="tooltip" data-placement="right">
                <i class="fa fa-baby-carriage fa-fw"></i>
                <span> <?= isset($Text_arrival) ? $Text_arrival : '' ?> </span>
            </a>
        </li>


        <li class="parent_link <?= $this->checkurl('/users')== true ? 'active' : '' ?>" >
            <a href="/users" title="<?= isset($Text_users) ? $Text_users : '' ?>" data-toggletool="tooltip" data-placement="right">
                <i class="fas fa-users fa-fw"></i>
                <span> <?= isset($Text_users) ? $Text_users : '' ?> </span>
            </a>
        </li>


        <li class="parent_link <?= $this->checkurl('/places')== true ? 'active' : '' ?> " >
            <a href="/places" title="<?= isset($Text_places) ? $Text_places : '' ?>" data-toggletool="tooltip" data-placement="right">
                <i class="fas fa-place-of-worship fa-fw fa-fw"></i>
                <span> <?= isset($Text_places) ? $Text_places : '' ?> </span>
            </a>
        </li>

        <li class="parent_link" >
            <a href="/language" title="<?= isset($Text_changeLanguage) ? $Text_changeLanguage : '' ?>" data-toggletool="tooltip" data-placement="right">
                <i class="fas fa-language fa-fw"></i>
                <span> <?= isset($Text_changeLanguage) ? $Text_changeLanguage : '' ?> </span>
            </a>
        </li>
    </ul>
</div>