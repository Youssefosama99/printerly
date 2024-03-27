<?php 
include '/xampp/htdocs/printerly/nav.php';
$select ="SELECT * From `product` left join `categories` on product.Cat_ID = categories.catID left join `local_brand` on product.lID = local_brand.lID  where categories.catID =3 and  `sID` is null";
$s =mysqli_query($conn , $select);
if (isset($_GET["search"])) {
    $searched = addSlashes($_GET["searched"]);
    header("location: /printerly/user/products/searchproduct.php?searched=" . $searched);
}
if(!isset($_SESSION['localbrand']) &&  !isset($_SESSION['admin']) &&  !isset($_SESSION['supplier'])){ ?>


<body class="ho">
    <!-- start sec nav-->
   
<!-- start sec all -->



<body class="ho">
<section class="tote">
    <div class="bag">

    </div>
</section>
<!-- end sec background -->
<!-- start sec hoodies -->
<div class="prods">
<div class="input-group" style="padding-left : 580px;">
<form class="d-flex" method="GET"> 
<div class="form-outline">
    <input type="search" id="form1" name="searched" placeholder="Search available Products" class="form-control" />
  </div>
  <div class="mb-4" style="margin-top : -11px;"> 
  <button type="submit" class="btn btn-primary" name="search" style="height:40px; background-color:purple; border:purple;">
    <i class="fas fa-search">Search</i>
  </button>
</form> 
</div>
</div>
<div class="row row-cols-1 row-cols-md-4 g-4">
        <?php foreach($s as $data){?>
   
        <div class="col mt-3 mb-3 text-center">

        <div class="product-grid">

            <div class="product-image">

                <a href="#" class="image">
                    <img style="height:300px;" src="/printerly/images/<?php echo $data['prodphoto']; ?>">
                </a>
             <span class="product-discount-label"><?php echo(round($data['price_after_discount']/$data['price']*100-100)) ; ?> %</span>
               
                <a href="product.php?pID=<?php echo $data ['pID']?>" class="add-to-cart">Order Now</a>
            </div>
            <div class="product-content">
            <h3 class="title"><a href="product.php?pID=<?php echo $data ['pID']?>"><?php echo $data['P_name']; ?></a></h3>
            <p class="title"> <a href="brandproducts.php?bID=<?php echo $data ['lID']?> "> <?php echo $data['l_name']; ?> </a></p>
   
            <div class="price"> <?php echo  $data['price_after_discount'] ?> 
                <?php if($data['discount'] != 0){ ?>

                <span><?php echo $data['price']; ?>
                <?php }?>
            </span></div>
            </div>

        </div>
    
    </div>
    <?php } ?>

     </div>

    </div>
<!-- end sec hoodies -->
</body>

<?php } include '/xampp/htdocs/printerly/shared/footer.php'; ?>
