<?php
use Phppot\Member;
if (! empty($_POST["signup-btn"])) {
    require_once './Model/Member.php';
    $member = new Member();
    $registrationResponse = $member->registerMember();
}
?>
<HTML>
<HEAD>
<TITLE>User Registration</TITLE>
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</HEAD>
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
<BODY>
	
	<fieldset class="phppot-container" style="width: 50%;">
		<div class="sign-up-container">
			<div class="login-signup" style="text-align: center;">
				<h1 style="font-size: 40px;">Create your NewT account</h1>
				<p style="font-size: 24px; color: rgba(37, 37, 37, 0.75);">Create your account to have full access to our services</p>
			</div>
			<div class="">
				<form name="sign-up" action="" method="post"
					onsubmit="return signupValidation()">
					<div class="signup-heading" style="text-align: center; margin-top: 2%;">
						<p style="font-size: 16px; color: rgba(37, 37, 37, 0.7);">Create Account Using</p>
						<section style="margin-top: 2%;">
							<img src="./assets/img/Group 6.png">
							<img src="./assets/img/Group 7.png">
							<img src="./assets/img/Group 8.png">
						</section>
						<h6 style="color: rgba(37, 37, 37, 0.7); font-size: 20px; margin-top: 2%;">Or</h6>
					</div>
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
    ?>	<div class="error-msg" id="error-msg" style="margin-bottom: 2%;"></div>
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
							<label class="form-label" class="required error" id="signup-password-info" style="margin-bottom: 2%">
								Password
							</label>
							<input class="input-box-330" type="password"
								name="signup-password" id="signup-password" style="padding: 2% 2.4%; width: 100%; border-radius: 8px; border: 2px solid #252525; background-color: #F9F9F9;">
						</div>
					</div>
					<div class="checkbox-line" style="display: flex; flex-direction: row;">
						<input type="checkbox" name="checkbox" style="margin-right: 1%;">
						<p>I have read and agreed to the
							<a style="color: #EA8147; text-decoration: underline;" href="#">Terms of Services</a> and 
							<a style="color: #EA8147; text-decoration: underline;" href="#">Privacy Policy.</a>
						</p>
					</div>
					<div class="row">
						<input class="btn" type="submit" name="signup-btn"
							id="signup-btn" value="Sign up" style="background-color: #5C37EE; box-shadow: 0px 12px 32px rgba(0, 0, 0, 0.16); border-radius: 8px; border: none; padding: 2% 2.4%; width: 100%; color: #F9F9F9;">
						<p style="text-align: center; margin-top: 2%;">Already have an account? <a style="color: #374AFC;" href="./Login.php">Log in</a></p>
					</div>
				</form>
			</div>
		</div>
	</fieldset>
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
</BODY>
</HTML>
