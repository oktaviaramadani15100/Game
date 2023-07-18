<?php
include 'koneksi.php';

require 'simpan.php';
if(isset($_SESSION["id"])){
	header("Location: game2.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
		<div class="container" id="container">
			<div class="form-container sign-up-container">
				<form action="simpan.php" method="post" autocomplete="off" >
					<h1>Sign Up</h1>
					<span>or use your email for registration</span>
					<input type="text" name="fullname" placeholder="Fullname" id="nama"/>
					<p id="fullname-salah"></p>
					<input type="username" name="username" placeholder="Username" id="nama2"/>
					<p id="username-salah"></p>
					<input type="password" name="password" placeholder="Password" id="sandi" />
					<p id="password-salah"></p>
					<button class="btn1" name="simpan" style="margin-top: 20px;" onclick="submit()">Sign Up</button>
				</form>
			</div>
			<div class="form-container sign-in-container">
				<form action="login.php" method="post" autocomplete="off">
					<h1>Sign in</h1>
					<span>or use your account</span>
					<input type="username" class="nama" name="username" placeholder="Username" id="nama"/>
					<input type="password" class="nama2" name="password" placeholder="Password" id="nama2" />
					<a href="#">Forgot your password?</a>
					<button class="btn2" name="simpan" onclick="submitlogin()">Sign In</button>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overly-left">
						<h1>Welcome Back!</h1>
						<p>To keep connected with us please login with your personal info</p>
						<button class="ghost" id="signIn" style="background-color: #8BBCCC;">Sign In</button>
						
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Hello, Friend!</h1>
						<p>Enter your personal details and start journey with us</p>
						<button class="ghost" id="signUp" style="background-color: #8BBCCC;">Sign Up</button>
					</div>
				</div>
			</div>
		</div>

		<script src="main.js"></script>
			<script>
				

			const signUpButton = document.getElementById('signUp');
			const signInButton = document.getElementById('signIn');
			const container = document.getElementById('container');

			signUpButton.addEventListener('click', () => {
				container.classList.add("right-panel-active");
			});

			signInButton.addEventListener('click', () => {
				container.classList.remove("right-panel-active");
			});

			

			</script>
			<script src="validasi.js"></script>
</body>
</html>