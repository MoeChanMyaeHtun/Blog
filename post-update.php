<?php
include_once './init.php';

include app_path('middleware/auth.php');

$_SESSION['errors'] = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['post_id'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if (!$title) {
        $_SESSION['errors']['title'] = 'The title is required.';
    }
    if (!$body) {
        $_SESSION['errors']['body'] = 'The content is required.';
    }

    if (count($_SESSION['errors']) > 0) {
        redirect("post-edit.php?post_id=$id");
    }

    $sql = "UPDATE posts SET title='$title', body='$body' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        flash('success', 'A post was updated successfully.');
    } else {
        flash('danger', 'A post was updating failed.');
    }
}

redirect('index.php');