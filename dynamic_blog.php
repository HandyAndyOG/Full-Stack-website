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
          echo '<script>window.location ="dynamic_blog.php"</script>';
        }
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>
  <meta charset="UTF-8">
  <meta name="description" content="The diamond blog has been designed to make your journey in finding the perfect engagement ring a lot easier! Have many of your questions..">
  <meta name="author" content="Andreas" >
  <meta name="keywords" content="The Diamond Blog" >
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
  <script src="Java/app.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a172afa79430aa6737e4d51e/5bc902ce9b69b3f1af214c987.js");</script>
  <link rel="stylesheet" href="CSS/particles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>

  <body>
    <?php
     include_once 'navbar.php';
     ?>
     <div id="particles-js"></div>
     

  <main>
  <div class="dyn_flex_container_blog">
      <?php
        $id = mysqli_real_escape_string($conn, $_GET['id']);
             $sql = "SELECT * FROM blog WHERE id='$id'";
             $result= mysqli_query($conn, $sql) or die("bad Query: $sql");
             if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
    <div class="dyn_blog_box_1">
        <h1 class="blog_title fancy"><?php echo $row['Title']?></h1>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" class="dyn_blog_box_2">
        <img id="check" src='images/blog/<?php echo $row['img_1']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_3 blog_h3_p">
        <h3><?php echo $row['subheading_1']?></h3>
        <p><?php echo $row['paragraph_1']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_4">
        <img id="check" src='images/blog/<?php echo $row['img_2']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_5 blog_h3_p">
        <h3><?php echo $row['subheading_2']?></h3>
        <p><?php echo $row['paragraph_2']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_6">
        <img id="check" src='images/blog/<?php echo $row['img_3']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_7 blog_h3_p">
        <h3><?php echo $row['subheading_3']?></h3>
        <p><?php echo $row['paragraph_3']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_8">
        <img id="check" src='images/blog/<?php echo $row['img_4']?>' >
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_9 blog_h3_p">
        <h3><?php echo $row['subheading_4']?></h3>
        <p><?php echo $row['paragraph_4']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_10">
        <img id="check" src='images/blog/<?php echo $row['img_5']?>'>
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_11 blog_h3_p">
        <h3><?php echo $row['subheading_5']?></h3>
        <p><?php echo $row['paragraph_5']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_12">
        <img id="check" src='images/blog/<?php echo $row['img_6']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_13 blog_h3_p">
        <h3><?php echo $row['subheading_6']?></h3>
        <p><?php echo $row['paragraph_6']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_14">
        <img id="check" src='images/blog/<?php echo $row['img_7']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_15 blog_h3_p">
        <h3><?php echo $row['subheading_7']?></h3>
        <p><?php echo $row['paragraph_7']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_16">
        <img id="check" src='images/blog/<?php echo $row['img_8']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_17 blog_h3_p">
        <h3><?php echo $row['subheading_8']?></h3>
        <p><?php echo $row['paragraph_8']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_18">
        <img id="check" src='images/blog/<?php echo $row['img_9']?>' >
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_19 blog_h3_p">
        <h3><?php echo $row['subheading_9']?></h3>
        <p><?php echo $row['paragraph_9']?></p>
    </div>
    <div data-aos="fade-right" class="dyn_blog_box_20">
        <img id="check" src='images/blog/<?php echo $row['img_10']?>'>
    </div>
    <div data-aos="fade-left" class="dyn_blog_box_21 blog_h3_p">
        <h3><?php echo $row['subheading_10']?></h3>
        <p><?php echo $row['paragraph_10']?></p>
    </div>
     </div>
     <?php
                 }
              }
              ?>
  </main>


  
  <script src="Java/script.js"></script>
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