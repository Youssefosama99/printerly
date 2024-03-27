<?php include '/xampp/htdocs/printerly/nav.php';

if (isset($_POST['send'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['E_mail'];
    $Password = $_POST['Password'];
    $conPassword = $_POST['conPassword'];
    $Phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $flink = $_POST['FLink'];
    $ilink = $_POST['iLink'];
    $img= $_FILES['image']['name'];
$image_type= $_FILES['image']['type'];
$image_tmp= $_FILES['image']['tmp_name'];
$imagesize = $_FILES['image']['size'];
$location = "/xampp/htdocs/printerly/images/".$img;  
move_uploaded_file($image_tmp, $location);

    $select = "SELECT * From `supplier`";
    $q =mysqli_query($conn , $select);
    $fetch =mysqli_fetch_array($q);
    if( $Password != $conPassword){
      echo "<div style='margin-left: 640px ;' class='mt-2 btn btn-danger'>password doesn't match</div>";
    }
    elseif($Email == $fetch['s_email']){
      echo "<div style='margin-left: 640px ;' class='mt-2 btn btn-danger'>E-mail already exist</div>";     
      header("Refresh:1; url=login.php");  

    }
else{
        $insert = " INSERT INTO `supplier` VALUES(NULL, '$Name','$Email','$Password' ,'$Phone','$address' ,'$flink','$ilink','$img','false') ";
        $i = mysqli_query($conn, $insert);
        header("location: /printerly/supplier/login.php");

    }
  }
  $Name ="";
$Email="";
$Password="";
$conPassword ="";
$Phone="";
$address="";
$img="";
$facebook="";
$insta="";
$update=true;
  if(isset($_GET['edit'])){
    $update=false;
    $sid=$_GET['edit'];
    $set= " SELECT * From `supplier` where `sID` =$sid";
$st = mysqli_query($conn , $set);
$row = mysqli_fetch_assoc($st);
$Name= $row['s_name'];
$Email=$row['s_email'];
$Password=$row['s_password'];
$Phone=$row['phone'];
$address = $row['address'];
$img= $row['photo'];
$facebook = $row['Flink'];
$insta = $row['ilink'];



if(isset($_POST['update'])){
  $Name = $_POST['Name'];
  $Email = $_POST['E_mail'];
  $Password = $_POST['Password'];
  $conPassword = $_POST['conPassword'];
  $Phone = $_POST['Phone'];
  $address = $_POST['Address'];
  $facebook =$_POST['FLink'];
  $insta = $_POST['iLink'];
  $img= $_FILES['image']['name'];
  $image_type= $_FILES['image']['type'];
  $image_tmp= $_FILES['image']['tmp_name'];
  $imagesize = $_FILES['image']['size'];
  $location = "/xampp/htdocs/printerly/images/".$img;  
    if($_FILES['image']['size']>0){
      $update ="UPDATE `supplier` SET photo='$img' WHERE `sID`=$sid";
     $i = mysqli_query($conn ,$update);
     move_uploaded_file($image_tmp, $location);

    }
    if( $Password != $conPassword){
      echo "<div style='margin-left: 640px ;' class='mt-2 btn btn-danger'>password doesn't match</div>";
    }
    elseif($Email == $fetch['s_email']){
      echo "<div style='margin-left: 640px ;' class='mt-2 btn btn-danger'>E-mail already exist</div>";     
    }
else{ 
  $update ="UPDATE `supplier` SET `s_name` ='$Name' , `s_email`='$Email' , `s_password`='$Password' , `Phone`='$Phone' , `address`='$address'
  , `Flink`='$facebook' , `ilink`='$insta'  WHERE `sID`=$sid";
  $i = mysqli_query($conn ,$update);
   header("location: profile.php");
    }
  //   $update ="UPDATE `user` SET u_name ='$Name' , `u_email`='$Email' , u_password='$Password' , Phone='$Phone' , address='$address'  WHERE `uID`=$uid";
  //   $i = mysqli_query($conn ,$update);
  // header("location: userProfile.php");
    }
  
}


    ?>

<body class="bg">
  <!-- start sec input -->
<section class="signup">
<?php if($update){ ?>
<h1 class="text-center"> signup as Supplier</h1>
<?php } ?>
<?php if(!$update){ ?>
<h1 class="text-center"> Edit Profile</h1>
<?php } ?>
<diV class="sign info text-center">
    <form method="POST" enctype="multipart/form-data">  
    <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input required type="text" value="<?php echo $Name; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your Name" name="Name">
        </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input required type="email" value="<?php echo $Email; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your email address" name="E_mail">
        </div>
       <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input required type="password" value="<?php echo $Password; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your Password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
          title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="Password">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
          <input required type="password" value="<?php echo $Password; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please confirm your password" name="conPassword">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Phone</label>
          <input required type="tel" value="0<?php echo $Phone; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your Phone Number" pattern="^01[0-2]\d{8,}$" name="Phone">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Location</label>
          <input required type="text" value="<?php echo $address; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your Location" name="Address">
        </div>
              <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Facebook Link</label>
          <input type="text" value="<?php echo $facebook; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your Facebook Link"  name="FLink">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Instgram Link</label>
          <input type="text" value="<?php echo $insta; ?>" class="form-control inp" id="exampleFormControlInput1" placeholder="please enter your Instgram Link" name="iLink">
        </div>
        <div style="margin-left:110px;">
        <label for="img">Select image:</label>
<input type="file" id="image" name="image" accept="image/*">
</div>  
<?php if($update){ ?>
        <button type="submit" class="btn btn-info su" name="send">Submit</button>
  </div>
  <?php } if(!$update){?>
    <button type="submit" class="btn btn-info su" name="update">Update</button>
<?php } ?>
        </form>
      </diV>
  </section>
  <!-- end sec input -->


</body> 
<?php include '/xampp/htdocs/printerly/shared/footer.php';
?>