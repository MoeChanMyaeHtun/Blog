<?php
include_once './init.php';

include app_path('middleware/auth.php');

$id = $_SESSION['auth']['id'];
$sql = "SELECT * FROM customer WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $password = $_POST['password'];

  if (!$name) {
    $errors['name'] = 'The name is required.';
  }

  if (count($errors) == 0) {
    if ($password) {
      $sql = "UPDATE customer SET `name`='$name', `password`='$password' where `id`='$id'";
    } else {
      $sql = "UPDATE customer SET `name`='$name' where `id`='$id'";
    }

    $result = mysqli_query($conn, $sql);

    redirect('profile-edit.php');
  }
}

?>
<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card mt-5">
        <div class="card-body">
          <form method="POST">
            <div>
              <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control <?php if (isset($errors['name'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter name">
              <?php if (isset($errors['name'])) : ?>
                <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
              <?php endif; ?>
            </div>

            <div class="mt-3">
              <input type="password" name="password" class="form-control <?php if (isset($errors['password'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter password">
              <?php if (isset($errors['password'])) : ?>
                <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
              <?php endif; ?>
            </div>

            <div class="d-flex justify-content-between mt-3">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="/blog/profile.php" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include './footer.php' ?>