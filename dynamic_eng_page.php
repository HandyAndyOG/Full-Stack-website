<?php
  ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/.tmp'));
  ini_set('session.gc_probability', 1);
  session_start();
  include_once 'PHP/database.php';

  if(isset($_POST["add_to_cart"])){
    if(isset($_SESSION["shopping_cart"])){
      $item_array_id=array_column($_SESSION["shopping_cart"], "product_id");
      if(!in_array($_GET["id"], $item_array_id)){
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array (
          'product_id' => $_GET['id'],
          'item_name' => $_POST['hidden_name'],
          'item_price' => $_POST['hidden_price'],
          'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        echo '<script>window.location="cart.php"</script>';
      }else{
        echo '<script>alert("Product is already Added to Cart")</script>';
        echo '<script>window.location="cart.php"</script>';
      }
    }else{
      $item_array= array(
        'product_id' => $_GET['id'],
        'item_name' => $_POST['hidden_name'],
        'item_price' => $_POST['hidden_price'],
        'item_quantity' => $_POST["quantity"],
      );
      $_SESSION["shopping_cart"][0] = $item_array;
    }
  }

  if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
      foreach($_SESSION["shopping_cart"] as $keys => $value){
        if($value["product_id"] == $_GET["id"]){
          unset($_SESSION["shopping_cart"][$keys]);
          echo '<script>alert("Product has been Removed...!")</script>';
          echo '<script>window.location ="dynamic_eng_page.php"</script>';
        }
      }
    }
  }
?>
 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="UTF-8">
   <meta name="description" content="Buying an engagement ring is not a task that should be taken lightly. We aim to provide the best value with our engagement rings and give..">
   <meta name="author" content="Andreas" >
   <meta name="keywords" content="Engagement Ring" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />

    <link rel="icon" type="image/png" href="/images/thick_logo.png" >
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   <link rel="stylesheet" href="CSS/navbar.css"/>
   <link rel="stylesheet" href="CSS/style.css" />
   <link rel="stylesheet" href="CSS/Table.css" />
   <link rel="stylesheet" href="CSS/particles.css">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a172afa79430aa6737e4d51e/5bc902ce9b69b3f1af214c987.js");</script>
 </head>
   <body>

     <!-- Navbar -->
     <?php
      include_once 'navbar.php';
      ?>
      <div id="particles-js"></div>
      <!-- Import data MYSQL -->
        <div class="dyn_flex_container">
             <?php
             $id = mysqli_real_escape_string($conn, $_GET['id']);
             $sql = "SELECT * FROM ring_product WHERE id='$id'";
             $result= mysqli_query($conn, $sql) or die("bad Query: $sql");
             if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
      <!-- The Product -->

      <!-- Slideshow container -->


                  <div data-aos="fade-up" data-aos-duration="1000" class="eng_box_1">
                    <h2 class="eng_h2"><?php echo strtolower($row['Ring']) ?></h2>
                    
                    <!-- Full-width images with number and caption text -->
                      <p id = 'ring'><?php echo $row['ring_type'] ?></p>
                      
                      
                      <div class="mySlides front">
                        <img src='images/ring_product/<?php echo $row['ring_type'] ?><?php echo $row['image_1']?>' id="ring_product">
                        <div class="text">Frontal View</div>
                      </div>

                      <div class="mySlides side">
                        <img src='images/ring_product/<?php echo $row['ring_type'] ?><?php echo $row['image_2']?>' id="ring_product">
                        <div class="text">Side View</div>
                      </div>

                      <div class="mySlides persp">
                        <img src='images/ring_product/<?php echo $row['ring_type'] ?><?php echo $row['image_3']?>' id="ring_product">
                        <div class="text">Perspective View</div>
                      </div>
                    
                    
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    
                    <br>

                    <!-- The dots/circles -->
                    <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                 </div>
                 <div class="color-content">
                 <h3>Select Colour</h3>
                  <div class = "color-groups">
                    <div class = "color color-YG active-color">
                      <img src= "images/ring_product/Yellow-Gold.png">
                    </div>
                    <div class = "color color-WG">
                      <img src= "images/ring_product/White-Gold.png">
                    </div>
                    <div class = "color color-RG">
                      <img src= "images/ring_product/Rose-Gold.png">
                    </div>
                  </div>
                  <p id = 'ring_colour'>YG</p>
                 </div>
                 <div class="shape-content">
                 <h3>Select Shape</h3>
                  <div class = "shape-groups">
                    <div class = "shape shape-RND active-shape">
                      <img src= "/images/shape/Round -01.png">
                    </div>
                    <div class = "shape shape-OVL">
                      <img src= "/images/shape/Oval -01.png">
                    </div>
                    <div class = "shape change shape-CUS">
                      <img src= "/images/shape/Cushion -01.png">
                    </div>
                  </div>
                  <p id = 'ring_shape'>RND</p>
                </div>
                 <div class="band-content">
                 <h3>Select Band Type</h3>
                  <div class = "band-groups">
                    <div class = "band band- active-band">
                    <img src= "/images/ring_product/diamondband.png">
                    </div>
                    <div class = "band band-NON">
                      <img src= "/images/ring_product/band.png">
                    </div>
                  </div>
                  <p id = 'ring_band'></p>
                </div>
                 <div  data-aos="fade-up" data-aos-duration="500" class = "eng_box_2">
                   <div class="eng_div">
                    <img class="dynimg1" src= 'images/shape/TDS-Diamond-Footer-Blue_Small-04.png'>
                    <h3 class ="dyn">Ring Details</h3>
                    <form method="post" action="cart.php?action=add&id=<?php echo $row['id']; ?>">
                     <table class= "Info_table addtd">
                       <tr class="gold_color">
                         <th>Gold</th>
                         <td>YG</td>
                       </tr>
                       <tr>
                         <th>Price</th>
                         <td><?php echo $row['Price']?></td>
                       </tr>
                       <tr class="hiddentr">
                         <th>Quantity</th>
                         <td>
                           <input class="quantity_style" type="number" name="quantity" value="1" min="1" max="1">
                        </td>
                       </tr>
                     </table>
                   </form>
                   <img class="dynimg1" src= 'images/shape/TDS-Diamond-Footer-Blue_Small-04.png' >
                   </div>
                </div>
            </table>
      <div data-aos="fade-up" data-aos-duration="500" class = "eng_box_3">
        <p class="eng_p"><?php echo $row['Description'];?></p>
      </div>
                    <?php
                 }
              }
              ?>
      <div data-aos="fade-up" data-aos-duration="500" class="eng_box_4">
      <form class="form_container" action="mail.php" method="POST">
        <p>Name</p> <input type="text" name="name" placeholder="Full Name..">
        <p>Email</p> <input type="text" name="email" placeholder ="E-mail Address..">
        <p>Message</p><textarea name="message" rows="6" cols="25" placeholder="Message.."></textarea><br/>
        <div class="form_button_cont">
          <input class="button_dyn" type="submit" value="Send">
        </div>
      </form>
    </div>
  </div>








<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js" integrity="sha512-0xrMWUXzEAc+VY7k48pWd5YT6ig03p4KARKxs4Bqxb9atrcn2fV41fWs+YXTKb8lD2sbPAmZMjKENiyzM/Gagw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" integrity="sha512-DkPsH9LzNzZaZjCszwKrooKwgjArJDiEjA5tTgr3YX4E6TYv93ICS8T41yFHJnnSmGpnf0Mvb5NhScYbwvhn2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js" integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js" integrity="sha512-judXDFLnOTJsUwd55lhbrX3uSoSQSOZR6vNrsll+4ViUFv+XOIr/xaIK96soMj6s5jVszd7I97a0H+WhgFwTEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="Java/script.js"></script>
  <script src="Java/tl1.js"></script>
  <script src="Java/tl2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
  <script src="Java/app.js"></script>
  <script src="Java/animate.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init();
  </script>
    </body>

   <footer>
     <?php include_once 'footer.php';
     ?>
  </footer>
 </html>
