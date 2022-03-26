<?php

if(isset($_SESSION['auth'])) {
    redirect('index.php');
}