<?php 

//create a new table for services and descriptions


$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "amorisfi_WPVLV";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = 'SELECT * FROM amw_posts WHERE post_excerpt = "Finance"   ORDER BY post_date DESC';
$result = mysqli_query($conn, $sql);

$sql2 = 'SELECT * FROM amw_posts WHERE post_excerpt = "Space"   ORDER BY post_date DESC';
$result2 = mysqli_query($conn, $sql2);

$sql3 = 'SELECT * FROM amw_posts WHERE post_excerpt = "Technology"   ORDER BY post_date DESC';
$result3 = mysqli_query($conn, $sql3);

$sql4 = 'SELECT * FROM amw_posts WHERE post_excerpt = "History"   ORDER BY post_date DESC';
$result4 = mysqli_query($conn, $sql4);

?>

<!DOCTYPE html>
<HTML>

<?php include('header.php') ?>


<div class="container-fluid">
  
   <div class="row row-cols-3 g-5">
   <h2 class="display-2">Finance</h2>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="card mb-3" style="max-width: 33%;">
         <div class="row g-0">
           <div class="col-md-12">
             <img src="images/art.jpg" class="img-fluid rounded-start" alt="...">
           </div>
           <div class="col-md-12">
             <div class="card-body">
        <h5 class="card-title"><?php echo $row['post_title'] ?></h5>
        <p class="card-text"><?php echo htmlspecialchars(substr($row['post_content'] ,50, 500)); ?></p>
        <p class="card-text"><small class="text-muted"><a  href="details.php?id=<?php echo $row['ID']; ?> "> More info </a></small></p>
             </div>
           </div>
         </div>
       </div>
           
       <?PHP endwhile;
       mysqli_free_result($result);
       mysqli_close($conn);?>
   </div>


</div>

<!--
            <div class="post-box p-3">
        
            <div  class="post-grid2 p-2">
            
            <div class="post-box-title">
                <h5 class="">  <?php echo $row['post_title'] ?> </h5>
            </div>
            <div class="post-box-content">
                <p class="  "> ... <?php echo htmlspecialchars(substr($row['post_content'] ,50, 300)); ?>  ...</p>
            </div>
                                            <div class="post-box-link"><a  href="details.php?id=<?php echo $row['ID']; ?> "> More info </a></div>
                                            <div class="post-box-img"><img class="img-fluid" src="images/art.jpg" alt="" srcset=""></div>
            <div class="post-box-cat"> <p class="lead"> <?php echo $row['post_excerpt'];?></p></div>
       
        
                              
        
        
        
        
             
                                    </div>
        
        
                                    </div>
 

        -->


    
    

    
    











<!--Real services begins -->

<section class="wrapper">

<div class="container">

<h2>services</h2>

<div class="row g-5">
<div class="col">1 </div>
<div class="col">2</div>
<div class="col">3</div>

</div>
<div class="row g-5">

<div class="col">4 </div>
<div class="col">5 </div>
<div class="col">6 </div>

</div>

</div>



</section>
    




</body>
<script  src="js/app.js"></script>
</html>

