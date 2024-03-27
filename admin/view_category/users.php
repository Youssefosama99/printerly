<?php 
include '/xampp/htdocs/printerly/nav.php';
$select = "SELECT * FROM `user` ";
$s = mysqli_query($conn,$select) ;
if(isset($_GET['delete'])){

  $id = $_GET['delete'];
  $delete = "DELETE  FROM `user` WHERE uID =$id";
 $d= mysqli_query($conn , $delete);
 header( "refresh:0.2;url=users.php" );
 
}
if(isset($_SESSION['admin'])){ 


?>
<body class="ho">

<h1 class="text-center mt-3" style="color : rgb(175,92, 205);"> Users </h1>    
<div class="container col-8 mt-5">
<table class="table table-dark table-hover" style="background-color:purple; color: white;">

                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Delete</th>
                </tr>
            <?php foreach ($s as $data ) { ?>
<tr>
                      <td> <?php echo $data['u_name']; ?></td>
                    <td> <?php echo $data['u_email']; ?> </td>
                    <td> <?php echo $data['phone']; ?> </td>
                    <td> <?php echo $data['address']; ?> </td>

                    <td> <a onclick="return confirm('Are You Sure?');"
 class="btn btn-danger " href="./users.php?delete=<?php echo $data['uID'];?>"><i class=" fa-solid fa-trash"></i> delete</a>  </td>
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