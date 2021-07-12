<?php

require 'DbConnect.php';
function register( $firstname, $lastName, $userName, $password){
$conn = connect();
$sql = $conn->prepare("INSERT INTO USERS (firstname, lastname, userName, password)VALUES (?, ?, ?, ?, )");
$sql->bind_param("ss", $firstname, $lastName, $userName, $password);

return $sql->execute();
}
?>