<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Parkerites</title>
    <link rel="stylesheet" href="css\materialize.css">
    <link rel="stylesheet" href="css\signup.css">
  </head>
<body>
  <div class="container row">
    <div class="col s2">

    </div>
<div class="col s7">

<?php include('signup.php') ?>
  <form id="signup" action="register.php" method="post">
      <h3>Login</h3>

      <fieldset>
        <input placeholder="Username" name="username" type="text" tabindex="1" required autofocus>
      </fieldset>

      <fieldset>
        <input placeholder="Password" name="password" type="password" tabindex="4" required>
      </fieldset>

      <fieldset>
        <button name="login_user" type="submit" id="contact-submit">Submit</button>
      </fieldset>
      <h6>New user?  <a href="register.php">Sign in</a> </h6>
    </form>
  </div>
<div class="col s2">

</div>

  </div>
</body>
</html>
