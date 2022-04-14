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


?>

<!DOCTYPE html>
<HTML>

<?php include('header.php') ?>

<div id="finance-grid" class="row">

<?php while($row = mysqli_fetch_assoc($result)): ?>

<div class="col">

<h3>  <?php echo $row['post_title'] ?> </h3>
<p>    <?php echo $row['post_content']  ?> </p>
<div class="d-md-flex gap-2">
                                <a class="btn btn-primary btn-sm" href="details.php?id=<?php echo $row['ID']; ?> "> More info </a>
                                <span class="btn btn-outline-primary btn-sm"><?php echo $row['post_excerpt']?></span>
                                
                            </div>

</div>






<?PHP endwhile; 
mysqli_free_result($result);
mysqli_close($conn);?>





</div>






    




</body>
<script  src="js/app.js"></script>
</html>

