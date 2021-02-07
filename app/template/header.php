<header class="main">
    <div class="user_info">
        <div class="dropdown">
            <button class="btn dropdown-toggle btn-sm" type="button" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                مرحبا اسلام
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a class="dropdown-item" href="#"> <?= isset($Text_user_info) ? $Text_user_info : '' ?> </a>
                <div class="dropdown-divider"></div>
                <a class="text-light dropdown-item-text fa fa-sign-out-alt" href="#"> <?= isset($Text_logout) ? $Text_logout : '' ?></a>
            </div>
        </div>
    </div>
    <i class="fas fa-bars navbar_btn" id="open_nav"></i>
    <h1><?= isset($h1FirstName) ? $h1FirstName : '' ?> <span> <?= isset($h1SecondName) ? $h1SecondName : '' ?></span>
    </h1>
</header>