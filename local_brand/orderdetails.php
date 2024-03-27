<?php include '/xampp/htdocs/printerly/nav.php';
if (isset($_GET['order'])){
    $oid=$_GET['order'];
    $select ="SELECT * From `lbfromsupplier` left join `local_brand` on lbfromsupplier.brand_ID = local_brand.lID  WHERE ls_ID=$oid";
    $s=mysqli_query($conn,$select);
$fetch = mysqli_fetch_assoc($s);
$brand = $fetch['l_name'];
$check = $fetch['check'];
$category = $fetch['category'];
$type = $fetch['typeofprint'];
$quantity = $fetch['quantity'];
$size = $fetch['size'];
$color = $fetch['color'];
$details = $fetch['details'];
$img = $fetch['image'];
$comments = $fetch['comment'];
$date = $fetch['Odate'];

// $brand_id = $fetch['lID'];
}
if(isset($_SESSION['localbrand'])){ 

?>
<body class="ho">
<!-- start sec your -->
<section class="yours mb-3" >
    <div class="your">
    <div class="col-md-7 ml-3 col-sm-12">
        <div class="product-grid">
            <div class="product-image" >
                <a  class="image">
                    <img src="/printerly/images/<?php echo $img; ?>" style=" height: 500px;">
                </a>
               
            </div>
            <form method="POST">

            <div class="product-content" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                <h3 class="title"> Brand Name : <a ><?php echo $brand ; ?></a></h3>
                                <h2 style="color: rgba(62, 3, 117, 0.815);">Product Information</h2>
                <div class="">
                <p>Category :  <?php echo $category; ?> </p>
                <p>Type Of Print :  <?php echo $type; ?></p>
                <p>Order Quantity :  <?php echo $quantity; ?></p>
                <p>Order Size :  <?php echo $size; ?></p>
                <p>Order Color :  <?php echo $color; ?></p>
                <p>More Details : <br> <?php echo $details; ?></p>
                </div>
                            <?php  if($check != 'false' && $check != 'pend'){ ?>
                <button type="button" name="accept" class="btn btn-success">Your order Accepted </button>
                <?php if($date !=null){ ?>
                    <p>Order will be delivred: <?php echo $date; ?>             </p>


           <?php } } 
           elseif($check != 'true' && $check != 'pend'){ ?>
                <button type="button" style="background-color" name="accept" class="btn btn-danger">You order Declined </button>
               <?php if($comments !=null){ ?>
              
<div class="p-3 mb-2 bg- text-light border border-secondary rounded-lg" id="comm" style = "background-color:purple; width : 200px; height:fit-content; margin : 0 auto ;">
<!-- <div class="comm"> -->
<p class="text-xl" style="text-align:justify;"> <?php echo $comments; ?></p>

  </div>
           <?php } } elseif($check = 'pend'){?>
            <button type="button" style="color : white;" name="accept" class="btn btn-warning">You order have been pend </button>

            <?php }?>
        </div>
            </form>

        </div>
    </div>
</div>
</section>
<!-- end sec product -->
<br><br><br><br><br><br><br><br><br><br><br>

</body>
<?php }
else{
    header("location: /printerly/local_brand/login.php");
  }
include '/xampp/htdocs/printerly/shared/footer.php';
?>