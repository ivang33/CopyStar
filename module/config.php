<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "copy-star";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);