<?php

use Phppot\Member;

if (!empty($_POST["login-btn"])) {
	require_once __DIR__ . '/Model/Member.php';
	$member = new Member();
	$loginResult = $member->loginMember();
}
?>
<HTML>

<HEAD>
	<TITLE>Login</TITLE>
	<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
	<style>
		BODY {
			display: flex;
		    flex-direction: column;
		    justify-content: center;
		    align-items: center;
		    margin: 5%;
		}
		.success-msg {
			padding-top: 10px;
			color: green;
			text-align: center;
		}
		.error-msg {
			padding-top: 10px;
			color: #D8000C;
			text-align: center;
}
	</style>
</HEAD>

<BODY>
	<fieldset class="phppot-container" style="width: 50%;">
		<div class="sign-up-container">

			<div class="login-signup" style="text-align: center;">
				<h1 style="font-size: 40px;">Hello! Welcome Back</h1>
			</div>

			<div class="signup-align">
			<form name="login" action="" method="post" onsubmit="return loginValidation()">
				<div class="signup-heading" style="text-align: center; margin-top: 2%;">
					<p style="font-size: 16px; color: rgba(37, 37, 37, 0.7);">Login Using</p>
						<section style="margin-top: 2%;">
							<img src="./assets/img/Group 6.png">
							<img src="./assets/img/Group 7.png">
							<img src="./assets/img/Group 8.png">
						</section>
						<h6 style="color: rgba(37, 37, 37, 0.7); font-size: 20px; margin-top: 2%;">Or</h6>
				</div>
				
				<?php if (!empty($loginResult)) { ?>
					<div class="error-msg"><?php echo $loginResult; ?></div>
				<?php } ?>
				<div class="row">
						<div class="inline-block" style="display: flex; flex-direction: column; margin-bottom: 2%;">
							<label class="form-label" class="required error" id="email-info" style="margin-bottom: 2%">
								Email
							</label>
							<input class="input-box-330" type="email" name="email" id="email" style="padding: 2% 2.4%; width: 100%; border-radius: 8px; border: 2px solid #252525; background-color: #F9F9F9;">
						</div>
					</div>
					<div class="row">
						<div class="inline-block" style="display: flex; flex-direction: column; margin-bottom: 2%">
							<label class="form-label" class="required error" id="login-password-info" style="margin-bottom: 2%">
								Password
							</label>
							<input class="input-box-330" type="password"
								name="login-password" id="login-password" style="padding: 2% 2.4%; width: 100%; border-radius: 8px; border: 2px solid #252525; background-color: #F9F9F9;">
						</div>
					</div>
					<div class="checkbox-line" style="display: flex; flex-direction: row; width: 100%; justify-content: center; align-items: center;">
						<div style="display: flex; flex-direction: row; margin-right: 60%; width: 100%; align-items: center;">
							<input type="checkbox" name="checkbox" style="margin-right: 2%;">
						<p style="white-space: nowrap;">Remember me</p>
						</div>
						<a style="color: #374AFC; width: 80%; align-items: center; white-space: nowrap; text-decoration: none;" href="#">Forgot Password?</a>
					</div>
				<div class="row">
					<input class="btn btn-dark" type="submit" name="login-btn" id="login-btn" value="Login" style="background-color: #5C37EE; box-shadow: 0px 12px 32px rgba(0, 0, 0, 0.16); border-radius: 8px; border: none; padding: 2% 2.4%; width: 100%; color: #F9F9F9;">
					<p style="text-align: center; margin-top: 2%;">Don't have an account? <a style="color: #374AFC; text-decoration: none;" href="./signup.php">Signup</a></p>
				</div>
			</form>
		</div>
	</div>
</fieldset>

	<script>
		function loginValidation() {
			var valid = true;
			$("#email").removeClass("error-field");
			$("#password").removeClass("error-field");

			var Email = $("#email").val();
			var Password = $('#login-password').val();

			$("#email-info").html("").hide();

			if (UserName.trim() == "") {
				$("#email-info").html("required.").css("color", "#ee0000").show();
				$("#email").addClass("error-field");
				valid = false;
			}
			if (Password.trim() == "") {
				$("#login-password-info").html("required.").css("color", "#ee0000").show();
				$("#login-password").addClass("error-field");
				valid = false;
			}
			if (valid == false) {
				$('.error-field').first().focus();
				valid = false;
			}
			return valid;
		}
	</script>
</BODY>

</HTML>