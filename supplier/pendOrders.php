<?php include '/xampp/htdocs/printerly/nav.php';
$sid = $_SESSION["sid"];
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

if(isset($_POST['accept'])){
    $update = "UPDATE  `lbfromsupplier` SET `check`='true' WHERE ls_ID=$oid";
    $u = mysqli_query($conn, $update);
    header("Refresh:0.2; url=pendorders.php?order=$oid");
}
if(isset($_POST['decline'])){
    $update = "UPDATE  `lbfromsupplier` SET `check`='false' WHERE ls_ID=$oid";
    $u = mysqli_query($conn, $update);
    header("Refresh:0.2; url=pendorders.php?order=$oid");

}
if(isset($_POST['add'])){
$comment = addSlashes($_POST['comment']);
$update = "UPDATE  `lbfromsupplier` SET `comment`='$comment' WHERE ls_ID=$oid";
    $u = mysqli_query($conn, $update);
    header("Refresh:0.2; url=pendorders.php?order=$oid");
}
if(isset($_POST['add2'])){
    $date = $_POST['date'];
    $update = "UPDATE  `lbfromsupplier` SET `Odate`='$date' WHERE ls_ID=$oid";
        $u = mysqli_query($conn, $update);
        header("Refresh:0.2; url=pendorders.php?order=$oid");
    }
    
}
if(isset($_SESSION['supplier'])){ 

?>
<body class="ho">
<!-- start sec your -->
<section class="yours">
    <div class="your">
    <div class="col-md-7 ml-4 col-sm-12">
        <div class="product-grid">
            <div class="product-image" >
                <a  class="image">
                    <img src="/printerly/images/<?php echo $img; ?>" style=" height: 500px;">
                </a>
               
            </div>
            <form method="POST">

            <div class="product-content" style="font-family: Georgia, 'Times New Roman', Times, serif; ">
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
                <?php if($check != 'true' && $check != 'false' ){ ?>
                <button type="submit" name="accept" class="order">Accept</button>
                <button type="submit" name="decline" class="dec">Decline</button>
            <?php } elseif($check != 'false'){ ?>
                <button type="button" name="accept" class="btn btn-success">You Have Accept it</button>
                <?php if($date ==Null){ ?>  
                <p>Date :</p>

<input type="date" id="start" name="date"  value="<?php echo $date ?>"
       
       min="<?php echo date("Y-m-d") ?>" max="2023-12-31" required>

<br>       <button name="add2" class="btn btn-primary mt-3" value="" style="margin : 0 auto ;"><i class="fa-solid fa-paper-plane"></i> Add</button>




           <?php } 
             if($date !=Null){ ?> 
                            <p>You Have to deliver Order At: <?php echo $date; ?>             </p>



        <?php } }
           elseif($check != 'true'){ ?>
                <button type="button" style="background-color" name="accept" class="btn btn-danger">You Have Declined it</button>
               <?php if($comments ==null){ ?>
                <div class="form-group mt-2">
    <label >ADD comment</label>
                                <label for="exampleFormControlTextarea1"></label>
                                <textarea style="width : 300px; height: 150px;  resize: none; margin : 0 auto ;"  class="form-control" id="exampleFormControlTextarea1" name="comment" rows="5"
                                    placeholder="what's on your mind ......"></textarea>

                   
</div>
<button name="add" class="btn btn-primary" value="" style="margin : 0 auto ;"><i class="fa-solid fa-paper-plane"></i> Add</button>


           <?php } 
        
         if($comments !=null){ ?>

<div class="p-3 mb-2 bg- text-light border border-secondary rounded-lg" id="comm" style = "background-color:purple; width : 200px; height:fit-content; margin : 0 auto ;">
<!-- <div class="comm"> -->
<p class="text-xl" style="text-align:justify;"> <?php echo $comments; ?></p>

  </div>

        
<?php } } ?>

        </div>
            </form>

        </div>
    </div>
</div>
</section>
<!-- end sec product -->

</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php 
}
else{
  header("location: /printerly/supplier/login.php");
}

include '/xampp/htdocs/printerly/shared/footer.php';
?>