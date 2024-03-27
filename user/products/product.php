<?php 
include '/xampp/htdocs/printerly/nav.php';
$uid = $_SESSION["uid"];
if (isset($_GET['pID'])){
    $id=$_GET['pID'];
    $select ="SELECT * From `product` left join `categories` on product.Cat_ID = categories.catID left join `local_brand` on product.lID = local_brand.lID WHERE pID=$id";
    $s=mysqli_query($conn,$select);
$fetch = mysqli_fetch_assoc($s);
$quantity = $fetch['quantity'];
$price = $fetch['price_after_discount'];
$brand_id = $fetch['lID'];
}
if(isset($_POST['buy'])){
$selectedquantity = $_POST['quan'];
$selectedsize= $_POST['size'];
$selectedcolor= $_POST['color'];
$orderprice= $price * $selectedquantity ;
$insert = "INSERT INTO `order` values(NULL ,$selectedquantity,'$selectedsize','$selectedcolor',$orderprice,Default,$id,$uid)";
$in = mysqli_query($conn ,$insert);

$newquantity = $quantity - $selectedquantity ;
$update = "UPDATE  `product` SET `quantity`=$newquantity WHERE `pID`=$id";
$u = mysqli_query($conn, $update);
header("location: /printerly/user/profile.php");

}
 if(isset($_SESSION['user'])){ 

?>
<body class="ho">
<!-- start sec your -->
<section class="yours" >
    <div class="your">
    <div class="col-md-7 ml-3 col-sm-12" >
        <div class="product-grid">
            <div class="product-image">
                <a href="#" class="image">
                    <img src="/printerly/images/<?php echo $fetch['prodphoto']; ?>" style=" height: 500px;">
                </a>
               
            </div>
            <div class="product-content">
                <h3 class="title"> <?php echo $fetch['P_name']; ?></h3>
                <div class="price"><?php echo $fetch['price_after_discount']; ?>
                <?php if($fetch['discount'] != 0){ ?>

                <span><?php echo $fetch['price']; ?>
<?php } ?>
            </div>
                <h1>Product Details : </h1>
                <p><?php echo $fetch['desc']; ?> </p>
                <h2>Product Information</h2>
                <p>Brand Name : <?php echo $fetch['l_name']; ?></p>
                <p>Product category : <?php echo $fetch['Cname']; ?> </p>
                <?php if($quantity !=0){ ?>

                <p> Product Quantity : <?php echo $quantity ; ?> </p>
                <!-- ///as///// -->
                
<?php 
$selectcolor = "SELECT * From `colors` WHERE prod_ID=$id";
$color =mysqli_query($conn , $selectcolor);

$selectsize = "SELECT * From `sizes` WHERE prod_ID=$id";
$size =mysqli_query($conn , $selectsize);
?>
<form method="POST">
<div class="container col-6 mt-3">
<p> select color : </p>
<div class="input-group mt-3">

      <select  class="custom-select" name="color" required>
          <?php foreach ($color as $data){ ?>
            <option value="<?php echo $data['color1']?>"> <?php echo $data['color1']; ?></option>
           <?php if($data['color2'] != null){ ?>
            <option value="<?php echo $data['color2']?>"> <?php echo $data['color2']; ?></option>
<?php }?>
<?php if($data['color3'] != null){ ?>
            <option value="<?php echo $data['color3']?>"> <?php echo $data['color3']; ?></option>
<?php }?>
<?php if($data['color4'] != null){ ?>
            <option value="<?php echo $data['color4']?>"> <?php echo $data['color4']; ?></option>
<?php }?>
<?php if($data['color5'] != null){ ?>
            <option value="<?php echo $data['color5']?>"> <?php echo $data['color5']; ?></option>
<?php }?>
<?php if($data['color6'] != null){ ?>
            <option value="<?php echo $data['color6']?>"> <?php echo $data['color6']; ?></option>
<?php }?>
<?php if($data['color7'] != null){ ?>
            <option value="<?php echo $data['color7']?>"> <?php echo $data['color7']; ?></option>
<?php }?>
<?php if($data['color8'] != null){ ?>
            <option value="<?php echo $data['color8']?>"> <?php echo $data['color8']; ?></option>
<?php }?>
<?php if($data['color9'] != null){ ?>
            <option value="<?php echo $data['color9']?>"> <?php echo $data['color9']; ?></option>
<?php }?>
<?php if($data['color10'] != null){ ?>
            <option value="<?php echo $data['color10']?>"> <?php echo $data['color10']; ?></option>
<?php }?>
          <?php } ?>
        </select>
      </div>

      <p> select size : </p>
<div class="input-group mt-3">

<select  class="custom-select" name="size" required>
          <?php foreach ($size as $data){ ?>
            <option value="<?php echo $data['size1']?>"> <?php echo $data['size1']; ?></option>
           <?php if($data['size2'] != null){ ?>
            <option value="<?php echo $data['size2']?>"> <?php echo $data['size2']; ?></option>
<?php }?>
<?php if($data['size3'] != null){ ?>
            <option value="<?php echo $data['size3']?>"> <?php echo $data['size3']; ?></option>
<?php }?>
<?php if($data['size4'] != null){ ?>
            <option value="<?php echo $data['size4']?>"> <?php echo $data['size4']; ?></option>
<?php }?>
<?php if($data['size5'] != null){ ?>
            <option value="<?php echo $data['size5']?>"> <?php echo $data['size5']; ?></option>
<?php }?>
<?php if($data['size6'] != null){ ?>
            <option value="<?php echo $data['size6']?>"> <?php echo $data['size6']; ?></option>
<?php }?>
 <?php } ?>
        </select>
      </div> 
      <div class="mb-3">
 
          <label for="exampleFormControlInput1" class="form-label">Quantiy :</label>
          <select  class="custom-select" name="quan" required>
          <?php 
          // if($quantity>20){
          //   $quantity =20;
          for($x=1 ; $x<=$quantity ; $x++){ ?>
            <option value="<?php echo $x; ?>"> <?php  echo $x; ?></option>
        <?php 
        } 
//         }
//  elseif($quantity<20 && 0<$quantity){ 
//                       for($x=1 ; $x<=$quantity ; $x++){ ?>
//                  <?php 
//           } 
//  }
         ?>
        </select>
        
        <button name="buy" type="submit" class="ord mt-3">Add To <i class="fa-solid fa-cart-shopping"></i></button>
        <?php 
                } else{
        ?>
            <button disabled="disabled" style="background: #600753; border:#600753;" class="m-auto d-flex btn btn-danger cartButton mt-3"><i class="far fa-frown m-auto"></i><span class="ml-2">Out of Stock</span></button>
<?php } ?>

    </form>
<!-- //////////////// -->
            </div>
        </div>
    </div>
</div>
</section>
<!-- end sec product -->

</body>
<!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br> -->
<br><br><br><br><br><br><br><br>

<?php 
}
else{
  header("location: /printerly/user/login.php");

}
include '/xampp/htdocs/printerly/shared/footer.php'; ?>
