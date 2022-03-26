<?php
include_once './init.php';

include app_path('middleware/auth.php');

$_SESSION['errors'] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $userId = $_SESSION['auth']['id'];

    if (!$title) {
        $_SESSION['errors']['title'] = 'The title is required.';
    }
    if (!$body) {
        $_SESSION['errors']['body'] = 'The content is required.';
    }

    if (count($_SESSION['errors']) > 0) {
        redirect('post-create.php');
    }

    $sql = "INSERT INTO posts (`title`, `body`, `user_id`) VALUES ('$title', '$body', '$userId')";
    $result = mysqli_query($conn, $sql);
}

redirect('index.php');