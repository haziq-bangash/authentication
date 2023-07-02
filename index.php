<?php
session_start();
// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION["user_id"])) {
  header("Location: login/login_page.php");
  exit();
}

require_once "common_functions.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Authentication</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
  <?php
  if (isset($_SESSION['error'])) {
    echo ("
      <div class='alert alert-warning' role='alert'>
Something went wrong. Please try again
</div>
      ");
  }
  unset($_SESSION['error']);
  ?>
  <div class="container">
    <div class="greetings">
      <h1>
        Hi, <?php echo getUser(getUserId())['name'] ?>! 👋
      </h1>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>