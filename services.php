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


   <div class="slider">
       
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        
            <div class="post-box">
        
            <div  class="post-grid2 p-2">
            
            <div class="post-box-title">
                <h5 class="">  <?php echo $row['post_title'] ?> </h5>
            </div>
            <div class="post-box-content">
                <p class="  "> ... <?php echo htmlspecialchars(substr($row['post_content'] ,50, 600)); ?>  ...</p>
            </div>
                                            <div class="post-box-link"><a  href="details.php?id=<?php echo $row['ID']; ?> "> More info </a></div>
                                            <div class="post-box-img"><img class="img-fluid" src="images/art.jpg" alt="" srcset=""></div>
            <div class="post-box-cat"> <p class="lead"> <?php echo $row['post_excerpt'];?></p></div>
       
        
                              
        
        
        
        
             
                                    </div>
        
        
                                    </div>
        <?PHP endwhile; ?>
        </div>

<div id="space-grid" class="slider2">
<?php while($row2 = mysqli_fetch_assoc($result2)): ?>

    <div class="post-card">
    
    <h3>  <?php echo $row2['post_title'] ?> </h3>
    <p>    <?php echo $row2['post_content']  ?> </p>
    <div class="d-md-flex gap-2">
                                    <a class="btn btn-primary btn-sm" href="details.php?id=<?php echo $row2['ID']; ?> "> More info </a>
                                    <span class="btn btn-outline-primary btn-sm"><?php echo $row2['post_excerpt']?></span>
                                    
                                </div>
    
    </div>
    
    
    

    
    
    <?PHP endwhile; ?>

    </div>


    <div id="tech-grid" class="slider">

<?php while($row3 = mysqli_fetch_assoc($result3)): ?>

    <div class="post-card">
    
    <h3>  <?php echo $row3['post_title'] ?> </h3>
    <p>    <?php echo $row3['post_content']  ?> </p>
    <div class="d-md-flex gap-2">
                                    <a class="btn btn-primary btn-sm" href="details.php?id=<?php echo $row3['ID']; ?> "> More info </a>
                                    <span class="btn btn-outline-primary btn-sm"><?php echo $row3['post_excerpt']?></span>
                                    
                                </div>
    
    </div>
    
    
    
  
    
    
    <?PHP endwhile; ?>
    </div>
    <div id="history-grid" class="slider">

<?php while($row4 = mysqli_fetch_assoc($result4)): ?>

    <div class="post-card">
    
    <h3>  <?php echo $row4['post_title'] ?> </h3>
    <p>    <?php echo $row4['post_content']  ?> </p>
    
                                    <a class="btn btn-primary btn-sm" href="details.php?id=<?php echo $row4['ID']; ?> "> More info </a>
                                    <span class="btn btn-outline-primary btn-sm"><?php echo $row4['post_excerpt']?></span>
                                    
                               
    
    </div>
    
    
    
    
    
    
    <?PHP endwhile; 


mysqli_free_result($result);
mysqli_close($conn);?>





</div>






    




</body>
<script  src="js/app.js"></script>
</html>

