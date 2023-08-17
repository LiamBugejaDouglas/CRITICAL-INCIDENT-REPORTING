<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="icon" type="image/x-icon" href="Images/ha.ico">
  </head>
  <body>
  <img src="Images/cropped-site-logo.png" alt="Logo" class="logo">
    <div class="center">
      <h1>Login</h1>
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
      <form method="post" action="loginch.php">
        <div class="txt_field">
          <input type="text" name="user" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
      </form>
    </div>
  </body>
</html>
