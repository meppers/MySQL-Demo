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
<!docType HTML>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Timeline Form</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
</head>

<body>

<?php include("nav.php"); ?>

<?php
//this page edits an entry after it has been chosen from the admin page
//it also creates new entries

//gather the information from the entry
$VidID = $_GET['VidID'];
$sql = "SELECT Title, StatusID, Teaser, Conf FROM Videos WHERE VidID = ?";
$stmt = $conn->stmt_init();
if ($stmt->prepare($sql)) {
	$stmt->bind_param('i',$VidID);
	$stmt->execute();
	$stmt->bind_result($Title, $StatusID, $Teaser, $Conf);
	$stmt->fetch();
	$stmt->close();
} else {
   print ("query failed");
}
//END gather information
// print("$VidID"); // for debugging
?>
<br><a href="future_videos_admin.php" class="button">Cancel and go back</a><br>
<!--this form edits or creates the entry-->
<form action="future_videos_edit.php" method="post">
	<input type="hidden" name="VidID" value="<?= $VidID ?>">
	Title: <input type="text" name="Title" size="45" value="<?= $Title?>"><br>
	Teaser: <input type="text" name="Teaser" size="100" placeholder="Don't give away too much information..." value="<?= $Teaser ?>"><br>

	Status: <br>
		<input type="radio" name="StatusID" value="1"> Advertising Negotiations<br>
		<input type="radio" name="StatusID" value="2"> Research<br>
		<input type="radio" name="StatusID" value="3"> Script Writing<br>
		<input type="radio" name="StatusID" value="4"> Filming<br>
		<input type="radio" name="StatusID" value="5"> Editing<br><br>

	Confidentiality: <br>
		<input type="radio" name="Conf" value="1"> Public <br>
		<input type="radio" name="Conf" value="2" checked="checked"> Top Secret<br><br>


	<div class="alert callout">
		Don't leak our secrets! If it's confidential, mark it as Top Secret!<br>
		Failure to do so may result in Termination from the company.<br>
	</div>
	<input type="Submit" name="Submit" class="success button" value="Submit">
</form>


</body>
</html>
