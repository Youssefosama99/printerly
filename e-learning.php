<?php 
include '/xampp/htdocs/printerly/nav.php';
if(isset($_SESSION['localbrand'])){ 

?>
<head>
  <style>
      #myVideo {
    right: 0;
    bottom: 0px;
    width: 100%;
    min-height:100%;
    

  }
  
  /* Add some content at the bottom of the video/page */
  .content {
    position: sticky;
    bottom: 0px;
    background: rgba(0, 0, 0, 0.173);
    color: #f1f1f1;
    width: 100%;
    padding: 20px;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: larger;
    overflow: hidden;

  }
  
  /* Style the button used to pause/play the video */
  #myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #3f3e3e;
    color: #fff;
    cursor: pointer;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
  
  #myBtn:hover {
    background: #680457;
    color: rgb(0, 0, 0);
  }
  /*end vid*/

  /*start sec steps*/
 .tstep1{
float: left;
width: 40%;
margin-left: 100px;
font-style:italic;
margin-top: 40px;
color: #7b0c63;

}
.istep1{
    float: right;
    width: 40%;
    margin-right: 100px;
    margin-top: 50px;
  
}
.step1{
    padding: 50px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 18px;

}
.step2{
  padding: 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 18px;
}
.step3{
  padding: 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 18px;
}
.step4{
  padding: 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 18px;
}
.step5{
  padding: 50px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 18px;

  }
.veve{
  padding-left: 350px;
  padding-top: 450px;
  padding-bottom: 150px;
  margin-top: 600px;

}
.type{
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
 

}
.card-deck{
  margin : 0px ;
}

  </style>
</head>
<body class="ho">
<div class="bvid">
<video autoplay muted loop id="myVideo">
  <source src="/printerly/images//vid printing.mp4" type="video/mp4">
</video>

<!-- Optional: some overlay text to describe the video -->
<div class="content">
  <h1>Printing</h1>
  <p>Printing is the process of reproducing text or images on paper or other materials. There are several different methods of printing, each with its own advantages and disadvantages.
  </p>
  <!-- Use a button to pause/play the video with JavaScript -->
  <button id="myBtn" onclick="myFunction()">Pause</button>
</div>
</div>


<!-- end sec background -->
<br>

<!-- start sec steps -->

 <section class="step1">
  <div class="tstep1" style="margin-top: 60px;  ">
    <h1>1. Offset Printing</h1>
    <h2>Offset printing uses a printing plate and ink to transfer an image onto a rubber blanket, which then transfers the image onto paper. It is a highly precise method of printing that produces high-quality images and text.
    </h2>
    </div>
    <div class="istep1">
      <img src="/printerly/images/offset-printing.jpg" alt="" style="width:450px; height: 300px;">
    </div>
 </section>
<hr>
 <br>
 <br>
 <section class="step2">
  <div class="tstep1" style="margin-top: 90px;  ">
    <h1>2. Digital Printing</h1>
    <h2>Digital printing uses a digital file to print directly onto paper or other materials. It is a more cost-effective method of printing for small print runs, and it allows for greater flexibility in design and customization.
    </h2>
    </div>
    <div class="istep1">
      <img src="/printerly/images/digital printing.webp" style="width:450px; height: 300px;" alt="">
    </div>
 </section>
<hr>
 <br>
 <br>
 <section class="step3">
  <div class="tstep1" style="margin-top: 120px;  ">
    <h1>3. Screen Printing</h1>
    <h2>Screen printing involves creating a stencil and applying ink through the stencil onto the printing surface. It is commonly used for printing on clothing, signs, and other materials.
    </h2>
    </div>
    <div class="istep1">
      <img src="/printerly/images/screen printing.jpg" style="width:450px; height: 300px;" alt="">
    </div>
 </section>
<hr>
 <br>
 <br>
 <section class="step4">
  <div class="tstep1" style="margin-top: 130px;  " >
    <h1>4. Flexographic Printing</h1>
    <h2>Flexographic printing uses flexible printing plates and quick-drying inks to print on a variety of materials, including paper, plastic, and metal.
    </h2>
    </div>
    <div class="istep1">
      <img src="/printerly/images/Flexographic Printing.jpg" style="width:450px; height: 300px;" alt="">
    </div>
 </section>
<hr>
 <br>
 <br>
 <section class="step5">
  <div class="tstep1" style="margin-top: 110px;  " >
    <h1>5. Gravure Printing</h1>
    <h2>Gravure printing involves engraving an image onto a cylinder, which is then used to transfer ink onto paper or other materials. It is often used for printing high-quality images, such as in magazines and catalogs.</h2>
    </div>
    <div class="istep1">
      <img src="/printerly/images/Gravure Printing.jpg" style="width:450px; height: 300px;" alt="">
    </div>
    
 </section>
<br><br><br><br>
<!-- end sec slide steps  -->
<!-- start sec vid  -->
<section class="vidd">
  <div class="veve"> 
  <video width="800" height="500" controls>
    <source src="/printerly/images/vidd.mp4" type="video/mp4">
  </video>
  </div>
</section>
<!-- end sec vid -->
<!-- start sec card -->
<section class="type">
  <h2>Types Of Printing</h2>
  <h3>There are several types of printing methods used for printing on t-shirts, each with its own advantages and disadvantages. Here are some of the most common types:</h3>
  <br>
  <br>
  <div class="card-deck">
    <div class="card bg-primary">
      <div class="card-body text-center">
        <p class="card-text">1. Screen Printing: This is a traditional method of printing on t-shirts where ink is pushed through a stencil onto the shirt. It is ideal for large quantities of shirts and produces vibrant colors.</p>
      </div>
    </div>
    <div class="card bg-warning">
      <div class="card-body text-center">
        <p class="card-text">2. Direct-to-Garment Printing (DTG): This method uses an inkjet printer to print directly onto the fabric of the shirt. It is ideal for printing complex designs with many colors, but it can be more expensive than other methods.
        </p>
      </div>
    </div>
    <div class="card bg-success">
      <div class="card-body text-center">
        <p class="card-text">3. Vinyl Cutting: This method involves cutting vinyl into a design and then heat pressing it onto the shirt. It is ideal for small quantities of shirts and produces a crisp, clean design.
        </p>
      </div>
    </div>
    <div class="card bg-danger">
      <div class="card-body text-center">
        <p class="card-text">4. Dye Sublimation Printing: This method involves printing a design onto transfer paper, which is then heat pressed onto the shirt. It is ideal for printing on polyester or other synthetic fabrics.
        </p>
      </div>
    </div>
  </div>
</section>
<script src="js/main.js"></script>

</body>
<?php
}
else{
  header("location: /printerly/home.php");
}
include '/xampp/htdocs/printerly/shared/footer.php'; ?>
