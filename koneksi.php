<?php

$host = "db4free.net";
$user = "fawaznajib";
$pass = "fawaznajib17";
$database = "human_resource";
$koneksi = mysqli_connect ($host, $user, $pass, $database);
if($koneksi){
}else{
    echo("tidak terkoneksi dengan database");
}
?>
