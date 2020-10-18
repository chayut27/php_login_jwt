<?php
require_once(realpath(dirname(__FILE__)).'./services/services.php');

if(empty($_COOKIE["access_token"])){
    header("location:login.php");
}

$access_token = $_COOKIE["access_token"];

try{
    $payload = $jwt::decode($access_token);

    $req["user_id"] = $payload->user_id;
    $res = check_login_cookie($req);
    if(empty($res["data"])){
      unset($_COOKIE['access_token']); 
      setcookie("access_token", null, -1, '/');
      header("location:login.php");
    }

    $_INFO = array();
    $_INFO["user_id"] = $payload->user_id;
    $_INFO["username"] = $payload->username;

}catch (Exception $e){
    echo  $e->getMessage();
    return false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="./">CWCODING</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-expanded="false">
              <?php echo $_INFO["username"];?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="do_logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-body text-center">
            <h2 class="mb-3">Hello World</h2>
            <h4 class="mb-5"><?php echo $_INFO["username"];?></h4>
            <a href="do_logout.php" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"
    integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous">
  </script>
</body>

</html>