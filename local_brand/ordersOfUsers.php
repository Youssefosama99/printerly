<?php include '/xampp/htdocs/printerly/nav.php';
$bid = $_SESSION['bid'];
$select = "SELECT * FROM `order`  left join `product` on order.pID = product.pID  left join `categories` on product.Cat_ID = categories.catID left join `user` on order.uID = user.uID   WHERE lID=$bid ORDER BY oID DESC  ";
$s = mysqli_query($conn,$select) ;
if(isset($_SESSION['localbrand'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> Orders of Users </h1>    
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
                    <th scope="col">user Name</th>
                    <th scope="col">user Phone</th>
                    <th scope="col">user Address</th>
                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['P_name']; ?></td>
                <td> <img style="width : 80px; height:70px;"  src="/printerly/images/<?php echo $data['prodphoto']; ?>" alt="">  </td>    
                <td> <?php echo $data['Cname']; ?> </td>    
                <td> <?php echo $data['q_o']; ?> </td>
                <td> <?php echo $data['size']; ?> </td>
                <td> <?php echo $data['color']; ?> </td>
                <td> <?php echo $data['o_price']; ?> </td>
                <td> <?php echo $data['u_name']; ?> </td>
                <td> 0<?php echo $data['phone']; ?> </td>
                <td> <?php echo $data['address']; ?> </td>
                    

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






