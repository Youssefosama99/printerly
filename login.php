<?php 
include '/xampp/htdocs/printerly/nav.php';

if(isset($_POST['login'])){
$email = $_POST['Email'];
$pass =  $_POST['password'];

$select =" SELECT * FROM `register` WHERE `Email`='$email' AND `password`= '$pass'";
$s= mysqli_query($conn, $select);
$fetch = mysqli_fetch_assoc($s);
$numrows= mysqli_num_rows($s); 
@$_SESSION["payment"] = $fetch["payment"];
if($numrows > 0 && $_SESSION["payment"]=="true"){
session_start();
$_SESSION['category'] = $fetch["catID"];

  $_SESSION['user']= $email;
  $_SESSION["id"] = $fetch["ID"];

   header("location: signup.php");
}
elseif($_SESSION["payment"] =="false"){
  echo "<div style='margin-left: 640px ;' class=''>You haven't paid yet</div>";

}
else{
  echo "<div style='margin-left: 640px ;' class='mt-2 btn btn-danger'>wrong E-mail or password</div>";
}
echo $_SESSION["payment"] ;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login 6</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
</head>

<body class="log">
	<div class="infinity-container">
		FORM CONTAINER BEGIN 
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
						<button type="submit" class="btn btn-block">Login</button>
						
						
						<div class="text-center text-white">Don't have an account?
							<a class="register-link" href="register.html">Register here</a>
		            	</div>
					</form>
				</div>
			</div>
		</div>
		<!-- FORM CONTAINER END -->
	</div>

	<script type="text/javascript">
		$(document).ready(function()
		{
			$('.infinity-click-box').click(function()
			{
				$('.infinity-fold').toggleClass('active')
			})
		})
	</script>
</body>
</html>

<?php 
include '/xampp/htdocs/printerly/shared/footer.php';
?>
