<?php 
include 'config.php';
include 'header.php';
session_start();
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location: http://localhost/printerly/home.php");
  }
  
?>
   <section class="nav">
 <nav class="navbar navbar-expand-lg navbar">
        <div class="container">
            <img src="/printerly/photo/tshirt (2).png"  alt="">
          <a class="navbar-brand" href="/printerly/home.php">Printerly</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/printerly/home.php">Home</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link active" href="/printerly/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/printerly/contact.php">Contact</a>
              </li>
              <?php   if(isset($_SESSION['supplier'])){ ?>
               
              <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Orders
        </a>
      <div class="dropdown-menu" style="background-color: purple;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/printerly/supplier/specificorders.php">specific Orders</a>
          <a class="dropdown-item" href="/printerly/supplier/orders.php">Brands Orders</a>

      </li>
              <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
      <div class="dropdown-menu" style="background-color: purple;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/printerly/supplier/products/addproducts.php">Add Product</a>
          <a class="dropdown-item" href="/printerly/supplier/products/myproducts.php">My products</a>

      </li>
            </ul>
          </div>
              <li class="nav-item dropdown active" style="postion : absolute; left:850;">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa-regular fa-user"></i>  </a>

<div class="dropdown-menu" style="background-color: purple; aria-labelledby=navbarDropdown">

    <a class="dropdown-item" href="/printerly/supplier/profile.php"> View Profile</a>
    <form class="form-inline my-2 my-lg-0" method="GET">
    <button class="btn btn-danger my-2 my-sm-0 ml-2" name="logout" type="submit" style="width:120px;"><i class="fa-solid fa-right-from-bracket"></i></button>
    </form> 
  </li>
  
  

              <?php     }
if(isset($_SESSION['localbrand'])){
  ?>
              <li class="nav-item">
                <a class="nav-link active" href="/printerly/local_brand/suppliers.php" style="">suppliers</a>
              </li>
              <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        
      <div class="dropdown-menu" style="background-color: purple;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item"   href="/printerly/local_brand/addproducts.php">Add Product</a>
      <a class="dropdown-item"  href="/printerly/local_brand/myproducts.php">My Products</a>
      <a class="dropdown-item"  href="/printerly/local_brand/allproducts.php">supplier Products</a>

      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Orders
        </a>
        
      <div class="dropdown-menu" style="background-color: purple;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/printerly/local_brand/ordersOfUsers.php" style="">Orders of Users</a>  
      <a class="dropdown-item" href="/printerly/local_brand/specific_order.php" style="">Specific_Order</a>  
      <a class="dropdown-item" href="/printerly/local_brand/myorders.php" style="">My Specific Orders</a>  
      <a class="dropdown-item" href="/printerly/local_brand/ordersfromsupplier.php" style="">My  Orders</a>  

    </li>

    <?php }  if(isset($_SESSION['admin'])){ ?>
                            <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View_categories
        </a>
        
      <div class="dropdown-menu" style="background-color: purple;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/printerly/admin/view_category/localbrands.php">Local Brands</a>
      <a class="dropdown-item" href="/printerly/admin/view_category/suppliers.php">Suppliers</a>
      <a class="dropdown-item" href="/printerly/admin/view_category/users.php">Users</a>

      </li>
            </ul>
          </div>
          <li class="nav-item">
                <a class="nav-link active" href="/printerly/admin/needsuppliers.php" style="">pend_Orders</a>
              </li>
              <form class="form-inline my-2 my-lg-0" method="GET">
              <li class="nav-item">
<button class="btn btn-danger my-2 my-sm-0" name="logout" type="submit" style="width:120px; margin-left:700px;"><i class="fa-solid fa-right-from-bracket"></i></button>
    </li>
</form> 




              <?php }  
              // if(isset($_SESSION['user'])){
                if(!isset($_SESSION['localbrand']) &&  !isset($_SESSION['admin']) &&  !isset($_SESSION['supplier'])){ ?>

                
                            <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        
      <div class="dropdown-menu" style="background-color: purple;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/printerly/user/products/allproducts.php">All Products</a>
          <a class="dropdown-item" href="/printerly/user/products/T-shirts.php">T-shirt</a>
          <a class="dropdown-item" href="/printerly/user/products/tote_bag.php">ToteBag</a>
          <a class="dropdown-item" href="/printerly/user/products/hoodies.php">Hoodies</a>

      </li>
            </ul>
          </div>
          <?php 
       } 
           if(!isset($_SESSION['user']) && !isset($_SESSION['localbrand']) &&  !isset($_SESSION['admin']) &&  !isset($_SESSION['supplier'])){ ?>

<li class="nav-item dropdown active">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Login
  </a>

<div class="dropdown-menu" style="background-color: purple; aria-labelledby=navbarDropdown">
    <a class="dropdown-item" href="/printerly/user/login.php">as user</a>
    <a class="dropdown-item" href="/printerly/local_brand/login.php">as Local brand </a>
    <a class="dropdown-item" href="/printerly/supplier/login.php">as Supplier</a>
    </li>

<?php }    if(isset($_SESSION['user'])){?>

        <li class="nav-item dropdown active" style="postion : absolute; left:900;">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa-regular fa-user"></i>  </a>

<div class="dropdown-menu" style="background-color: purple; aria-labelledby=navbarDropdown">
    <a class="dropdown-item" href="/printerly/user/profile.php"> View Profile</a>
    <form class="form-inline my-2 my-lg-0" method="GET">
    <button class="btn btn-danger my-2 my-sm-0 ml-2" name="logout" type="submit" style="width:120px;"><i class="fa-solid fa-right-from-bracket"></i></button>
    </form> 
  </li>
  
<?php }    
if(isset($_SESSION['localbrand'])){
  ?>

<li class="nav-item dropdown active" style="postion : absolute; left:750;">
<a class="nav-link dropdown-toggle" href="/printerly/local_brand/profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa-regular fa-user"></i>  </a>

<div class="dropdown-menu" style="background-color: purple; aria-labelledby=navbarDropdown">
<a class="dropdown-item" href="/printerly/local_brand/profile.php"> View Profile</a>
<form class="form-inline my-2 my-lg-0" method="GET">
<button class="btn btn-danger my-2 my-sm-0 ml-2" name="logout" type="submit" style="width:120px;"><i class="fa-solid fa-right-from-bracket"></i></button>
</form> 
</li>
<?php } ?>

</div>
      </nav>
      </section>
