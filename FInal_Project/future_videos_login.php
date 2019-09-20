<?php
session_start();
?>
<?php
$password = "password"; // I will NEVER handle real passwords like this. The point of this site is to show how to display and modify a MySQL database, not how to store and use passwords securely, so I wont waste time and code on that.

// check if the user came here from the proper link
if (isset($_POST['submit'])) {

  //check if the password is correct
  if ($_POST["password"] == $password) {
    $_SESSION['access'] = true;
    header('Location: future_videos_admin.php');
    exit;
  }
  else {
    echo "
    <div class='alert callout'>
      <p>Wrong Password. <a href='future_videos.php'>Go back to previous page.</a></p>
    </div>
    ";
  }

} else {
  echo "
  <div class='alert callout'>
    <p>You shouldn't be here, please go back to the <a href='future_videos.php'>video list</a>.</p>
  </div>
  ";
}

?>
