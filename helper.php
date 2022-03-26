<?php

function dd($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function app_path($path) {
    return APP_PATH . '/' . $path;
}

function redirect($url) {
    header("Location: " . APP_URL . '/' . $url);
    die();
}

function url($url) {
    return APP_URL . '/' . $url;
}