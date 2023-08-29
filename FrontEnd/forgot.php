<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../CSS/style4.css">
    <link rel="icon" type="image/x-icon" href="../Images/ha.ico">
  </head>
  <body>
  <img src="../Images/cropped-site-logo.png" alt="Logo" class="logo">
    <div class="center">
      <h1>Forgot Password</h1>
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
      <form method="post" action="../Database/send_reset.php">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Email</label>
        </div>
        <input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>