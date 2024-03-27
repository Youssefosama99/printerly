<?php 
include '/xampp/htdocs/printerly/nav.php';
$select = "SELECT * FROM `supplier` ";
$s = mysqli_query($conn,$select) ;
if(isset($_GET['delete'])){

  $id = $_GET['delete'];
  $delete = "DELETE  FROM `supplier` WHERE sID =$id";
 $d= mysqli_query($conn , $delete);
 
 header( "refresh:0.2;url=suppliers.php" );
}
if(isset($_GET['paid'])){

    $pid = $_GET['paid'];
    $update = "UPDATE `supplier` SET payment='true' WHERE sID =$pid;";
   $u= mysqli_query($conn , $update);
   header("location: suppliers.php");   
}
  if(isset($_GET['unpaid'])){

    $pid = $_GET['unpaid'];
    $update = "UPDATE `supplier` SET payment='false' WHERE sID =$pid;";
   $u= mysqli_query($conn , $update);
   header("location: suppliers.php");

}
if(isset($_SESSION['admin'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> Suppliers </h1>    
<div class="container col-11 mt-5">
<table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Intsagram</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Delete</th>
                    <th scope="col-4">Payment</th>
                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['s_name']; ?></td>
                    <td> <?php echo $data['s_email']; ?> </td>
                    <td> 0<?php echo $data['phone']; ?> </td>
                    <td> <?php echo $data['address']; ?> </td>
                    <td><a href="<?php echo $data['Flink']; ?>" target=”_blank”> Facbook</a>  </td>
                    <td><a href="<?php echo $data['ilink']; ?>" target=”_blank”> Instagram</a>  </td>
                    <td> <?php echo $data['payment']; ?> </td>

                    <td> <a onclick="return confirm('Are You Sure?');"
 class="btn btn-danger " href="./suppliers.php?delete=<?php echo $data['sID'];?>"><i class=" fa-solid fa-trash"></i>delete</a>  </td>
 <td> <a onclick="return confirm('Are You Sure?');"
 class="btn btn-success  " href="./suppliers.php?paid=<?php echo $data['sID'];?>"> Paid</a>   <a onclick="return confirm('Are You Sure?');"
 class="btn btn-info  " href="./suppliers.php?unpaid=<?php echo $data['sID'];?>"> unPaid</a>  </td>

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