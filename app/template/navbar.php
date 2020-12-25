<div class="navbar ">

    <div class="navbar-info">
        <img src="../img/1.jpg" alt="">
        <h3>app admin</h3>
    </div>
    <div class="links">
        <a href="/"><i class="fas fa-tachometer-alt"></i> <span><?= isset($Text_home)?$Text_home : '' ?> </span> </a>
        <a href="/users"><i class="fas fa-users"></i> <span> <?= isset($Text_users)?$Text_users : '' ?> </span> </a>
        <a href="/language"><i class="fas fa-language"></i> <span> <?= isset($Text_changeLanguage)?$Text_changeLanguage : '' ?> </span> </a>
        <a href="/logout"><i class="fas fa-sign-out-alt"></i> <span><?= isset($Text_logout)?$Text_logout : '' ?></span> </a>
    </div>
</div>