<?php



$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "amorisfi_WPVLV";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = 'SELECT ID, post_status, post_excerpt, post_title, post_content FROM amw_posts WHERE post_status = "publish"   ORDER BY post_date DESC';
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

$assign_grid_count = 1;

?>

<!DOCTYPE html>

<html>

<?php include('header.php'); ?>


<section class="wrapper ">
   
        <div class="section-header">







            <h3>All Posts</h3>







 





            <ul id="cat-filter">

            <li>Finance</li>
            <li>Space</li>
            <li>Technology</li>
            <li>Travel</li>
            <li>History</li>
           
               
            </ul>









        </div>

 

        <?php



        foreach ($row as $row ) :
            echo $row['post_excerpt'];
       if ($assign_grid_count == 1) : ?>
       <div id="news-grid-2" class="news-grid2">

                <div id="full-item<?php echo $assign_grid_count; ?>" data-cat-='<?php echo $row['post_excerpt'];?>' class=" p-5 news-item ">
                    <div class="text-wrapper  container-fluid">
                        <div class="row">
                            <h1 class="gg"> <?php echo htmlspecialchars($row['post_title']); ?> </h1>





                            <p class="lead"> ... <?php echo (substr($row['post_content'], 0, 1000)); ?> ...</p>


                            <a href="details.php?id=<?php echo $row['ID']; ?> "> More info </a>
                        </div>
                    </div>
                    <?php $assign_grid_count = $assign_grid_count + 1; ?>
                </div>

            <?php continue;

            endif ?>







            <div id="full-item<?php echo $assign_grid_count; ?>" data-="<?php echo $row['post_excerpt']?>" class=" news-item ">
                <div class="text-wrapper container p-5">
                    <div class="row">
                        <h3> <?php echo htmlspecialchars($row['post_title']); ?>      </h3>





                        <p class="text-dark"> ... <?php echo htmlspecialchars(substr($row['post_content'], 0, 600)); ?> ...</p>

                        
                            <div class="d-md-flex gap-2">
                                <a class="btn btn-primary btn-sm" href="details.php?id=<?php echo $row['ID']; ?> "> More info </a>
                                <span class="btn btn-outline-primary btn-sm"><?php echo $row['post_excerpt']?></span>
                                
                            </div>
                
                    </div>
                </div>
                <?php $assign_grid_count = $assign_grid_count + 1; ?>
            </div>





        <?php endforeach;

        ?>




      
    </div>


</section>

<section class="next"></section>

<script src="js/app.js"></script>
</body>


</html>