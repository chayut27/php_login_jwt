<?php


if($_GET["act"] == "remove_user_chooser"){
    $user_id = $_GET["user_id"];

    if(!empty($_COOKIE["users_chooser"])){
        $users_chooser = json_decode(base64_decode($_COOKIE["users_chooser"]),true);
        unset($users_chooser[$user_id]);

    }else{
        $users_chooser[$res["data"]["id"]] = array(
            "user_id" => $res["data"]["id"],
            "username" => $res["data"]["username"]
        );
    }

    $data = base64_encode(json_encode($users_chooser));
    setcookie("users_chooser", $data, time() + 86400, '/');

    echo json_encode(true);

}





?>