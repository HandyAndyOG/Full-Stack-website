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
/**
 * @param array $data
 * @param null $passPhrase
 * @return string
 */
function generateSignature($data, $passPhrase = 'Diamonds.888') {
    // Create parameter string
    $pfOutput = '';
    foreach( $data as $key => $val ) {
        if($val !== '') {
            $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        }
    }
    // Remove last ampersand
    $getString = substr( $pfOutput, 0, -1 );
    if( $passPhrase !== null ) {
        $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
    }
    return md5( $getString );
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
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a172afa79430aa6737e4d51e/5bc902ce9b69b3f1af214c987.js");</script>
 </head>
   <body>
     <?php
      include_once 'navbar.php';
      ?>
      <div id="particles-js"></div>


     <div data-aos="fade-up" data-aos-duration="1000" class="cart_container">
       <h3 class="shopping_cart_h3">Shopping Cart</h3>
         <table class="carttd legend">
         <tr class="cart_first_tr">
             <th colspan="2">Product</th>
             <th>Quantity</th>
             <th  class="hiddentr">Price</th>
             <th>Price</th>
             <th class="remove_button"></th>
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
                         <td><a class="button_remove" href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                     >Remove Item</span></a></td>

                     </tr>
                     <?php
                     $total = $total + ($value["item_quantity"] * $value["item_price"]);
                 }
                     ?>
                     <tr class="total_cart">
                         <td colspan="2" align="center" class="cart_total">Total</td>
                         <td colspan="2" class="cart_total">R <?php echo number_format($total, 2); ?></td>
                         <td colspan ="1">
                         
                           <?php
                           // Construct variables
                           $cartTotal = $total;// This amount needs to be sourced from your application
                           $data = array(
                               // Merchant details
                              'merchant_id' => '10768996',
                              'merchant_key' => 'jmhvvv44ujwxf',
                              //  'merchant_id' => '10000100',
                              //  'merchant_key' => '46f0cd694581a',
                               'return_url' => 'https://www.admin.thediamondshoppe.co.za/return.php',
                               'cancel_url' => 'https://www.admin.thediamondshoppe.co.za/cancel.php',
                               'notify_url' => 'https://www.admin.thediamondshoppe.co.za/notify.php',
                               // Buyer details
                               'name_first' => '',
                               'name_last'  => '',
                               'email_address'=> '',
                               'cell_number' => '',
                               // Transaction details
                               'm_payment_id' => '1234', //Unique payment ID to pass through to notify_url
                               'amount' => number_format( sprintf( '%.2f', $cartTotal ), 2, '.', '' ),
                               'item_name' => $value["item_name"],
                               'custom_str1' => '',
                               'custom_str2' => '',
                               'custom_str3' => '',
                               'custom_str4' => '',
                               'custom_str5' => '',
                               //Transaction options
                               'email_confirmation' => '1',
                               'confirmation_address' => 'andreas@thediamondshoppe.co.za'
                           );

                           $signature = generateSignature($data);
                           $data['signature'] = $signature;

                           // If in testing mode make use of either sandbox.payfast.co.za or www.payfast.co.za
                           $testingMode = false;
                           $pfHost = $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
                           $htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post">';
                            
                           foreach($data as $name=> $value)
                           {
                               $htmlForm .= '<input name="'.$name.'" type="hidden" value=\''.$value.'\' />';
                               
                           }
                           
                            
                           

                           ?>
                          
                           </td>
                     </tr>
                     <tr>
                       <td  colspan="5">
                         <h3 id="billing">Billing Details</h3>
                       <?php
                           $htmlForm .= '<input class="input" type="text" name= "name_first" value="" placeholder="First Name" required><label class="required"></label>';
                            $htmlForm .= '<input class="input" type="text" name= "name_last" value="" placeholder="Last Name" required><label class="required"></label>';
                            $htmlForm .='<input class="input" type="text" name= "email_address" value="" placeholder="Email" required><label class="required"></label>';
                            $htmlForm .='<input class="input" type="text" name= "cell_number" value="" placeholder="Phone Number" required><label class="required"></label>';
                            $htmlForm .='<select class="countries" id ="countries" name= "custom_str1" value="" placeholder="Country/Region" required ></select><label class="required"></label>';
                            $htmlForm .='<input class="input" type="text" name= "custom_str2" value="" placeholder="Street Address" required><label class="required"></label>';
                            $htmlForm .='<input class="input" type="text" name= "custom_str3" value="" placeholder="Town/City" required><label class="required"></label>';
                            $htmlForm .='<input class="input" type="text" name= "custom_str4" value="" placeholder="Province" required><label class="required"></label>';
                            $htmlForm .='<input class="input" type="text" name= "custom_str5" value="" placeholder="Postcode/ZIP" required><label class="required"></label>';
                            $htmlForm .='<input class="input" type="hidden" name="'.$name.'" value="">';
                            $htmlForm .= '<input type="submit" class="button_checkout" value="Checkout"></form>';
                       ?>
                       <?php echo $htmlForm ?>
                            </td>
                     </tr>
                     <?php
                 }
             ?>
           </table>
           <div id="continue_shop">
             <a class="continue_shop_btn" href="/Loose_Diamonds.php">Continue Shopping</a>
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

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js" integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js" integrity="sha512-judXDFLnOTJsUwd55lhbrX3uSoSQSOZR6vNrsll+4ViUFv+XOIr/xaIK96soMj6s5jVszd7I97a0H+WhgFwTEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="Java/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="Java/app.js"></script>
    <script src="Java/dropdown_app.js"></script>
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
