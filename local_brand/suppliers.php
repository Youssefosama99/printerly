<?php include '/xampp/htdocs/printerly/nav.php';

$select = "SELECT * FROM `supplier` ";
$s = mysqli_query($conn,$select) ;
if(isset($_SESSION['localbrand'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> suppliers </h1>    
<div class="container col-8 mt-5">
        <table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Facebook</th>
                    <th scope="col">Instagram</th>
                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                <td> <?php echo $data['s_name']; ?></td>
                    <td>0<?php echo $data['phone']; ?> </td>
                    <td> <?php echo $data['address']; ?> </td>
                    <td><a href="<?php echo $data['Flink']; ?>" target=”_blank”>  facebook </a>  </td>
                    <td><a href="<?php echo $data['ilink']; ?>" target=”_blank”> Instagram </a>  </td>

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






