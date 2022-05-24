
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="At The Diamond Shoppe, we specialize in the finest diamond engagement rings in Cape Town, offering a selection of premium quality loose diam..">
    <meta name="author" content="Andreas" >
    <meta name="keywords" content="Engagement Rings Cape Town" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/images/thick_logo.png" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/style.css">
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a172afa79430aa6737e4d51e/5bc902ce9b69b3f1af214c987.js");</script>
    <link rel="stylesheet" href="CSS/particles.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  
  <body>
  
    <?php
     include_once 'navbar.php';
     ?>
    <div id="particles-js"></div>
        <div id="test_div">
          <h1 class="fancy" id="test_h1">We Have Re-branded!</h1>
          <img data-aos="fade-up" data-aos-duration="1000" src='images/New_logo_TDS_resize2.png'></img>
          </div>
          
        </div>
      
        
        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script src="Java/app.js"></script>
      
    
  
  
  
    
  
  
    <div class="insta_container">
        <h3 class="test_animate" id="insta_h3">See what we are about</h3>
      <div id="instafeed"></div>
      <div id="insta_ell">.</div>
      <div id="insta_ell">.</div>
      <div id="insta_ell">.</div>
      <h3 class="test_animate" id="insta_link">See more here</h3><span data-aos="fade-up" data-aos-duration="500" id="insta_span"><a href="https://www.instagram.com/the__diamond__shoppe/"><i class="fab fa-instagram" style="font-size: 30px; padding-right: 10px;"></i></a></span>
      <script src="https://ig.instant-tokens.com/users/ea442912-2f3a-421c-ba3d-33de168b6415/instagram/17841450054720016/token.js?userSecret=az407tfyiboqv0zeuf71q"></script>
      <script src="Java/instafeed.min.js"></script>
      <script type="text/javascript">
          var feed = new Instafeed({
            accessToken: InstagramToken,
            limit: 21,
            template: '<div data-aos="fade-up" data-aos-duration="500" class="insta_box"><a href="{{link}}"><img class="image_img" title="{{caption}}" src="{{image}}" /><div class = "image_overlay"><div class="image_title">{{caption}}</div></div></a></div>',
          });
          feed.run();
      </script>
    </div>
  </div>
 
<script src="Java/script.js"></script>
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
