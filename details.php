
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
//echo 'Connected successfully';


if(isset($_GET['id'])){
		
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);   

    // make sql
    $sql = "SELECT ID, post_title, guid, post_content FROM `amw_posts`
     WHERE ID = '$id';";

     $sql2 = "SELECT post_parent, guid FROM `amw_posts`
     WHERE post_parent = '$id';";
    // get the query result
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    // fetch result in array format
    $row = mysqli_fetch_assoc($result);
    $row2 = mysqli_fetch_assoc($result2);

    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_close($conn);

}

?>



<!DOCTYPE html>

<html>

<?php include('header.php');


$check_guid = intval( substr($row2['guid'],-3) );

//echo  $check_guid ;
//echo '<br>';
//echo $row2['post_parent'];


?>




<div class="container-fluid mt-4 post-grid">




		<?php if($row): ?>

            <?php if($check_guid == 0):?>
            <div class="article-img bg-black"> <img src="<?php echo $row2['guid']?>" alt=""></div>
           
           
           <?php else: ?>
            <div class="article-img bg-black"><img src="images/futurecity.jpg" alt=""></div>
           
            <?php endif ?>
            <div class="article-title text-center ">	<h2 class="display-2"><?php echo $row['post_title']; ?></h2></div>
            <div class="article-content">		<p> <?php echo $row['post_content']; ?></p></div>	
			<div id="social_icons_list" class="article-author text-center ">
                <p class="">Created by: Sam</p>
               
               <img src="images/m1.jpg" class="img-thumbnail" alt="">
               <i   class="fa-3x  fa-brands fa-twitter"></i>
               <i  class="fa-3x  fa-brands fa-linkedin"></i>
               <i  class="fa-3x  fa-brands fa-facebook"></i>
  
        </div>
                <div class="article-meta text-center ">
                    <p>Category:</p>
                </div>
            </div>
			<p><?php echo $row['ID']; ?></p>
		<?php else: ?>
			<h5>No such pizza exists.</h5>
		<?php endif ?>
	</div>

   
        </body>
        </html> <script src="js/app.js"></script>