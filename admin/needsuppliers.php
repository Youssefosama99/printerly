<?php include '/xampp/htdocs/printerly/nav.php';

$select = "SELECT * FROM `lbfromsupplier` left join `local_brand` on lbfromsupplier.brand_ID = local_brand.lID  WHERE sup_ID is NULL ";
$s = mysqli_query($conn,$select) ;
if(isset($_SESSION['admin'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> Pend Orders </h1>    
<div class="container col-10 mt-5">
        <table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Type Of print</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Size</th>
                    <th scope="col">color</th>
                    <th scope="col">details</th>
                    <th scope="col">date</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">image</th>
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
                    <td> <?php  echo date('d/m/Y',strtotime($data['date'])); //date('g:i a',strtotime($time_start));?>   </td>
                    <td> <?php echo $data['l_name']; ?> </td>
                    <td> 0<?php echo $data['phone']; ?> </td>
                    <td> <?php echo $data['address']; ?> </td>
                    <td> <img style="width : 80px; height:70px;" src="/printerly/images/<?php echo $data['image']; ?>"> </td>

                    <td> <a class="btn btn-outline-info" 
                        href="/printerly/admin/selectsupplier.php?select=<?php echo $data['ls_ID']; ?>">
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
    header("location: http://localhost/printerly/home.php");


}
include '/xampp/htdocs/printerly/shared/footer.php';
?>






