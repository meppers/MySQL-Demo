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

<script> // this is the "are you sure?" popup when you click on "delete"
function confirmDel(Title, VidID) {
// javascript function to ask for deletion confirmation
	url = "future_videos_delete.php?VidID="+VidID;
	var agree = confirm("Are you sure you want to delete '" + Title + "'? This can't be undone.");
	if (agree) {
		// redirect to the deletion script
		location.href = url;
	}
	else {
		// do nothing
		return;
	}
}
</script>


<!docType HTML>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Timeline Admin</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
</head>

<body>

	<?php include("nav.php"); ?>

	<h1>Edit Mode</h1>
	<h3><a href="future_videos.php" class="expanded button">Back to regualr mode</a></h3><br>

	<a href="future_videos_form.php" class="button">Create new entry</a>

<?php
//this page is what the admin will see, he can edit and delete entries here

//display the current projects in the database
$sql = "SELECT Videos.Title, StatusCategory.Name, Videos.Teaser, Videos.Conf, Videos.VidID FROM Videos, StatusCategory WHERE Videos.StatusID = StatusCategory.StatusID ORDER BY Videos.Title";
$stmt = $conn->stmt_init();
if ($stmt->prepare($sql)) {
	$stmt->execute();
	$stmt->bind_result($Title, $StatusID, $Teaser, $Conf, $VidID);
	print ("<ol><hr>");
	while ($stmt->fetch()) {
		$Title_js = htmlspecialchars($Title, ENT_QUOTES);
		if ($Conf == 2) { //2 = secret, 1 = not secret
			print ("
			<li>
				<div class='alert callout'>
					Top Secret Video\n
					<h4>$Title</h4>\n
					<p>$Teaser</p>\n
					<b>Current production stage: </b>$StatusID\n<br>
				</div>
				<a href='future_videos_form.php?VidID=$VidID' class='button'>Edit</a>
				<a href='javascript:confirmDel(\"$Title_js\",$VidID)' class='alert button'>Delete</a>
				<hr><br>
			</li>\n
			");
		}
		else {
			print("
			<li>
					<h4>$Title</h4>\n
					<p>$Teaser</p>\n
					<b>Current production stage: </b>$StatusID\n<br>
					<a href='future_videos_form.php?VidID=$VidID' class='button'>Edit</a>
					<a href='javascript:confirmDel(\"$Title_js\",$VidID)' class='alert button'>Delete</a>
					<hr><br>
			</li>\n
			");
		}
	}
  print ("</ol>");
	$stmt->close();
} else {
	 print ("query failed for the projects list");
}
?>


</body>
</html>
