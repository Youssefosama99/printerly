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
$color = $_POST['color'];
$color1 = $_POST['color1'];
$color2 = $_POST['color2'];
$color3 = $_POST['color3'];
$color4 = $_POST['color4'];
$color5 = $_POST['color5'];
$color6 = $_POST['color6'];
$color7 = $_POST['color7'];
$color8 = $_POST['color8'];
$color9 = $_POST['color9'];
$insert = "INSERT INTO `colors` VALUES(Null ,'$color','$color1','$color2','$color3','$color4','$color5','$color6',
'$color7','$color8','$color9',$pid)";
$i = mysqli_query($conn, $insert);
header("location: choose_size.php");

}
if(isset($_SESSION['localbrand'])){ 

?>
<body class="ho">

<section class="">
<h1 class="text-center"> Choose colors of products</h1>

  <diV class="sign info text-center">
    <form method="POST">  
    <div class="mb-3 mt-3">
          <input required type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color">
        </div>
        <div class="mb-3 mt-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color1">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color2">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color3">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color4">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color5">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color6">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color7">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color8">
        </div>
        <div class="mb-3">
          <input  type="text" class="form-control inp" id="exampleFormControlInput1" placeholder="please insert color" name="color9">
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