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


$VidID = $_POST['VidID'];
// Process only if there is any submission
if (isset($_POST['Submit'])) {
	$required = array("Title", "StatusID", "Teaser", "Conf");
	$expected = array("Title", "StatusID", "Teaser", "Conf");
	$missing = array();

	foreach ($expected as $field){
		if (in_array($field, $required) && (!isset($_POST[$field]) || empty($_POST[$field]))) {
			array_push ($missing, $field);
		} else {
			if (!isset($_POST[$field])) {
				${$field} = "";
			} else {
				${$field} = $_POST[$field];
			}
		}
	}


	if (empty($missing)){
		$stmt = $conn->stmt_init();

		if ($VidID != "") {
			$VidID = intval($VidID);
			$sql = "Update Videos SET Title = ?, StatusID = ?, Teaser = ?, Conf = ? WHERE VidID = ?";
			if($stmt->prepare($sql)){
				$stmt->bind_param('sisii',$Title, $StatusID, $Teaser, $Conf, $VidID);
				$stmt_prepared = 1; // set up a variable to signal that the query statement is successfully prepared.
			}
		} else {
			$sql = "Insert Into Videos (Title, StatusID, Teaser, Conf) values (?, ?, ?, ?)";

			if($stmt->prepare($sql)){
				$stmt->bind_param('sisi',$Title, $StatusID, $Teaser, $Conf);
				$stmt_prepared = 1;
			}
		}


		if ($stmt_prepared == 1){ //this if statement contains 3 lines of code for debugging
			if ($stmt->execute()){
				//$output = "<p>The following information has been added or changed:<br><br>"; //for debugging
				foreach($_POST as $key=>$value){
					//$output .= "<b>$key</b>: $value <br>"; //for debugging
				}
				header('Location: future_videos_admin.php'); //comment out this line when debugging
				//$output .= "<p>Back to the <a href='future_videos_admin.php'>Video list admin page</a></p>"; //for debugging
			} else {
				$output = "<p>Database operation failed.";
			}
		} else {
			$output = "<p>Database query failed.";
		}
	} else {
		$output = "<p>Whoops, you forgot to fill out these parts of your form:<br>\n<ul>";
		foreach($missing as $m){
			$output .= "<li>$m";
		}
		$output .= "</ul>";
	}

} else {
	$output = "
	<div class='alert callout'>
  	<p>You shouldn't be here, please go back to the <a href='future_videos.php'>video list</a>.</p>
	</div>
	";
}


?>
<?= $SubTitle_Admin ?>
<?= $output ?>



</body>
</html>
