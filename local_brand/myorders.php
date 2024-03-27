<?php include '/xampp/htdocs/printerly/nav.php';
$bid =$_SESSION["bid"] ;
$select = "SELECT * FROM `lbfromsupplier`  left join `supplier` on lbfromsupplier.sup_ID = supplier.sID where brand_ID = $bid ";
$s = mysqli_query($conn,$select) ;
$fetch = mysqli_fetch_assoc($s);
@$supid = $fetch['sup_ID'];
if(isset($_SESSION['localbrand'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> My specific Orders </h1>    
<div class="container col-10 mt-5">
        <table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Type Of print</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Size</th>
                    <th scope="col">Color</th>
                    <th scope="col">Details</th>
                    <th scope="col">Image</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">action</th>

                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['category']; ?></td>
                    <td> <?php echo $data['typeofprint']; ?> </td>
                    <td> <?php echo $data['quantity']; ?> </td>
                    <td> <?php echo $data['size']; ?> </td>
                    <td> <?php echo $data['color']; ?> </td>
                    <td> <?php echo $data['details']; ?> </td>
                    <td> <img style="width : 80px; height:70px;" src="/printerly/images/<?php echo $data['image']; ?>" alt="">  </td>
                    <td> <?php echo $data['s_name']; ?> </td>
                    <td> <?php echo $data['phone']; ?> </td>
                    <td> <?php echo $data['address']; ?> </td>
                    <td> <a class="btn btn-outline-info" 
                        href="/printerly/local_brand/orderdetails.php?order=<?php echo $data['ls_ID']; ?>">
                         <i class="fa-solid fa-eye"></i> view</a> </td>
</tr> 
</tr>
 <?php } ?>
    </table>
    <hr>
</div>
            </body>
<?php }
else{
    header("location: /printerly/local_brand/login.php");
  }

include '/xampp/htdocs/printerly/shared/footer.php';
?>






