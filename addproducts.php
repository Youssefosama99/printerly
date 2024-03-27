
<?php 
include '/xampp/htdocs/printerly/nav.php';
$sid= $_SESSION["sid"];
if(isset($_POST['add'])){
$name = $_POST['pName'];
$price = $_POST['pPrice'];
$discount = $_POST['pdiscount'];
$priceafterdiscount = $price - $discount;
$desc =addSlashes($_POST['pdesc']);
$quantity= $_POST['pQuantity'];
$image_name= $_FILES['image']['name'];
$image_type= $_FILES['image']['type'];
$image_tmp= $_FILES['image']['tmp_name'];
$imagesize = $_FILES['image']['size'];
$location = "/xampp/htdocs/printerly/images/".$image_name;
move_uploaded_file( $image_tmp, $location );

/// select categories

$selected = $_POST['category'];

/// insert into product
$insert = " INSERT INTO `product` values(NULL ,'$name',$price,$discount,$priceafterdiscount, '$desc',$quantity,'$image_name' ,$selected ,null,$sid)";
$i=mysqli_query($conn, $insert);
//select id of product
  $bid = $_SESSION['bid'];
$select="  SELECT  MAX(pID) FROM `product` where sID=$sid";
$s=mysqli_query($conn , $select);

header("location: choose_color.php");

}
$name ="";
$price = "";
$discount = "";
$priceafdiscount = "";
$desc = "";
$quantity = "";
$update = false;  
if(isset($_GET ['edit'])){
  $update = true ;
  $id = $_GET ['edit'];
  $select = "SELECT * FROM `product` left join `categories` on product.Cat_ID = categories.catID  WHERE pID = $id";
  $s= mysqli_query( $conn , $select );
  $row =mysqli_fetch_assoc($s);
 $name = $row ['P_name'] ;
 $price = $row['price'];
 $discount = $row['discount'];
 $priceafdiscount = $row['price_after_discount'];
 $desc = $row['desc'];
 $quantity = $row['quantity'];
 $image = $row['prodphoto'];
 /* update*/
 if(isset($_POST['upd'])){
  $name = $_POST['pName'];
  $price = $_POST['pPrice'];
  $discount = $_POST['pdiscount'];
  $priceafdiscount = $price - $discount;
  $desc =addSlashes($_POST['pdesc']);
  $quantity= $_POST['pQuantity'];
  $image_name= $_FILES['image']['name'];
  $image_type= $_FILES['image']['type'];
  $image_tmp= $_FILES['image']['tmp_name'];
  $imagesize = $_FILES['image']['size'];
  $location = "/xampp/htdocs/printerly/images/".$image_name;
      if($_FILES['image']['size']>0) {
     move_uploaded_file( $image_tmp, $location );
     $update ="UPDATE `product` SET `prodphoto` = '$image_name'  WHERE `pID`=$id";
     $n = mysqli_query($conn ,$update);
       echo"image uploaded";
     }else{
       echo"upload failed";
     
     
     }
     $update ="UPDATE `product`SET `P_name` ='$name' , `price` =$price , `discount` =$discount,
        `price_after_discount` = $priceafdiscount , `desc` ='$desc' , `quantity` = $quantity   WHERE `pID`=$id";
        
        $n = mysqli_query($conn ,$update);
        
     header("location:/printerly/supplier/products/choose_color.php");
   }
   

 }


if(isset($_SESSION['supplier'])){ 

?>
<head>
    <title>
        Add product
    </title>
</head>
<body class="log">

<div class="container col-6 mt-5">
<div class="login p-3 mb-5 bg-light text-dark border border-secondary rounded-lg" style="background-color: purple !important; color : white !important;">

<b>
 <?php  if(!$update){ ?>

<h1 class="text-center" style="color : rgb(175, 92, 205);">Add Product</h1>
<?php }?>
<?php  if($update){ ?>

<h1 class="text-center" style="color : rgb(175, 92, 205);">Update Product</h1>
<?php }?>

<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label  for="exampleInputEmail1">Product Name</label>
    <input required type="text" value="<?php echo $name ; ?>"  class="form-control" name="pName" placeholder="Please enter Product Name" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product price</label>
    <input required type="number" value="<?php echo $price ; ?>"  class="form-control" name="pPrice" placeholder="Please enter Product price" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Discount</label>
    <input  type="number" value="<?php echo $discount ; ?>"  class="form-control" name="pdiscount" placeholder="Please enter Product price" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product Description</label>
    <input required type="text" value="<?php echo $desc ; ?>"  class="form-control" name="pdesc" placeholder="Please enter Product Description" >
    
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Product Quantity</label>
    <input required type="number" value="<?php echo $quantity ; ?>"  class="form-control" name="pQuantity" placeholder="Please enter Product Quantity" >
</div>
<?php 
             if(!$update){

$select = "SELECT * From `categories`";
$q =mysqli_query($conn , $select);

?>
  <label for=""> Select category</label>
<div class="input-group ">

      <select  class="custom-select" name="category" required>
          <?php             
           foreach ($q as $data) { ?>
            <option value="<?php echo $data['catID']?>"> <?php echo $data['Cname']; ?></option>
          <?php }  ?>
        </select>
      </div><br>
      <?php } ?>
  <div class="form-group text-center">
                <label>upload images</label> <br>
                <input  value="" class="fas fa-upload" type="file" name="image" >
            </div>
            
       <?php     if(!$update){ ?>
<div class="text-center">
            <button type="submit" name="add" class="btn btn-primary btn-md "><i class="fa-solid fa-plus"></i>Add Product</button>
            <?php } if($update){?>
        <button type="submit" class="button btn btn-info text-center" name="upd" > <i class="fa-solid fa-pen-clip"></i>Update</button>
    <?php } ?>
    </div>
            </form>
</div>
</b>
</body
<?php }
else{
  header("location: /printerly/supplier/login.php");
}?>
<?php include '/xampp/htdocs/printerly/shared/footer.php'; ?>
