<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);   
$conn->query("create database if not exists cars");
$conn->query("use cars");

$sql = "CREATE TABLE IF NOT EXISTS user (
email VARCHAR(50) primary key,
name VARCHAR(50) NOT NULL,
pass VARCHAR(50) NOT NULL
)";
$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS cars (
id int primary key,
model VARCHAR(30)NOT NULL,
palce_repair VARCHAR(50)NOT NULL,
palce_buy VARCHAR(50)NOT NULL,
mac VARCHAR(30)NOT NULL,
price int NOT NULL,
path_photo VARCHAR(50)
)";
$conn->query($sql);
?>