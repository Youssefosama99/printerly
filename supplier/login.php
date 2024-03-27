<?php 

include '/xampp/htdocs/printerly/nav.php';
if(isset($_POST['login']) && isset($_POST['checkbox'])){
  $email = $_POST['Email'];
$pass =  $_POST['password'];

$select =" SELECT * FROM `supplier` WHERE `s_email`='$email' AND `s_password`= '$pass'";
$s= mysqli_query($conn, $select);
$fetch = mysqli_fetch_assoc($s);
$numrows= mysqli_num_rows($s); 
@$_SESSION["payment"] = $fetch["payment"];
if($numrows > 0 && $_SESSION["payment"]=="true"){
session_start();

  $_SESSION['supplier']= $email;
  $sid= $_SESSION["sid"] = $fetch["sID"];

   header("location: specificorders.php");
}
elseif($_SESSION["payment"] =="false"){
  echo "<div style='margin-left: 675px ;' class='mt-2 btn btn-danger'>You haven't paid yet</div>";

}
else{
  echo "<div style='margin-left: 650px ;' class='mt-2 btn btn-danger'>wrong E-mail or password</div>";
}
}


?>

<body class="" style="    background-image: url(/printerly/photo/log.jpg);
">
	<div class="infinity-container">
		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Login as Supplier</div>
			
			<div class="infinity-fold">
				<div class="infinity-form">
					<form method="POST">
						<!-- Input Box -->
						<div class="form-input">
							<input required type="email" name="Email" placeholder="Email Address" required>
						</div>
						<div class="form-input">
							<input required type="password" name="password" placeholder="Password" required>
						</div>
						<div class="row">
<!--Remember Checkbox -->
<div class="col-auto d-flex align-items-center">
			                    <div class="custom-control custom-checkbox">
			                        <input required type="checkbox" name="checkbox" class="custom-control-input" id="cb1">
			                       	<label class="custom-control-label text-white" for="cb1">You Have To pay 200 L.E as membership Before Login
                                Pay it on Vodafone cash on 01015500843

		                        	</label>
				                </div>
                        
				            </div>
		                </div>
		                <!-- Login Button -->
						<button type="submit" name="login" class="btn btn-block mt-2">Login</button>
						
						
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
