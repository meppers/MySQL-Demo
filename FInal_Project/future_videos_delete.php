<?php
session_start();
if (isset($_SESSION['access']) || ($_SESSION['access']) == true){
	//do nothing
}
else {
	header('Location: future_videos.php');
	//access denied, redirect to home page
}
include("dbconn.inc.php");
$conn = dbConnect();
?>
<?php
$VidID = "";


if (isset($_GET['VidID'])) {
	$VidID = intval($_GET['VidID']);

		if (is_int($VidID)){
			$sql = "DELETE from Videos WHERE VidID = ?";
			$stmt = $conn->stmt_init();
			if ($stmt->prepare($sql)){
				$stmt->bind_param('i',$VidID);
				if ($stmt->execute()){
					header('Location: future_videos_admin.php'); // comment out this line when debugging
					/* // this output is for debugging
					$output = "
					<div class='success callout'>
  					<p>The selected record has been seccessfully deleted.</p>
					</div>
					";*/

				} else {
					$output = "<p>Delete failed, try again. If it still fails contact the webmaster.</p>";
				}
			}
		} else {
			$VidID = ""; // video ID is not an integer. reset $VidID
			$output = "<p>If you are expecting to delete an exiting item, then something went wrong. Contact the webmaster.</p>";
		}
} else {
	// $_GET['VidID'] is not set
	$output = "
	<div class='alert callout'>
  	<p>You shoudn't be here. If you think this is an error contact the webmaster.</p>
	</div>
	";
}

?>
<br>
<?= $SubTitle_Admin ?>

<?= $output ?>

<p>Back to the <a href='future_videos_admin.php'>video list admin page</a></p>




</body>
</html>
