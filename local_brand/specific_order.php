<?php include '/xampp/htdocs/printerly/nav.php';
$ids='';
// $sid=$_GET['order'];
$bid = $_SESSION['bid'];
if(isset($_POST['add']) || isset($_POST['add2'])){
$selected = $_POST['category'];
$quantity= $_POST['oQuantity'];
$type =$_POST['typeofprint'];
$size = $_POST['oSize'];
$color = $_POST['oColor'];
$details = $_POST['details'];
$image_name= $_FILES['image']['name'];
$image_type= $_FILES['image']['type'];
$image_tmp= $_FILES['image']['tmp_name'];
$imagesize = $_FILES['image']['size'];
$location = "/xampp/htdocs/printerly/images/".$image_name;
move_uploaded_file( $image_tmp, $location );

/// select categories


/// insert into product
$insert = " INSERT INTO `lbfromsupplier` VALUES(NULL,'$selected','$type','$quantity','$size', '$color','$details','$image_name',Default,NULL,NULL,Default, NULL,$bid)";
$i=mysqli_query($conn, $insert);
}
if(isset($_POST['add'])){
  header("location: myorders.php");

}
if(isset($_POST['add2'])){

  header("location: selectsupplier.php");
  
}
if(isset($_SESSION['localbrand'])){ 

?>
<head>
    <title>
        Specific Order
    </title>
</head>
<body class="" style=" color:black !important;   background-image: url(/printerly/photo/n2ash.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 900px;
    background-color: black;
    
    ">

<div class="container col-6 mt-3" style="color:white !important;"> 
<h1 class="text-center mt-4" >Specific Order</h1>
<div class="infinity-container mt-5" >
<div class="infinity-form-block" style="width:600px; color:white !important;">
			
			<div class="infinity-fold">
				<div class="infinity-form">
<form method="POST" enctype="multipart/form-data">
<?php 
$select = "SELECT * From `categories`";
$q =mysqli_query($conn , $select);

?>

<h5 for=""> Select category</h5>
<div class="input-group ">

      <select  class="custom-select" name="category" required>
          <?php foreach ($q as $data) { ?>
            <option value="<?php echo $data['Cname']?>"> <?php echo $data['Cname']; ?></option>
          <?php } ?>
        </select>
      </div>
  <div class="form-group mt-2">
    <h5 for="exampleInputEmail1">Type of Print</h5>
    <select  class="custom-select" name="typeofprint" required>
            <option value="sublimation A4"> NONE  </option>
            <option value="sublimation A4"> sublimation A4</option>
            <option value="DTF A4">  DTF A4</option>
            <option value="DTF A3">  DTF A3</option>

        </select>    
  </div>
  <div class="form-group mt-2">
        <h5 for="exampleInputEmail1">Order Quantity</h5>
    <input required type="number"  class="form-control" name="oQuantity" placeholder="Please enter Order Quantity" >
</div>
<div class="form-group mt-2">
      <h5 for="exampleInputEmail1">Order Size</h5>
    <input required type="text"  class="form-control" name="oSize" placeholder="Please enter Order Size" >
    
  </div>
  
  <div class="form-group mt-2">
        <h5 for="exampleInputEmail1">Order Color</h5>
    <input required type="text"  class="form-control" name="oColor" placeholder="Please enter Order Color" >
</div>
<div class="form-group mt-2">
      <h5 for="exampleInputEmail1">more details</h5>
    <input  type="text"  class="form-control" name="details" placeholder="if you have any more details please enter it" >
</div>

  <div class="form-group text-center">
                <h5>upload images</h5> 
                <input required class="fas fa-upload" type="file" name="image" >
            </div>
          
</div>
<button type="submit"  name="add2" class="btn btn-primary btn-md " style="background: #600753; border: #600753;
">Choose Supplier</button>
            <button type="submit" name="add" class="btn btn-primary btn-md" style="background: #600753; border: #600753;
 margin-left:250px;">Leave it to Us</button>

            </form>
</div>

</div>

</div>

</div>

</body>
<?php 
// }
// else{
//     header("location:home.php");
// }
?>
<?php }
else{
    header("location: /printerly/local_brand/login.php");
  }
include '/xampp/htdocs/printerly/shared/footer.php';
?>







