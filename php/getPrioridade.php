<?php


$conn = new mysqli("10.0.0.105", "root", "", "os");
$conn->query('SET NAMES utf8');

$sql = "SELECT * FROM prioridade"; 
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
    $prioridades[] = $row;
}
