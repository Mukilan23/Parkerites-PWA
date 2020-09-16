<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Parkerites</title>
    <link rel="stylesheet" href="css\materialize.css">
    <link rel="stylesheet" href="css\signup.css">
 
   <script type="text/javascript" src="master.js">

    </script>
  </head>
  <body>
    <div class="container row">
      <div class="col s2">

      </div>
<div class="col s7">

<?php include('signup.php') ?>
    <form id="signup" action="register.php" method="post">
        <h3>Register</h3>

        <fieldset>
          <input placeholder="Username" name="username" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
          <input placeholder="E-mail address" name="email" type="email" tabindex="2" required>
        </fieldset>
        <fieldset>
          <input placeholder="Mobile Number" name="mobile" type="tel" tabindex="3" required>
        </fieldset>
        <fieldset>
          <input placeholder="Password" name="password_1" type="password" tabindex="4" required>
        </fieldset>
        <fieldset>
          <input placeholder="Retype Password" name="password_2" type="password" tabindex="4" required>
        </fieldset>

        <fieldset>
          <button name="reg_user" type="submit" id="contact-submit">Submit</button>
        </fieldset>
        <h6>Already a user?  <a href="login.php">Login</a> </h6>
      </form>
    </div>
<div class="col s2">

</div>

    </div>
   
  </body>
</html>
