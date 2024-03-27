<?php include '/xampp/htdocs/printerly/nav.php';
  $bid = $_SESSION['bid'];
$select="  SELECT * FROM `lbfromsupplier`  where brand_ID=$bid";
$s=mysqli_query($conn , $select);
// $fetch=mysqli_fetch_array($s);
// $id =$fetch['Is_ID'];
    $cnt = 0;
foreach($s as $data ){
    
     
    if($cnt == 1) break;
    $cnt--;
 $lsid = $data['ls_ID'];
}

if(isset($_POST['add'])){
$sid = $_POST['supplier'];
$update = "UPDATE  `lbfromsupplier` SET `sup_ID`=$sid WHERE `ls_ID`=$lsid";
$i = mysqli_query($conn, $update);
header("location: myorders.php");

}
if(isset($_SESSION['localbrand'])){ 


?>

<body class="ho" style="background-image: url(/printerly/photo/supplier1.avif);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
width:100%;
height:1300px;
">

<form method="POST" enctype="multipart/form-data">
<?php 
$select = "SELECT * From `supplier`";
$q =mysqli_query($conn , $select);

?>
<div style="margin-top:" class="container col-6 ">
<div class="infinity-container" >
<div class="infinity-form-block" style="width:500px; color:black !important;">
			
			<div class="infinity-fold">
				<div class="infinity-form">
<h1 class="text-center mt-" style="color:white !important;"> Select Supplier </h1>    

<div class="input-group mt-4">

      <select  class="custom-select" name="supplier" required>
          <?php foreach ($q as $data) { ?>
            <option value="<?php echo $data['sID']?>"> <?php echo $data['s_name']; ?></option>
          <?php } ?>
        </select>
      </div>
          
      <button type="submit" name="add" class="btn btn-primary btn-md mt-4" style="margin-left:175px; background-color:purple; border:purple;">Apply</button>
          </form>
          </div>
          </div></div></div></div>  
        </body>

          
          <?php }
else{
    header("location: /printerly/local_brand/login.php");
  }
include '/xampp/htdocs/printerly/shared/footer.php';
?>