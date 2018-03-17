<?php
session_start();
//destroy any previous sessions
session_unset();
session_destroy();

include("dbconn.inc.php");
$conn = dbConnect();
?>
<!docType HTML>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Video Timeline</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/app.css" />
</head>
<body>


<?php include("nav.php"); ?>

<h1>What we're working on</h1><br>

<?php
//this page is what the user will see, selecting which entry to edit as an admin is done on another page

//display the current projects in the database
$sql = "SELECT Videos.Title, StatusCategory.Name, Videos.Teaser, Videos.Conf FROM Videos, StatusCategory WHERE Videos.StatusID = StatusCategory.StatusID ORDER BY Videos.StatusID DESC";
$stmt = $conn->stmt_init();
if ($stmt->prepare($sql)) {
	$stmt->execute();
	$stmt->bind_result($Title, $StatusID, $Teaser, $Conf);
	print ("<ol>");
	while ($stmt->fetch()) {
		if ($Conf == 2) { //2 = secret, 1 = not secret
			print ("<li><h3>Top Secret Video</h3></li>\n
			<hr><br>\n");
		}
		else {
			print ("
				<li>
					<h3>$Title</h3>\n
					<p>$Teaser</p>\n
					<b>Current production stage: </b>$StatusID\n
				</li>\n
				<hr><br>\n
			");
		}
	}
    print ("</ol>");
	$stmt->close();
} else {
   print ("query failed for the projects list");
}
?>

<form action="future_videos_login.php" method="POST">
    <div class="row">
        <div class="small-4 columns"><input type="password" name="password" size="30" placeholder="Enter password here"></div>
        <div class="small-1 columns"><input type="submit" name="submit" class="hollow button" value="Go"></div>
        <div class="small-7 columns notice">The password is "password", please be nice :^)</div>
    </div>
</form>



</body>
</html>
