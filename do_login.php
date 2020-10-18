<?php
require_once(realpath(dirname(__FILE__)).'./services/services.php');


$username = $conn->escape_string(htmlspecialchars($_POST["username"]));
$password = $conn->escape_string(htmlspecialchars($_POST["password"]));

$req["username"] = $username;
$req["password"] = $password;

$res = check_login($req);
if(!empty($res["data"])){
    $t =  time() + 60 * 60 * 24 ;
    $payload = array(
        "user_id" => $res["data"]["id"],
        "username" => $res["data"]["username"],
        "exp" => $t,
    );

    $token = $jwt::encode($payload);
    setcookie("access_token", $token, time() + 86400, '/');
    $arr = array();
    $user_id = array();
    if(!empty($_COOKIE["users_chooser"])){
        foreach(json_decode(base64_decode($_COOKIE["users_chooser"]),true) as $key => $row){
            $users_chooser[$key] = array(
                "user_id" => $row["user_id"],
                "username" => $row["username"]
            );
        }

        if(empty($users_chooser[$res["data"]["id"]])){
            $users_chooser[$res["data"]["id"]] = array(
                "user_id" => $res["data"]["id"],
                "username" => $res["data"]["username"]
            );
        }
    }else{
        $users_chooser[$res["data"]["id"]] = array(
            "user_id" => $res["data"]["id"],
            "username" => $res["data"]["username"]
        );
    }

    $data = base64_encode(json_encode($users_chooser));
    setcookie("users_chooser", $data, time() + 86400, '/');
    header("location:index.php");
}else{
    header("location:login.php");
}


?>