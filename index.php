<?php
include_once './init.php';

include app_path('middleware/auth.php');

$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
  <div class="row">
   <?php foreach ($posts as $post) : ?> 
      <div class="col-10 mt-3 mx-auto ">
        <a href="#" class="text-decoration-none text-black">
          <div class="card">
            <div class="card-body">
              <h3><?php echo $post['title']; ?></h3>
              <p><?php echo $post['body']; ?></p>
            </div>
            <div class="card-footer ">
              <small>Posted on <i><?php echo date('M d, Y', strtotime($post['date'])); ?></i> by
                <b>
                  <?php
                  $userId = $post['user_id'];
                  $sql = "SELECT * FROM customer WHERE id='$userId'";
                  $result = mysqli_query($conn, $sql);
                  $user = mysqli_fetch_assoc($result);
                  echo $user['name'];
                  ?>
                </b></small>
              <div class="float-end">
                <a href="<?php echo url('post-edit.php'); ?>" class="btn btn-success">Edit</a>
                <a href="<?php echo url('post-delete.php'); ?>" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include './footer.php' ?>