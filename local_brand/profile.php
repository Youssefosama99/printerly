<?php 
include '/xampp/htdocs/printerly/nav.php';
$bid = $_SESSION['bid'];
$select ="SELECT * FROM `local_brand` WHERE lID=$bid ";
$s= mysqli_query($conn, $select);
$fetch = mysqli_fetch_assoc($s); 
if(isset($_SESSION['localbrand'])){ 

?>
<body class="prof">
  
<section class="h-100 gradient-custom-2">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-9 col-xl-7">
            <div class="card">
              <div class="rounded-top text-white d-flex flex-row" style="background-color: #f3eded; height:200px;">
                <div class="ms-4 mt-5 d-flex -column" style="  width: 150px; height: 170px; ">
                <img src="/printerly/images/<?php echo $fetch['photo']; ?>"
                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                    style="width: 150px height: 170px;   z-index: 1">
                    <a type="button" href="./signup.php?edit=<?php echo $fetch['lID']; ?>" style="margin-top:170px; margin-left:-125px; height:40px; z-index: 2" class="btn btn-outline-dark text-center" data-mdb-ripple-color="dark"
                    >
                    Edit profile </a>
                </div>
                <div class="ms-3" style="margin-top: 130px;">
                  <h5 style="color: purple;"> <?php echo $fetch['l_name']; ?></h5>
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
                    <div class="font-italic mb-1" >Name:  <?php echo $fetch['l_name']; ?></div>
                    <p class="font-italic mb-1">Phone: 0<?php echo $fetch['phone']; ?></p>
                    <p class="font-italic mb-0">Email: <?php echo $fetch['l_email']; ?></p>
                  </div>
                </div>
                <!-- <div class="d-flex justify-content-between align-items-center mb-4"style="color: #000; ;">
                  <p class="lead fw-normal mb-0">Recent Products </p>
                  <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                </div> -->
                <!-- <div class="row g-2">
                  <div class="col mb-2">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp"
                      alt="image 1" class="w-100 rounded-3">
                  </div>
                </div> -->
                
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php }
else{
    header("location: /printerly/local_brand/login.php");
  }
include '/xampp/htdocs/printerly/shared/footer.php';
?>
