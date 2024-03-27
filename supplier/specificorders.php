<?php include '/xampp/htdocs/printerly/nav.php';
$sid = $_SESSION["sid"] ;
$select = "SELECT * FROM `lbfromsupplier` left join `local_brand` on lbfromsupplier.brand_ID = local_brand.lID  where sup_ID = $sid ";
$s = mysqli_query($conn,$select) ;
if(isset($_SESSION['supplier'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> Specific Orders </h1>    
<div class="container col-8 mt-5">
        <table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Type Of print</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">action</th>

                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['category']; ?></td>
                    <td> <?php echo $data['typeofprint']; ?> </td>
                    <td> <?php echo $data['quantity']; ?> </td>
                    <td> <?php  echo date('d/m/Y',strtotime($data['date'])); //date('g:i a',strtotime($time_start));?>   </td>
                    <td> <?php echo $data['l_name']; ?> </td>
                    <td> 0<?php echo $data['phone']; ?> </td>
                    <td> <?php echo $data['address']; ?> </td>
                    <td> <a class="btn btn-outline-info" 
                        href="/printerly/supplier/pendOrders.php?order=<?php echo $data['ls_ID']; ?>">
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
    header("location: /printerly/supplier/login.php");
}

include '/xampp/htdocs/printerly/shared/footer.php';
?>






