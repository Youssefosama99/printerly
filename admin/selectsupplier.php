<?php include '/xampp/htdocs/printerly/nav.php';



if(isset($_GET['select'])){
$id = $_GET['select'];

if(isset($_POST['add'])){
$sid = $_POST['supplier'];
$update = "UPDATE  `lbfromsupplier` SET `sup_ID`=$sid WHERE `ls_ID`=$id AND sup_ID is Null";
$i = mysqli_query($conn, $update);
header("location:needsuppliers.php");

}
}
if(isset($_SESSION['admin'])){ 

?>
<body class="ho" style="background-image: url(/printerly/photo/supplier1.avif);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
width:100%;
height:1280px;
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
  header("location: http://localhost/printerly/home.php");


}
include '/xampp/htdocs/printerly/shared/footer.php';
?>