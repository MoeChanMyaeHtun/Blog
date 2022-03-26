<?php
include_once './init.php';

include app_path('middleware/auth.php');
?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-7 mt-5 ">
      <div class="card border border-secondary border-4 ">
        <div class="card-header">
          <h3>Create Post</h3>
        </div>
        <div class="card-body">
          <form action="<?php echo url('post-store.php'); ?>" method="POST">
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="title" class="form-control <?php if (isset($_SESSION['errors']['title'])) : ?> is-invalid <?php endif; ?>" placeholder="Enter Title" />
              <?php if (isset($_SESSION['errors']['title'])) : ?>
                <div class="invalid-feedback"><?php echo $_SESSION['errors']['title']; ?></div>
              <?php endif; ?>
            </div>
            <div class="mb-3">
              <label class="form-label">Content</label>
              <textarea class="form-control <?php if (isset($_SESSION['errors']['body'])) : ?> is-invalid <?php endif; ?>" rows="5" name="body"></textarea>
              <?php if (isset($_SESSION['errors']['body'])) : ?>
                <div class="invalid-feedback"><?php echo $_SESSION['errors']['body']; ?></div>
              <?php endif; ?>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary ">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include './footer.php' ?>