<?php 
 include_once 'init.php';
 ?>


<style>
  body {
    background-image: url(./bg.jpg);
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: rgba(47, 23, 15, .9);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    font-weight: bold;
  }

  .dropdown-content a {
    color: white;
    padding: 11px 15px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #00adb5;

  }

  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark py-lg-3" id="mainNav">
  <div class="container">


    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mx-auto">

        <li class="nav-item px-lg-4">
          <a class="nav-link text-uppercase text-expanded" href="index.php" id="title">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo url('post-create.php'); ?>">Create Post</a>
        </li>

        <li class="nav-item px-lg-4" style="text-decoration: none; color: white;margin-top: 5px" id="title">
          <span class="fa fa-user-circle-o" style="font-size: 22px;"></span>
          <b style="font-size: 20px;font-weight: bold;">
          <?php echo $_SESSION['auth']['name']; ?>
          </b>

        <li class="nav-item px-lg-4">
          <div class="dropdown">

            <a class="nav-link text-uppercase text-expanded" href="logout.php" id="title">Logout</a>
            <div class="dropdown-content">
              <a href="profile.php">Profile</a>

            </div>
          </div>
        </li>

      </ul>
    </div>
  </div>
</nav>
</body>

</html>