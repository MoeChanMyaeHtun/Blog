<?php
include_once './init.php';

if (!isset($_SESSION['auth'])) {
  redirect('login.php');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name=$_POST['name'];
  $password=$_POST['password'];
  $id=$_POST['id'];

  if(!$name){
    $errors['name']= 'Required name';
  }
 if(!$password){
   $errors['password']= 'Required password';
 }
  if(count($errors)==0){
    $sql="Select * From customer where `name`='$name' and `password`='$password'" ;
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result) > 0) {
      $errors['alert'] = 'The password is already taken try another!';}
      else{
      $query="Update customer Set `password`='$password'  where `id`=$id";
      $go_query=mysqli_query($connection,$query);}
      if($go_query){
        $errors['success']='Your  password changed successfully';
      }
      redirect('./profile.php');
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
            <input type="hidden" name="id" value="<?php echo $_SESSION['auth']['id']; ?>">

            <div>
              
              <input type="text" name="name" value="<?php echo $_SESSION['auth']['name']; ?>" class="form-control <?php if (isset($errors['name'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter name">
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
              <button type="submit" class="btn btn-primary" value="submit">Update</button>
              <a href="./profile.php" class="btn btn-outline-secondary" value="reset">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include './footer.php' ?>