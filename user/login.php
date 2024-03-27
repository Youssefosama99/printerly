<?php 

include '/xampp/htdocs/printerly/nav.php';
if(isset($_POST['login'])){
$email = $_POST['Email'];
$pass =  $_POST['password'];

$select =" SELECT * FROM `user` WHERE `u_email`='$email' AND `u_password`= '$pass'";
$s= mysqli_query($conn, $select);
$fetch = mysqli_fetch_assoc($s);
$numrows= mysqli_num_rows($s);
if($numrows > 0 ){
session_start();

  $_SESSION['user']= $email;
  $uid= $_SESSION["uid"] = $fetch["uID"];

   header("location: /printerly/user/products/allproducts.php");
}
else{
  echo "<div style='margin-left: 640px ;' class='mt-2 btn btn-danger'>wrong E-mail or password</div>";
}
}


?>
<body class="" style="    background-image: url(/printerly/photo/log.jpg);
">
	<div class="infinity-container">
		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Login as User</div>
			
			<div class="infinity-fold">
				<div class="infinity-form">
					<form method="POST">
						<!-- Input Box -->
						<div class="form-input">
							<input type="email" name="Email" placeholder="Email Address" required>
						</div>
						<div class="form-input">
							<input type="password" name="password" placeholder="Password" required>
						</div>
						<div class="row">
							<!--Remember Checkbox -->
			                <div class="col-auto d-flex align-items-center">
			                   
				            </div>
		                </div>
		                <!-- Login Button -->
						<button type="submit" name="login" class="btn btn-block">Login</button>
						
						
						<div class="text-center text-white">Don't have an account?
							<a class="register-link" href="signup.php">Register here</a>
		            	</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORM CONTAINER END -->
	</div>
</body>


<?php include '/xampp/htdocs/printerly/shared/footer.php';
?>
