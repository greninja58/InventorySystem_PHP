<?php
ob_start();
require_once('includes/load.php');
if($session->isUserLoggedIn(true)) { 
  redirect('home.php', false);
}
?>
<?php include_once('layouts/header.php'); ?>

<style>
  body {
    
    background-image: url("libs/images/img68.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
  .login-page {
    background: rgba(255, 255, 255, 0.8); 
    padding: 20px;
  }
</style>

<div class="login-page">
  <div class="text-center">
    <h1>Login </h1>
    <!-- <h4>Inventory Management System</h4> -->
  </div>
  <?php echo display_msg($msg); ?>
  <form method="post" action="auth.php" class="clearfix">
    <div class="form-group">
      <label for="username" class="control-label">Username</label>
      <input type="name" class="form-control" name="username" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="Password" class="control-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-danger" style="border-radius:0%">Login</button>
    </div>
  </form>
</div>
<?php include_once('layouts/footer.php'); ?>
