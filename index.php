<?php



$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword="";
$dbName = "amorisfi_WPVLV";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = 'SELECT ID, post_status, post_excerpt, post_title, post_content FROM amw_posts WHERE post_status = "publish" ORDER BY post_date DESC LIMIT 15';
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

$assign_grid_count = 1;

?>

<!DOCTYPE html>

<html>

<?php include('header.php') ; ?>
<section class="wrapper">

    


<?php
foreach($row as $row): 


    if($assign_grid_count == 1):?>

        <div class="news-grid">

        <div id="item<?php echo $assign_grid_count ;?>" class="container-fluid news-item ">
<div class="text-wrapper">
          <div class="row">
              <h1 class=""> <?php echo htmlspecialchars( $row['post_title']); ?> </h1> 
        
        
   

          
                <p class="lead"> ... <?php echo (substr($row['post_content'] ,0, 600)); ?>  ...</p>
           

     <a href="details.php?id=<?php echo $row['ID'];?> "> More info </a></div>
      </div>
      <?php $assign_grid_count = $assign_grid_count+1; ?>
      </div>
      
      <?php  continue;
        
    endif; ?>







    <div id="item<?php echo $assign_grid_count ;?>" class="container-fluid news-item ">
<div class="text-wrapper p-3">
          <div class="row">
              <h3> <?php echo htmlspecialchars( $row['post_title']); ?> </h3> 
        
        
   

          
                <p class="text-muted"> ... <?php echo htmlspecialchars(substr($row['post_content'] ,0, 400)); ?>  ...</p>
           

     <a href="details.php?id=<?php echo $row['ID'];?> "> More info </a></div>
      </div>
      <?php $assign_grid_count = $assign_grid_count+1; ?>
      </div>
   




<?php endforeach;

?>

<script  src="js/app.js"></script>

</div>
</section>



</body>


</html>