<footer class="footer-section"> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="/printerly/js/bootstrap.bundle.min.js"></script>
<!-- <script src="/printerly/js/bootstrap.min.js"></script>
<script src="/printerly/js/popper.min.js"></script>
<script src="/printerly/js/jquery.slim.min.js"></script> -->

<div class="container" style="margin-top:700px;">
          <div class="footer-cta pt-5 pb-5">
              <div class="row">
                  <div class="col-xl-4 col-md-4 mb-30">
                      <div class="single-cta">
                          <i class="fas fa-map-marker-alt"></i>
                          <div class="cta-text">
                              <h4>Find us</h4>
                              <span>Egypt,cairo,Ramsis</span>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-md-4 mb-30">
                      <div class="single-cta">
                          <i class="fas fa-phone"></i>
                          <div class="cta-text">
                              <h4>Call us</h4>
                              <span>01272054372</span>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-md-4 mb-30">
                      <div class="single-cta">
                          <i class="far fa-envelope-open"></i>
                          <div class="cta-text">
                              <h4>Mail us</h4>
                              <span>Printerly@gamil.com</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="footer-content pt-5 pb-5">
              <div class="row">
                  <div class="col-xl-4 col-lg-4 mb-50">
                      <div class="footer-widget">
                          <div class="footer-logo">
                              <a href="/printerly/home.php"><img src="/printerly/photo/logooo.png" class="img-fluid" alt="logo"></a>
                          </div>
                          <div class="footer-text">
                              <p>Printing is the process of reproducing text or images on paper or other materials. There are several different methods of printing, each with its own advantages and disadvantages.
                              </p>
                          </div>
                          <div class="footer-social-icon">
                              <span>Follow us</span>
                              <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                              <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                              <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                      <div class="footer-widget">
                          <div class="footer-widget-heading">
                              <h3>Useful Links</h3>
                          </div>
                          <ul>
                              <li><a href="/printerly/home.php">Home</a></li>
                              <li><a href="/printerly/about.php">about</a></li>
                              <?php if(isset($_SESSION['user'])){?>
                              <li><a href="/printerly/user/products/allproducts.php">Shop</a></li>
                              <?php } ?>
                              <?php if(isset($_SESSION['localbrand'])){?>
                              <li><a href="/printerly/local_brand/allproducts.php">Shop</a></li>
                              <?php } ?>

                              <li><a href="/printerly/contact.php">Contact</a></li>
                             
                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                      <div class="footer-widget">
                          <div class="footer-widget-heading">
                              <h3>Subscribe</h3>
                          </div>
                          <div class="footer-text mb-25">
                              <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                          </div>
                          <div style="color:white;">
                            <p>Printerly@gamil.com</p>
                          </div>
                          <!-- <div class="subscribe-form">
                              <form action="#">
                                  <input type="text" placeholder="Email Address">
                                  <button><i class="fab fa-telegram-plane"></i></button>
                              </form>
                          </div> -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="copyright-area">
          <div class="container">
              <div class="row">
                  <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                      <div class="copyright-text">
                      <p>Copyright &copy; 2023, All Rights Reserved  <a href="https://codepen.io/anupkumar92/"></a></p>
                          <p>Designed and Implemented By Omnia & Youssef</p>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                      <div class="footer-menu">
                          <ul>
                              <li><a href="/printerly/home.php">Home</a></li>
                              <li><a href="/printerly/about.php">About</a></li>
                              <li><a href="/printerly/contact.php">Contact</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  </body>
</html> 
