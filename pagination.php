<?php
  include('PHP/database.php');
  $limit = 20;  
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
  $start_from = ($page-1) * $limit;  
    
  $sql = "SELECT * FROM product_table LIMIT $start_from, $limit";   
  $rs_result = mysqli_query($conn, $sql);  
  ?>
  <table data-aos="fade-up"
     data-aos-duration="1000" class = "table-row1 table-striped0 table-striped1 info legend">  
  
        <tr>
            <td>Shape</td>
            <td>Carat</td>
            <td>Colour</td>
            <td>Clarity</td>
            <td>Price</td>
            <td></td>
          </tr> 
 
  
  <?php  
  while ($row = mysqli_fetch_array($rs_result)) {  
  ?>  
              <tr>
              <td><?php echo $row["Shape"]; ?></td>
              <td><?php echo $row["Carat"]; ?></td>
              <td><?php echo $row["Colour"]; ?></td>
              <td><?php echo $row["Clarity"]; ?></td>
              <td>R<?php echo $row["Price"]; ?></td>
              <td id="view_button">
                <a style="<?php if($row['View'] == 'SOLD') {
                echo 'color:rgb(245, 219, 214);
                      background: rgb(250, 237, 234);
                      border: 2px solid rgb(245, 219, 214);
                      font-size: 10.5px;
                      cursor: default';
              } else if($row['View'] == 'View') {
                ;
              } ?>" href="<?php if($row['View'] == 'SOLD') {
                echo '"#" onClick="return false"';
              } else if($row['View'] == 'View') {
                echo "/dynamic_page.php?id={$row['id']}";
              } ?>">
                  <?php echo $row['View']?>
              </a>
            </td>
          </tr>
  <?php  
  };  
  ?>  
   
</table>  