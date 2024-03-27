<?php include '/xampp/htdocs/printerly/nav.php';
$bid =$_SESSION["bid"] ;
$select = "SELECT * FROM `brandsorder` left join `product` on brandsorder.pID = product.pID left join `supplier` on product.sID=supplier.sID left join `categories` on product.Cat_ID = categories.catID  where bID = $bid ";
$s = mysqli_query($conn,$select) ;
$fetch = mysqli_fetch_assoc($s);
// $supid = $fetch['sup_ID'];
if(isset($_SESSION['localbrand'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> My Orders </h1>    
<div class="container col-10 mt-5">
        <table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Size</th>
                    <th scope="col">color</th>
                    <th scope="col">Order Price</th>
                    <th scope="col">supplier Name</th>
                    <th scope="col">supplier Phone</th>
                    <th scope="col">supplier Address</th>
                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['P_name']; ?></td>
                <td> <img style="width : 80px; height:70px;" src="/printerly/images/<?php echo $data['prodphoto']; ?>" alt="">  </td>    
                <td> <?php echo $data['Cname']; ?> </td>    
                <td> <?php echo $data['q_o']; ?> </td>
                <td> <?php echo $data['size']; ?> </td>
                <td> <?php echo $data['color']; ?> </td>
                <td> <?php echo $data['o_price']; ?> </td>
                <td> <?php echo $data['s_name']; ?> </td>
                <td> 0<?php echo $data['phone']; ?> </td>
                <td> <?php echo $data['address']; ?> </td>
                    

</tr> 
</tr>
 <?php } ?>
    </table>
    <hr>
</div>            </body>
<?php }
else{
    header("location: /printerly/local_brand/login.php");
  }
include '/xampp/htdocs/printerly/shared/footer.php';
?>





