<?php

$host = "localhost";
$db_name = "incident_reporter";
$user = "root";
$pass = "monalisa2204";

try{
    $pdo = new PDO("mysql:host=$mari;dbname=$incident_reporter", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Connection failed: ". $e->getMessage());
}