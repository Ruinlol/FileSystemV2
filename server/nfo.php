<?php
require 'dbnfo.php';
session_start();
$parent = $_POST['parent'];
$currentUser = $_SESSION['user'];

$conn = new PDO("mysql:host=$servername; dbname=filesystem",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("SELECT foldername FROM folders WHERE username = '$currentUser' AND parentname = '$parent'");
$stmt-> execute();
$result = $stmt->fetchAll(PDO::FETCH_NUM);
echo json_encode($result);