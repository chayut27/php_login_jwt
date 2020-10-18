<?php
require_once 'php-jwt-master/src/BeforeValidException.php';
require_once 'php-jwt-master/src/ExpiredException.php';
require_once 'php-jwt-master/src/SignatureInvalidException.php';
require_once 'php-jwt-master/src/JWT.php';

$conn = new mysqli("localhost", "root", "", "php_login_jwt");
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

$conn->set_charset("utf8");
date_default_timezone_set('Asia/Bangkok');


?>