<?php

require_once(realpath(dirname(__FILE__)).'/../connection.php');
use \Firebase\JWT\JWT;
$jwt = JWT::class;

function res_success($req=null){
    return array(
        "success" => true,
        "message" => null,
        "data" => $req,
    );
}

function res_error($req=null){
    return array(
        "success" => false,
        "message" => $req,
        "data" => null,
    );
}

function check_login($req){
    global $conn;

    $username = $conn->escape_string(htmlspecialchars($req["username"]));
    $password = $conn->escape_string(htmlspecialchars($req["password"]));

    $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."' ";
    $result = $conn->query($sql);
    if($result === false) {
        return res_error("DB Error");
    }

    $rows = $result->fetch_assoc();

    if(empty($rows)) {
        return res_error("No Data");
    }

    return res_success($rows);
}

function check_login_cookie($req){
    global $conn;

    $user_id = $conn->escape_string(htmlspecialchars($req["user_id"]));

    $sql = "SELECT * FROM users WHERE id = '".$user_id."' ";
    $result = $conn->query($sql);
    if($result === false) {
        return res_error("DB Error");
    }

    $rows = $result->fetch_assoc();

    if(empty($rows)) {
        return res_error("No Data");
    }

    return res_success($rows);
}


?>