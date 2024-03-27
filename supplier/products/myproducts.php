<?php include '/xampp/htdocs/printerly/nav.php';
$sid = $_SESSION['sid'];
$select = "SELECT * FROM `product` left join `categories` on product.Cat_ID = categories.catID  WHERE sID=$sid ";
$s = mysqli_query($conn,$select) ;
if(isset($_SESSION['supplier'])){ 
    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
      $delete="DELETE FROM `product` WHERE pID=$id";
      $del=mysqli_query($conn,$delete);
    //   header("Location: myproducts.php " );
    }
     

?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> My Products </h1>    
<div class="container col-10 mt-5">
        <table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Product_Name</th>
                    <th scope="col">Product_Price</th>
                    <th scope="col">Product_discount</th>
                    <th scope="col">Price_after_discount</th>
                    <th scope="col">desc</th>
                    <th scope="col">Quantity </th>
                    <th scope="col">photo</th>
                    <th scope="col">Category </th>
                    <th scope="col-3" class="text-center ml-5" >Actions </th>

                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['P_name']; ?></td>
                <td> <?php echo $data['price']; ?> </td>    
                <td> <?php echo $data['discount']; ?> </td>
                <td> <?php echo $data['price_after_discount']; ?> </td>
                <td> <?php echo $data['desc']; ?> </td>
                <td> <?php echo $data['quantity']; ?> </td>
                <td> <img style="width : 80px; height:70px;" src="/printerly/images/<?php echo $data['prodphoto']; ?>" alt="">  </td>
                <td> <?php echo $data['Cname']; ?> </td> 
                <td> 
                    <a class="btn btn-outline-primary"
                    
                        href="/printerly/supplier/products/addproducts.php/?edit=<?php echo $data['pID']; ?>"> <i
                            class="far fa-edit"></i>ُEdit </a>
                            </td>
                            <td>
                    <a class="btn btn-outline-danger" onclick=" return confirm('Are You Sure?')"
                    
                        href="/printerly/supplier/products/myproducts.php/?delete=<?php echo $data['pID']; ?>"> <i
                            class="fas fa-trash-alt"></i> Delete</a>
                </td>
</tr> 
</tr>
 <?php } ?>
    </table>
    <hr>
</div>
            </body>
<?php }
else{
    header("location: /printerly/supplier/login.php");
}

include '/xampp/htdocs/printerly/shared/footer.php';
?>






