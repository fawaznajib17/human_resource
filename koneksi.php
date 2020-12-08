<?php

$host = "localhost";
$user = "root";
$pass = "";
$database = "human_resource";
$koneksi = mysqli_connect ($host, $user, $pass, $database);
if($koneksi){
}else{
    echo("tidak terkoneksi dengan database");
}
?>