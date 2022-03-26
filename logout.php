<?php
include_once './init.php';

include app_path('middleware/auth.php');

if(isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
}

redirect('login.php');