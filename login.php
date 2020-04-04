<?php
  session_start();

  if (isset($_POST['userID'])) {
    $_SESSION['userID'] = $_POST['userID'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['picture'] = $_POST['picture'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['accessToken'] = $_POST['accessToken'];

    exit("success");
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>

<!--Page html
-->
    <div class="container" style="margin-top: 100px">
      <div class="row justify-content-center">
        <div class="col-md-6 col-offset-3" align="center">
          <!--<img src="images/login.png"><br><br>-->
          <form>
            <input class="form-control" placeholder="Email..."><br>
            <input class="form-control" placeholder="Password..."><br>
            <input type="submit" value="Log In">
            <input type="button" onclick="login()" value="Log In with Facebook">
          </form>
        </div>
      </div>
    </div>


<!-- jQuery script -->

    <script
      src="http://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous">
    </script>

<!-- FB login page request command -->
    <script>
      var person = { userID: "", name: "", accessToken: "", picture: "", email: "" };

      //edit: adding function login
      function login() {
        FB.login(function (response) {
          if (response.status == "connected") {
            person.userID = response.authResponse.userID;
            person.accessToken = response.authResponse.accessToken;

            FB.api('/me?fields=id,name,email,picture,type(large)', function (userData) {
              person.name = userData.name;
              person.email = userData.email;
              person.picture = userData.picture.data.url;

              $.ajax({
                url: "index.php",
                method: "POST",
                data: person,
                dataType: 'text',
                success: function (serverResponse) {
                  if (serverResponse == "success")
                    window.location = "index.php";
                }
              })
            });
          }
        }, {scope: "public_profile, email, user_friends, user_location, user_photos"})
      }
    </script>

<!--Facebook SDK-->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId            : '213932663275462',
          autoLogAppEvents : true,
          xfbml            : true,
          version          : 'v6.0'
        });
      };S
    </script>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js">
    </script>
S
  </body>
</html>
