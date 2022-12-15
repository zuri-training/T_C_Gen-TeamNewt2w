<?php
session_start();
if (empty($_SESSION["email"])) {
  header("Location:index.html");}
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this Terms and Conditions Services unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./dashboard.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome: Terms and Conditions Generator</TITLE>
<link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
<link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./assets/img/Frame 361.png"
    />
</HEAD>
<BODY>
    <!-- <img src="./assets/bg.jpg" alt=""> -->
	<div class="phppot-container" >
         <nav id="home">
      <a href="./dashboard.php" class="logo"><strong>New</strong>T</a>
      <div>
        <img src="./assets/img/Ellipse 10.png">
      </div>
    </nav>
    <main>
      <aside>
        <div>
          <div class="side-options active">
            <img
              src="./assets/img/menu-grid-outline.png"
              alt="logo"
            />
           <a href="./dashboard.php"><p>User Dashboard</p></a> 
          </div>
          <div class="side-options">
            <img src="./assets/img/file-arrow-up-light.png" alt="logo" />
            <a href="./files.html"><p>Files</p></a>
          </div>
          <div class="side-options">
            <img src="./assets/img/settings-check.png" alt="logo" />
            <a href="./settings.html"><p>Settings</p></a>
          </div>
          <div class="side-options">
            <img src="./assets/img/support-outline.png" alt="logo" />
            <a href="./support.php"><p>Support</p></a>
          </div>
        </div>
        <div class="side-options">
          <img src="./assets/img/carbon_logout.png" alt="logo" />
          <div class="page-content jumbotron">
            <span class="login-signup btn btn-warning"><a href="logout.php">Logout</a></span>
          </div>
        </div>
      </aside>
      <div class="main-content">
        <div style="color: rgba(37, 37, 37, 0.75);">
            <h3>Welcome!</h3>
            <p>
                Create and generate T&C and Private Policy for your business in few steps
            </p>
        </div>
        <div class="container">
          <div class="containers">
            <p style="color: #7c5ff2; font-size: 2em; cursor: pointer"><a style="text-decoration: none;" href="stage-one1.html">+</a></p>
            <h4>Terms & Conditions</h4>
            
          </div>
          <div class="containers">
            <p style="color: #7c5ff2; font-size: 2em; cursor: pointer"><a style="text-decoration: none;" href="stage-one2.html">+</a></p>
            <h4>Privacy Policy</h4>
          </div>
        </div>
      </div>
    </main>
    <footer class="Dashboard-footer">
      <a href="#">Help</a>
      <a href="#">Support</a>
      <a href="#">Contact Us</a>
      <a href="#">FAQs</a>
      <a href="#">Legal Dictionary</a>
      <a href="#">Security FAQ</a>
      <a href="#">Blog</a>
      <a href="#">Newsletter</a>
    </footer>
</BODY>
</HTML>
