<?php 
include '/xampp/htdocs/printerly/nav.php';
@$uid = $_SESSION["uid"];
$select ="SELECT * FROM `user` WHERE uID=$uid ";
$s= mysqli_query($conn, $select);
if(isset($_SESSION['user'])){

$fetch = mysqli_fetch_assoc($s); 

?>
<body class="prof">
  

<section class=" gradient-custom-2">
      <div class="container py-5 ">
        <div class="row d-flex justify-content-center align-items-center ">
          <div class="col col-lg-9 col-xl-7">
            <div class="card">
              <div class="rounded-top text-white d-flex flex-row" style="background-color: #f3eded; height:200px;">
                <div class="ms-4 mt-5 d-flex -column" style="  width: 150px; height: 170px; ">
                <img src="/printerly/images/<?php echo $fetch['photo']; ?>"
                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                    style="width: 150px height: 170px;   z-index: 1">
                  <a type="button" href="./signup.php?edit=<?php echo $fetch['uID']; ?>" style="margin-top:170px; margin-left:-125px; height:40px; z-index: 2" class="btn btn-outline-dark text-center" data-mdb-ripple-color="dark"
                    >
                    Edit profile </a>
                </div>
                <div class="ms-3" style="margin-top: 130px;">
                  <h5 style="color: purple;"> <?php echo $fetch['u_name']; ?></h5>
                  <p style="color: purple;"><?php echo $fetch['address']; ?></p>
                </div>
              </div>
              <div class="p-4 text-black" style="background-color: #f8f9fa;">
                <div class="d-flex justify-content-end text-center py-1">
                  
              </div>
              <div class="card-body p-4 text-black">
                <div class="mb-5">
                <br>
                <br>
                  <div class="p-4" style="background-color:purple; color: white;">
                    <div class="font-italic mb-1" >Name:  <?php echo $fetch['u_name']; ?></div>
                    <p class="font-italic mb-1">Phone: 0<?php echo $fetch['phone']; ?></p>
                    <p class="font-italic mb-0">Email: <?php echo $fetch['u_email']; ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4"style="color: #000; ;">
                  <p class="lead fw-normal mb-0">My Orders </p>
                </div>
                <div class="container col-12" style=" background-color: #f8f9fa !important; margin-left:-23px; ">

<table  class="table table-dark table-hover m-auto" style="background-color:purple; color: white;">
 
<?php $sel=" SELECT * FROM `order`  JOIN `product` ON order.pID=product.pID JOIN `local_brand` ON  product.lID=local_brand.lID WHERE order.uID=$uid  ";
$x=mysqli_query($conn,$sel);
?>

    <tr>
        <th>product_name</th>
        <th>color</th>
        <th>quantity</th>
        <th>price</th>
        <th>brand_name</th>
        <th>date</th>

    </tr>
    <?php foreach($x as $DATA){
?>
    <tr>
        <td> <?php echo $DATA['P_name'] ?> </td>
        <td> <?php echo $DATA['color'] ?> </td>
       <td> <?php echo $DATA['q_o'] ?> </td>
        <td>  <?php echo $DATA['o_price'] ?> </td>
        <td>  <?php echo $DATA['l_name'] ?> </td>
        <td> <?php  echo date('d/m/Y',strtotime($DATA['date'])); //date('g:i a',strtotime($time_start));?>   </td>

        
    </tr>
<?php } ?>
</table>


</div>

                
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </body>
    
<?php } else{
  header("location: /printerly/user/login.php");

}
include '/xampp/htdocs/printerly/shared/footer.php';
?>
