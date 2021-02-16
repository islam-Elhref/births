<?php

return [
    'template' => [
        'wraper_start' => temp_PATH . 'wraper_start.php',
        'header' => temp_PATH . 'header.php',
        'navbar' => temp_PATH . 'navbar.php',
        'start_view' => temp_PATH . 'start_view.php',
        ':view' => 'view',
        'end_view' => temp_PATH . 'end_view.php',
    ],
    'header_resources' =>[
        'bootstrap' => '/css/bootstrap.css',
        'foawsome' => '/css/all.css',
        'googleIcon' => 'https://fonts.googleapis.com/icon?family=Material+Icons',
        'btndatatables' => 'https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css',
        'datatables' => '/css/datatables.min.css',
        'datepicker' => '/css/bootstrap-datepicker.min.css',
        'confirm' => '/css/jquery-confirm.min.css',
        'main_ar' => '/css/main_ar.css',
        'main_en' => '/css/main_en.css',
    ],

    'footer_resources' =>[
        'jquery' => '/js/vendor/jquery-1.12.0.min.js',
        'popper' => 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        'bootstrap' => '/js/vendor/bootstrap.min.js',
        'datatables' => '/js/en/datatables_en.min.js',
        'btndatata' => 'https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js',
        'datatables2' => 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'datatables3' => 'https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js',
        'bootstrap4' => '/js/vendor/dataTables.bootstrap4.min.js',
        'datepicker' => '/js/vendor/bootstrap-datepicker.min.js',
        'datepicker_ar' => '/js/vendor/bootstrap-datepicker.ar.min.js',
        'datepicker_ar2' => '/js/vendor/bootstrap-datepicker.ar-tn.min.js',
        'confirm' => '/js/vendor/jquery-confirm.min.js',
        'js_ar' => '/js/js_ar.js',
        'js_en' => '/js/js_en.js',
        'main' => '/js/main.js',

    ]
];