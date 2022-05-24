
<?php
include('PHP/database.php'); 
$limit = 20;
$sql = "SELECT COUNT(id) FROM product_table";  
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Premium quality South African loose diamonds - cut, polished and processed in our very own state-of-the-art diamond cutting factory in Cape...">
  <meta name="author" content="Andreas" >
  <meta name="keywords" content="Loose Diamonds" >
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

  <body>
  <div id="particles-js"></div>
  
    <?php
     include_once 'navbar.php';
     ?>

    
    <div class="loose_box_container">
      <div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine" class="loose_box1">
        <h2  id="looseh2">Loose</h2>
      </div>
      <div data-aos="fade-left"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine" class="loose_box2">
        <h2  id="diamondsh2">Diamonds<h2>
      </div>
    </div>


  <main >
      <div data-aos="fade-up"
     data-aos-duration="500" id = "test_page" class="section_1 box">
        <p id="paragraphLD">Welcome to our loose diamonds page, where you can compare pricing and see all of our stock.
            What makes us different to your normal retailer and online store?
            We have been in the local industry for over 50 years with two generations running a diamond cutting factory and boutique store in the heart of Cape Town. We access our rough diamonds directly from the mines where we have built long standing relationships. Our highly skilled factory also manages to extract maximum value out of the diamonds which we pass onto our clients.
            We are not just a store, we are a family passionate about diamonds and delivering the best quality at unbeatable prices to you.</p>
      </div>
            <div id="target-content">loading...</div>
            
            <div  class="clearfix">
               
                    <ul class="pagination">
                    <?php 
                    if(!empty($total_pages)){
                        for($i=1; $i<=$total_pages; $i++){
                                if($i == 1){
                                    ?>
                                <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>
                                                            
                                <?php 
                                }
                                else{
                                    ?>
                                <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                <?php
                                }
                        }
                    }
                                ?>
                    </ul>
              
            </div>
        </div>
    <script type="">
    $(document).ready(function() {
        $("#target-content").load("pagination.php?page=1");
        $(".page-link").click(function(){
            var id = $(this).attr("data-id");
            var select_id = $(this).parent().attr("id");
            $.ajax({
                url: "pagination.php",
                type: "GET",
                data: {
                    page : id
                },
                cache: false,
                success: function(dataResult){
                    $("#target-content").html(dataResult);
                    $(".pageitem").removeClass("active");
                    $("#"+select_id).addClass("active");
                    
                }
            });
        });
    });
</script>
  

          

<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js" integrity="sha512-8E3KZoPoZCD+1dgfqhPbejQBnQfBXe8FuwL4z/c8sTrgeDMFEnoyTlH3obB4/fV+6Sg0a0XF+L/6xS4Xx1fUEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.gsap.js" integrity="sha512-judXDFLnOTJsUwd55lhbrX3uSoSQSOZR6vNrsll+4ViUFv+XOIr/xaIK96soMj6s5jVszd7I97a0H+WhgFwTEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="Java/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="Java/app.js"></script>
<script src="Java/animate.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
      AOS.init();
  </script>
</body>


        </main>
        <footer>
          <?php include_once 'footer.php';
          ?>
       </footer>


  </html>
