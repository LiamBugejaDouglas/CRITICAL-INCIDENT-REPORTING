<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="../CSS/style3.css">
    <link rel="icon" type="image/x-icon" href="../Images/ha.ico">
    <script src="../JavaScript/passCheck.js"></script>
  </head>
  <body>
  <img src="../Images/cropped-site-logo.png" alt="Logo" class="logo">
  <div class="password-requirements">
    <h2>Password Requirements:</h2>
      <ul>
        <li>Minimum 12 characters</li>
        <li>At least 1 number</li>
        <li>At least 1 uppercase letter</li>
        <li>At least 1 lowercase letter</li>
        <li>At least 1 symbol</li>
      </ul>
  </div>
    <div class="center">
      <h1>Change Password</h1>
      <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
      <form method="post" action="../Database/change_db.php" onsubmit="return validateForm()">
      <div class="txt_field">
          <input type="text" name="user" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="currentPass" required>
          <span></span>
          <label>Current Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="newPass" required>
          <span></span>
          <label>New Password</label>
        </div>
        <div class="txt_field">
          <input type="password" name="comfPass" required>
          <span></span>
          <label>Confirm Password</label>
        </div>
        <input type="submit" value="Confirm">
      </form>
    </div>
  </body>
</html>
