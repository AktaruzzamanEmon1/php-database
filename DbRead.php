<?php

require 'DbConnect.php';
function login (  $userName, $password){
$conn = connect();
$sql = $conn->prepare("SELECT * FROM USERS WHERE username = ? and password = ?");
$sql->bind_param("ss", $userName, $password);

$sql->execute();
$sql->get_result();
return $res->num_rows === 1;
}
?>