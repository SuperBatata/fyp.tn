<?php 
require "header.php";
include "../config/config1.php";
include "../core/imageC.php";

if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
    exit();
}
if (isset($_POST['choice'])){
$nom=$_POST['nom'];
$id_event1=$_POST['id_event'];
$date_event=$_POST['date'];
	
	$imageC=new imageC();
	$image_list =$imageC->view_image_count($_POST['choice']);

}
else
{
$imageC=new imageC();
$image_list =$imageC->view_image();
$nom=$_POST['nom'];
$id_event1=$_POST['id_event'];
$date_event=$_POST['date'];

}
$userid = $_SESSION['id'];




?>


<!-- Gallery slider section -->
<section class="gallery-slider-section">
		<div class="sp-container">
			<h2 class="gallery-title"><?php echo $nom; ?></h2>
			<form action="gallery.php" method="POST">
			<input type="radio" name="choice" value="1" > sort by likes
			<input type="radio" name="choice" value="0" > sort by unlikes
			<input type="hidden" name="nom" value="<?php echo $nom; ?>"> 
			<input type="hidden" name="id_event" value="<?php echo $id_event1; ?>"> 
			<input type="hidden" name="date" value="<?php echo $date_event; ?>"> 
		
			<input type="submit" class="btn btn-primary">
			</form>
		</div>
		

		<div class="gallery-slider owl-carousel">
		<?php
		 
         foreach ($image_list as $row){
		 if($row['id_event']===$id_event1)
			{$postid = $row['id_image'];
                      
				$title = $row['nom'];
			  $content = $row['lien'];
			
			  $type = -1;

			  // Checking user status
			  $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE userid=".$userid." and postid=".$postid;
			  $status_result = mysqli_query($con,$status_query);
			  $status_row = mysqli_fetch_array($status_result);
			  
			  $count_status = $status_row['cntStatus'];
			  
			  if($count_status > 0){
				  $type = $status_row['type'];
			  }

			  // Count post total likes and unlikes
			  $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid=".$postid;
			  $like_result = mysqli_query($con,$like_query);
			  $like_row = mysqli_fetch_array($like_result);
			  $total_likes = $like_row['cntLikes'];

			  $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and postid=".$postid;
			  $unlike_result = mysqli_query($con,$unlike_query);
			  $unlike_row = mysqli_fetch_array($unlike_result);
			  $total_unlikes = $unlike_row['cntUnlikes'];
                $imt =$row['lien'];
				$im = imagecreatefrompng($imt);
				$stamp= imagecreatefrompng('img/watermark.png');
// Set the margins for the stamp and get the height/width of the stamp image
				$marge_right = 10;
                $marge_bottom = 10;
                $sx = imagesx($stamp);
                $sy = imagesy($stamp);


                $imgx = imagesx($im);
                $imgy = imagesy($im);
                $centerX=round($imgx/2);
                $centerY=round($imgy/2);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 

imagecopy($im, $stamp, (imagesx($im) - $sx)/2, (imagesy($im) - $sy)/2, 0, 0, imagesx($stamp), imagesy($stamp));

// Output and free memory
$f='img/'.$row['id_image'].'.png'; 

imagepng($im,$f);
imagedestroy($im);	
?>
<div class="gallery-item">
		     
             <img src="<?php echo $f; ?>" alt="<?php echo $row['nom']; ?>" />
             <h4><?php echo $row['nom']; ?> </h4>
			 <p><br><?php echo $date_event; ?> </p>
			 <div class="post-action">

<input type="button" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;
<input type="button" value="Unlike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)

             </div>
             </div>
			
		<?php }} ?>
		

		</div>
	</section>
	<!-- Gallery slider section end -->
             


<?php require "footer.php"; ?>