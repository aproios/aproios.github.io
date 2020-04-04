<?php
  session_start();

  if (!isset($_SESSION['userID']) || !isset($_SESSION['email'])) {
    header( string: 'Location:login.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Members</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <!--Page html
    -->
        <div class="container" style="margin-top: 100px">
          <div class="row justify-content-center">
            <div class="col-md-3 align="center">
              <img src="<?php echo $_SESSION['picture'] ?>">
            </div>
            <div class="col-md-9">
              User ID: <?php echo $_SESSION["userID"]; ?><br>
              Name: <?php echo $_SESSION["name"]; ?><br>
              Email: <?php echo $_SESSION["email"]; ?><br>
            </div>
          </div>
        </div>
  </body>
</html>
