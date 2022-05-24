<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="UTF-8">
  <meta name="description" content="At The Diamond Shoppe, we specialize in the finest diamond engagement rings in Cape Town, offering a selection of premium quality loose diam..">
  <meta name="author" content="Andreas" >
  <meta name="keywords" content="Loose Diamonds Cape Town" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a172afa79430aa6737e4d51e/5bc902ce9b69b3f1af214c987.js");</script>
  <link rel="stylesheet" href="CSS/particles.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    <?php
     include_once 'navbar.php';
     ?>
     <div id="particles-js"></div>
  <main>
    <div class ="blog_title_main">
      <h1 class="fancy">The Diamond Blog</h1>
      <p data-aos="fade-up" data-aos-duration="800" class="blog_p">The Diamond Blog aims to help guide you on what to look out for when buying diamonds, jewellery and gems. We take deep dives and provide guides that will aid you on your search to finding your dream engagement ring or your next investment. Watch this page, as we will update it regularly to keep you informed and in the know. With over 50 years experience we want to share some of our knowledge with you.</p>
  </div>
 <?php
          include_once 'PHP/database.php';

          if(isset($_GET['pageno'])){
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 50;
          $offset = ($pageno-1) * $no_of_records_per_page;
          $total_pages_sql = "SELECT  COUNT(*) FROM blog";
          $result = mysqli_query($conn,$total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $sql = "SELECT * FROM blog LIMIT $offset, $no_of_records_per_page";
          $res_data = mysqli_query($conn,$sql);
          if (mysqli_num_rows($res_data) > 0) {
          ?>
    <div class="blog_container">
          <?php
          $i=0;
          while($row = mysqli_fetch_array($res_data)) {
          ?>
            <div data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"class='blog_box'>
              <a class="blog_link" href='<?php echo "/dynamic_blog.php?id={$row['id']}"; ?>'>
                <img class= "blog_img" src='images/blog/<?php echo $row['img_1']?>'>
                <h3 class="image_title_blog"><span data-aos="fade-up" data-aos-anchor-placement="center-center" data-aos-duration="1000" id="title_blog"><?php echo $row["Title"]?><span></h3>
                <div class="image_overlay_blog">
                  
                </div>
              </a>
            </div>
              

          <?php
            $i++;
            }
          ?>


        </table>
          <?php
            }
            else{
              echo "No result found";
            }
            ?>
      </div>
  </main>

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
