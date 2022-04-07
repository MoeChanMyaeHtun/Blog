<?php

include_once './init.php';

include app_path('middleware/auth.php');

if(!isset($_GET['post_id'])) {
    redirect('index.php');
}

$id = $_GET['post_id'];
$sql = "DELETE FROM posts WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if($result) {
    flash('success', 'A post was deleted successfully.');
} else {
    flash('danger', 'A post was deleting failed.');
}
redirect('index.php');
