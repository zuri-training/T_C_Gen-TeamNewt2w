<?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/Frame 361.png">
  </head>
  <body>
    <main class="register-main">
      <fieldset style="padding: 20px;" class="register-fieldset">
        <div style="text-align: center;">
          <h1 style="font-size: 40px;">Create your NewT account</h1>
          <p style="font-size: 24px; color: rgba(37, 37, 37, 0.75);">Create your account to have full access to our services</p>
        </div>
        <div style="text-align: center; margin-top: 2%;">
          <p style="font-size: 16px; color: rgba(37, 37, 37, 0.7);">Create Account Using</p>
          <section style="margin-top: 2%;">
            <img src="./assets/img/Group 6.png">
            <img src="./assets/img/Group 7.png">
            <img src="./assets/img/Group 8.png">
          </section>
          <h6 style="color: rgba(37, 37, 37, 0.7); font-size: 20px; margin-top: 2%;">Or</h6>
        </div>
        <form name="sign-up" action="" method="post"
          onsubmit="return signupValidation()" style="gap: 2%;" class="form-register">

          <?php
    if (! empty($registrationResponse["status"])) {
        ?>
                    <?php
        if ($registrationResponse["status"] == "error") {
            ?>
            <div class="server-response error-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        } else if ($registrationResponse["status"] == "success") {
            ?>
                    <div class="server-response success-msg"><?php echo $registrationResponse["message"]; ?></div>
                    <?php
        }
        ?>
        <?php
    }
    ?> <div class="error-msg" id="error-msg"></div>


          <div style="display: flex; flex-direction: column; padding-bottom: 3%">
            <label for="email" style="padding-bottom: 2%">Email<span class="required error" id="email-info"></span>
            </label>
            <input type="email" id="email" placeholder="example@gmail.com" name="email" required style="padding: 1% 1.2%; border-radius: 8px; border: 2px solid #252525; background-color: #F9F9F9;">
          </div>
          <div style="display: flex; flex-direction: column; padding-bottom: 3%">
            <label for="password" style="padding-bottom: 2%">Password<span class="required error" id="signup-password-info"></span>
            </label>
            <div class="password-container" style="padding: 0.4% 1.2%; border-radius: 8px; border: 2px solid #252525; background-color: #F9F9F9; display: flex; flex-direction: row;">
              <input type="password" id="signup-password" style="background-color: #F9F9F9; border: none; padding-right: 68%;" placeholder="Create an 8-character password" name="signup-password" required>
              <i class="fa-solid fa-eye" id="eye"></i>
            </div>
          </div>
        </form>
        <div class="checkbox-line" style="display: flex; flex-direction: row;">
          <input type="checkbox" name="checkbox" style="margin-right: 1%;">
          <p>I have read and agreed to the
            <a style="color: #EA8147; text-decoration: underline;" href="#">Terms of Services</a> and 
            <a style="color: #EA8147; text-decoration: underline;" href="#">Privacy Policy.</a>
          </p>
        </div>
        <div style="margin-top: 4%;">
          <button type="submit" class="btn" name="signup-btn" id="signup-btn" style="background-color: #5C37EE; box-shadow: 0px 12px 32px rgba(0, 0, 0, 0.16); border-radius: 8px; border: none; padding: 2% 2.4%; width: 100%; color: #F9F9F9;">Sign up</button>
          <p style="text-align: center; margin-top: 2%;">Already have an account? <a style="color: #374AFC;" href="./Login.html">Log in</a></p>
        </div>
      </fieldset>
    </main>
    <script>
function signupValidation() {
  var valid = true;
  $("#email").removeClass("error-field");
  $("#password").removeClass("error-field");
  var email = $("#email").val();
  var Password = $('#signup-password').val();
  var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  $("#email-info").html("").hide();
  if (email == "") {
    $("#email-info").html("required").css("color", "#ee0000").show();
    $("#email").addClass("error-field");
    valid = false;
  } else if (email.trim() == "") {
    $("#email-info").html("Invalid email address.").css("color", "#ee0000").show();
    $("#email").addClass("error-field");
    valid = false;
  } else if (!emailRegex.test(email)) {
    $("#email-info").html("Invalid email address.").css("color", "#ee0000")
        .show();
    $("#email").addClass("error-field");
    valid = false;
  }
  if (Password.trim() == "") {
    $("#signup-password-info").html("required.").css("color", "#ee0000").show();
    $("#signup-password").addClass("error-field");
    valid = false;
  }
  if (valid == false) {
    $('.error-field').first().focus();
    valid = false;
  }
  return valid;
}
</script>




    <script src="./assets/js/styles.js"></script>
  </body>
  </html>