<?php 
require 'config/config.php';
require 'includes/form_handlers/login_handler.php';
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--Bootstrap 4 IE Compatibility-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--Cellphone Compatibility-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap 4 CSS StyleSheet Links-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!--Google Font Link-->
  <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee:400,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>BNH Admin: Log-in</title>
</head>
<body>
  <main class="container-fluid">
    <div class="row justify-content-center" id="adminContain">
      <div class="col align-self-center">
        <div class="row justify-content-center">
          <div class="col-auto" >
            <!--Log-In Form-->
            <div id="adminLogInForm">
              <h4 class="gFont1 formHeader">Medicare Broker News Hub Administrator</h4>
              <h5 class="gFont1 formHeader">Administrator Log-in</h5>
              <form action="bnhlogin.php" method="POST">
                <div class="form-row formRowStyle">
                  <div class="form-group col">
                    <label for="username" class="formLabel">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Employee ID or Email Address">
                  </div>
                </div>
                <div class="form-row formRowStyle">
                  <div class="form-group col">
                    <label for="password" class="formLabel">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-row justify-content-center">
                  <div class="form-group">
                    <button type="submit" name="logIn_btn" class="btn btn-light">Log In</button>
                    <button type="submit" name="forgotPassword_btn" class="btn btn-light">Forgot Password?</button>
                  </div>
                </div>
              </form>
            </div>
            <!--Log-In Form End-->
          </div>
        </div>
        <div class="row justify-content-center mt-3">
          <!--New User Field-->
          <div class="col-md-8" id="newUserField">
            <h4 class="gFont1">Please Note:</h4>
            <p class="gFont1">This application is only accessible to authorized representatives. If you do not have access to this system and you feel you should please contact your Supervisor or the Website Administrator. Thank you!</p>
            <p class="gFont1">If you were notified that you are provided access please click the button below.</p>
            <button type="submit" name="newUserActivate" class="btn btn-success">Activate Account</button>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--Bootstrap 4 Javascript Links-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

