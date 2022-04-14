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


$sql = 'SELECT ID, post_status, post_excerpt, post_title, post_content FROM amw_posts WHERE post_status = "publish" AND post_content != "" ORDER BY post_date DESC LIMIT 15';
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
echo count($row);

$assign_grid_count = 1;


?>

<!DOCTYPE html>

<html>

<?php include('header.php') ; ?>
<section class="wrapper">

    <div class="section-header">

    <h3>Recent Posts</h3>
    </div>


<?php
foreach($row as $row): 

//echo $row['post_title'];
//echo $row['post_content'];
    if($assign_grid_count == 1):?>

        <div class="news-grid">

        <div id="item<?php echo $assign_grid_count ;?>"  class="container-fluid news-item ">
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




<script type="module"  src="js/filelist.js"></script>
</div>
<div class="container section-footer  text-center"><a class="" href=""> <button>See all Posts here</button></a></div>



</section>

<section class="about-me wrapper ">

<div class="section-header"> <h3 class="">About Me </h3></div>

<div class="section-body container-fluid">

<div class="row">
    <div class="col-lg-6  p-0 "> <img class="img-fluid" src="images/mhero.jpg" alt="gg"> </div>
    <div class="col-lg-6 bg-black p-5  "> 

<p class="lead text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur perspiciatis ipsum molestias quia cupiditate ad distinctio sit libero autem possimus, tenetur magnam, impedit, vel obcaecati dolore eaque repellat itaque officiis.</p>



    </div>
</div>

</div>
<div class="section-footer container text-center"> 
<a class="" href=""><button>Contact</button></a>


</div>

</secction>


<script  src="js/app.js"></script>
</body>


</html>