<?php include '/xampp/htdocs/printerly/nav.php';
   $bid = $_SESSION['bid'];
   $select="  SELECT * FROM `product`  where lID=$bid";
   $s=mysqli_query($conn , $select);
   
   $cnt = 0;
   foreach($s as $data ){
       
        
       if($cnt == 1) break;
       $cnt--;
    $pid = $data['pID'];
   }

if(isset($_POST['send'])){
$size = $_POST['size'];
$size1 = $_POST['size1'];
$size2 = $_POST['size2'];
$size3 = $_POST['size3'];
$size4 = $_POST['size4'];
$size5 = $_POST['size5'];

$insert = "INSERT INTO `sizes` VALUES(Null ,'$size','$size1','$size2','$size3','$size4','$size5',$pid)";
$i = mysqli_query($conn, $insert);
header("location: profile.php");

}
if(isset($_SESSION['localbrand'])){ 

?>
<body class="ho">

<section class="mt-5">
<h1 class="text-center"> Choose size of products</h1>

  <diV class="sign info text-center">
    <form method="POST">  
        <div class="mb-3 mt-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert size" name="size">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert size" name="size1">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert size" name="size2">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert size" name="size3">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert size" name="size4">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert size" name="size5">
        </div>
               <div>
          <button type="submit" style="background-color: purple; border:purple;" class="btn btn-info su" name="send">Submit</button>
  </div>

     
        </form>
      </diV>
  </section>
</body>        
<?php }
else{
  header("location: /printerly/local_brand/login.php");
}

include '/xampp/htdocs/printerly/shared/footer.php';
?>