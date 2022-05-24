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
        echo '<script>window.location ="/cart.php"</script>';
      }
    }
  }
}
?>

 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="UTF-8">
   <meta name="description" content="At The Diamond Shoppe, we specialize in the finest diamond engagement rings in Cape Town, offering a selection of premium quality loose diam..">
   <meta name="author" content="Andreas" >
   <meta name="keywords" content="" >
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
   <link rel="stylesheet" href="CSS/particles.css">
   <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a172afa79430aa6737e4d51e/5bc902ce9b69b3f1af214c987.js");</script>
 </head>
   <body>
     <?php
      include_once 'navbar.php';
      ?>
    <div id="particles-js"></div>


     <div class="cart_container">
       <h3 class="shopping_cart_h3">Shopping Cart</h3>
         <table class="carttd legend">
         <tr class="cart_first_tr">
             <th colspan="2">Product</th>
             <th>Quantity</th>
             <th  class="hiddentr">Price</th>
             <th>Price</th>
             <th class="hiddentr remove_button"></th>
         </tr>

         <?php
         $id = mysqli_real_escape_string($conn, $_GET['id']);
         $sql = "SELECT * FROM product_table WHERE id='$id'";
         $result= mysqli_query($conn, $sql) or die("bad Query: $sql");
         if(mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        }
      }
             if(!empty($_SESSION["shopping_cart"])){
                 $total = 0;
                 foreach ($_SESSION["shopping_cart"] as $key => $value) {
                     ?>
                     <tr class="product_cart">
                         <td colspan="2"><?php echo $value["item_name"]; ?></td>
                         <td><?php echo $value["item_quantity"]; ?></td>
                         <td  class="hiddentr">R <?php echo $value["item_price"]; ?></td>
                         <td>
                             R <?php echo number_format($value["item_quantity"] * $value["item_price"], 2); ?></td>

                     </tr>
                     <?php
                     $total = $total + ($value["item_quantity"] * $value["item_price"]);
                 }
                     ?>


                     <?php
                 }
             ?>
           </table>
           <div class="paid">
              <h3 class="paid_h3">Succesfull Payment!</h3>
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
      <br>
      <br>
      <br>
      <br>
      <br>
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
    </body>
    <footer>
      <?php include_once 'footer.php';
      ?>
    </footer>
  </html>
